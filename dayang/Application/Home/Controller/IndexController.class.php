<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function __construct() {
        parent::__construct();
        
        wx_login();
        
        $this->get_signPackage();
        $sys_set['share_title'] = "西门子家电 2016全国巡展-长治站";
        $sys_set['share_img'] = "http://dgzc725.ktwlkj.com/Public/Home/images/share.jpg";
        $sys_set['share_desc'] = "8.06-8.08到达洋电器博源店  0元众筹 预约赢好礼";
        $this->assign("sys_set",$sys_set);
        //$_SESSION['uid'] = 108;
    }
    /*分享配置参数*/
    public function get_signPackage() {
        require_once THINK_PATH . "Weixin/WxApi.class.php";
        $wx = new \WxApi;
        $signPackage = $wx->wxJsapiPackage();
        $this->assign('signPackage', $signPackage);
    }

    public function index(){
    	$this->display();
    }

    //查看商品详情页
    public function detail(){
    	$rule = I("get.rule",1);   //1代表单品，2代表套餐
        $type = I("get.type",1);    //list类型
        $uid = uid();   
        $data = array();

        if($rule==1){
        	$record = D("lrecord");
        	$infotable = D("list");
        	$data['rule'] = "lrecord";
        }else if($rule==2){
        	$record = D("trecord");
        	$infotable = D("tuan");
        	$data['rule'] = "trecord";
        }
        //获取改单品的基本信息
        $typeinfo = $infotable->where("id=$type")->find();

        //参与该商品的总人数
        $typetotal = $record->where("lid=$type")->count();

        //返回该商品组别
        $z = 1;
        if($typetotal != 0){
        	$z = D("lrecord")->where("lid=$type")->max("z");

        	$typenum = $record->where("lid=$type and lstatus<3")->count();
            $typenum += $typeinfo['p3'];
            if($typenum%$typeinfo['p3'] == 0){
                $z = $z+1;
            }
        }
        $data['z'] = $z;

        //参与该单品未达标人数
        $count = $record->where("lid=$type and lstatus<3")->count();
        
        if($count<$typeinfo['p1']){
        	$data['now_price'] = $typeinfo['m'];
        	$data['detail'] = 0;
        }else if($count<$typeinfo['p2']){
        	$data['now_price'] = $typeinfo['m1'];
        	$data['detail'] = 1;
        }else if($count<$typeinfo['p3']){
        	$data['now_price'] = $typeinfo['m2'];
        	$data['detail'] = 2;
        }else if($count==$typeinfo['p3']){
        	$data['now_price'] = $typeinfo['m'];
        	$data['detail'] = 0;
            $count = 0;
        }
        //返回当前参与人数
        $data['now_people'] = $count;

        //返回图片详情
        $data['imgdetail'] = html_entity_decode($typeinfo['image']);
        //返回商品ID
        $data['type'] = $type;

        $this->assign("data",$data);
        $this->assign("list",$typeinfo);
        $this->display();
    }

    //用户提交购买请求
    public function commit(){
        $data = I("post.");
        $type = I("post.type",1);  //lid:获取单品id
        $table = I("post.table","");
        $uid = uid();

        if($table == ""){
            $this->ajaxReturn(array("code"=>-1,'msg'=>"提交失败！"));exit;
        }

        //如果参与过商品，是否可以重复参与
        $check = D($table)->where("uid=$uid and lid=$type")->find();
        if($check>0){
            $this->ajaxReturn(array("code"=>-1,'msg'=>"您已参加过活动，无法重复提交！"));exit;
        }
        
        //获取商品阶梯数量
        $typeinfo = D("list")->where("id=$type")->find();
        
        //参与该商品人数
        $p = D($table)->where("lid=$type and lstatus<3")->count();
        $lrecord = M($table); // 实例化User对象
        
        // 要修改的数据对象属性赋值
        //$arr['status'] = 1;
        $arr = array();

        $arr['lid'] = $type;

        if($p < $typeinfo['p1']-1){
            $arr['lstatus'] = 0;
        }else if($p < $typeinfo['p2']-1){
            $arr['lstatus'] = 1;
        }else if($p < $typeinfo['p3']-1){
            $arr['lstatus'] = 2;
        }else if($p == $typeinfo['p3']-1){
        	$arr['lstatus'] = 3;
        }

        //获取最大Z（组别）
        $z = $lrecord->where("lid=$type")->order('z DESC')->getField('z');
        $count = $lrecord->where("lid=$type")->count();
        if($count == 0){
        	$arr['z'] = 1;
        }else{
        	$count += $typeinfo['p3'];
	        if($count%$typeinfo['p3'] == 0){
	            $arr['z'] = $z+1;
	        }else{
	            $arr['z'] = $z;
	        }
        }
        
        $data['lstatus'] = $arr['lstatus'];
        $data['lid'] = $type;
        $data['z'] = $arr['z'];
        $data['uid'] = $uid;
        $data['c_time'] = time();
        
        $lcrecord = D($table);
        $lcrecord->startTrans(); //事务开始

        $id = $lcrecord->add($data);

        if($p == $typeinfo['p1']-1){
            $arr['lstatus'] = 1;
        }else if($p == $typeinfo['p2']-1){
            $arr['lstatus'] = 2;
        }else if($p == $typeinfo['p3']-1){
            $arr['lstatus'] = 3;
        }

        //根据条件更新状态
        if($arr['lstatus']==1 || $arr['lstatus']==2 || $arr['lstatus']==3){
        	$lrecord->where("lid=$type and lstatus!=3")->save($arr); 
        }

		if($id>0){
			$lcrecord->commit(); //事务提交
			$this->ajaxReturn(array("code"=>1,'msg'=>"提交成功！"));exit;
		} else {
			$lcrecord->rollback(); //事务回滚
			$this->ajaxReturn(array("code"=>-1,'msg'=>"提交失败！"));exit;
		}
    }

    //查询个人优惠信息
    public function youhui(){
        $uid = uid();

        $ldata = D("lrecord")->where("uid=$uid")->select();
        $llist = D("list")->order("id asc")->select();

        $tdata = D("trecord")->where("uid=$uid")->select();
        $tlist = D("tuan")->order("id asc")->select();
        
        $this->assign("ldata",$ldata);
        $this->assign("llist",$llist);

        $this->assign("tdata",$tdata);
        $this->assign("tlist",$tlist);
        
        $this->display();
    }

    //用户兑换奖品
    public function getprize(){
        $lt = (int)(I("post.lt",0));
        $lt=$lt?$lt:0;
        $uid = uid();
        $data = array();

        if($lt==1){
            $record = M("lrecord");
        }else{
            //要修改的数据对象属性赋值
            $record = M("trecord");
        }

        $data['pid'] = 1;
        $data['e_time'] = time();
        $type = (int)(I("post.type",0));
        $id = $record->where("uid=$uid and lid=$type")->save($data);
        if($id>0){
            $this->ajaxReturn(array("code"=>1,"msg"=>"领取成功！"));exit;
        }else{
            $this->ajaxReturn(array("code"=>-1,"msg"=>"领取失败！"));exit;
        }
    }


}