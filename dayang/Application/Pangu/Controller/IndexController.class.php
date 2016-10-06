<?php
namespace Pangu\Controller;
use Think\Controller;

class IndexController extends Controller {
	public function __construct() {
		parent::__construct();
		check_admin_login();


	}
	public function index() {
		$this->display();
	}
	/**
	 * 系统信息
	 * @wxy
	 * @DateTime 2016-05-20T16:11:00+0800
	 * @return   [type]                   [description]
	 */
	public function welcome() {
		//p(build_order_no());
		$arr['php_uname1'] = php_uname('s');
		$arr['php_uname2'] = php_uname('r');
		$arr['php_sapi_name'] = php_sapi_name();
		$arr['PHP_VERSION'] = PHP_VERSION;
		$arr['DEFAULT_INCLUDE_PATH'] = DEFAULT_INCLUDE_PATH;
		$arr['host'] = $_SERVER["HTTP_HOST"];
		$arr['ip'] = GetHostByName($_SERVER['SERVER_NAME']);
		$arr['root'] = $_SERVER['SystemRoot'];
		$arr['port'] = $_SERVER['SERVER_PORT'];
		$arr['day'] = date("Y-m-d");

		$this->assign('sys', $arr);
		$this->display();
	}

	public function llist(){
		$sql = "select b.*,sum(case when a.lid = b.id then 1 else 0 end) as count from pg_list b left join pg_lrecord a on a.lid = b.id group by b.id";
		$table = M();
		$list = $table->query($sql);
		$this->assign("list",$list);
		$this->display();
	}

	public function tuan(){
		$sql = "select b.*,sum(case when a.lid = b.id then 1 else 0 end) as count from pg_tuan b left join pg_trecord a on a.lid = b.id group by b.id";
		$table = M();
		$list = $table->query($sql);
		$this->assign("list",$list);
		$this->display();
	}

	public function prize(){
		$type=I("get.type");
		$sql = "select a.id,b.uid,a.tel,a.name,b.nickname,a.lid,a.c_time,a.e_time from";
		$data = array();
		
		if($type==1){
			$sql .= " pg_lrecord a,pg_user b where a.uid = b.id";
			$data = D("list")->field("type,name")->select();
		}else{
			$sql .= " pg_trecord a,pg_user b where a.uid = b.id";
			$data = D("tuan")->field("type")->select();
		}

		$table = M();
		$list = $table->query($sql);
		$this->assign("list",$list);
		$this->assign("data",$data);
		$this->assign("type",$type);
		$this->display();
	}

	/**
	 * 通用提交编辑
	 * @wxy
	 * @DateTime 2016-05-20T16:39:51+0800
	 * @return   [type]                   [description]
	 */
	public function do_edit() {
		$id = I("get.id", 0);
		$table = I("get.table", 0);
		$data = I("post.");

		if ($table == "match") {
			$data['c_time'] = strtotime($data['c_time']);
		}

		if ($id == 0) {
			$s = D($table)->add($data);
		} else {
			$data['k_time'] = time();
			$data['status'] = 1;//1表示已经开奖了
			$s = D($table)->where("id=$id")->save($data);
		}
		if ($table == "sys_set") {
			S("sys_set", null);
		}
		echo $s;
	}

	/**
	 * 删除公用方法
	 * @wxy
	 * @DateTime 2016-05-21T09:56:38+0800
	 * @return   [type]                   [description]
	 */
	public function do_del() {
		$id = I("post.id");
		$table = I("post.table");
		if ($table == "wx_user") {
			$s = D($table)->where("uid=$id")->delete();
		} else {
			$s = D($table)->where("id=$id")->delete();
		}
		switch ($table) {
		case 'goods':
			S("goods_" . $id, null);
			S("goods_base_" . $id, null);
			break;

		default:
			# code...
			break;
		}

		echo $s;
	}

	/**
	 * 删除全部
	 * @wxy
	 * @DateTime 2016-05-21T09:59:24+0800
	 * @return   [type]                   [description]
	 */
	public function do_del_all() {
		$ids = I("get.ids");
		$ids = rtrim($ids, ",");
		$table = I("get.table");
		if ($table == "wx_user") {
			$s = D($table)->where("uid in ($ids)")->delete();
		} else {
			$s = D($table)->where("id in ($ids)")->delete();
		}
		$ids = explode(',', $ids);
		switch ($table) {
		case 'goods':
			foreach ($ids as $key => $e) {
				S("goods_" . $e, null);
				S("goods_base_" . $e, null);
			}
			break;
		default:
			# code...
			break;
		}
		echo $s;
	}

	/**
	 * 通用编辑页面
	 * @wxy
	 * @DateTime 2016-05-20T16:39:25+0800
	 * @return   [type]                   [description]
	 */
	public function edit() {
		$id = I("get.id", 0);
		$table = I("get.table", 0);
		$arr = D($table)->where("id=$id")->find();

		$this->assign("list", $arr);
		$this->assign("id", $id);
		$this->display("edit_" . $table);
	}




}