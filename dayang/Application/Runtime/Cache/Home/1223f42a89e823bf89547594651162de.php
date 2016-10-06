<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>套餐列表详情内页</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1，user-scalable=0;">
<link type="text/css" rel="stylesheet" href="/Public/Home/css/style.css"/>
<link type="text/css" rel="stylesheet" href="/Public/Home/css/animate.css" />


<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script> 
  wx.config({
    appId: '<?php echo ($signPackage["appId"]); ?>',
    timestamp: '<?php echo ($signPackage["timestamp"]); ?>',
    nonceStr: '<?php echo ($signPackage["nonceStr"]); ?>',
    signature: '<?php echo ($signPackage["signature"]); ?>',
    jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','showOptionMenu'
      // 所有要调用的 API 都要加到这个列表中
    ]
  });
  wx.ready(function () {
  	wx.showOptionMenu();
    wx.onMenuShareTimeline({
    title: '西门子家电 2016全国巡展-长治站', // 分享标题
    link: 'dgzc725.ktwlkj.com', // 分享链接
    imgUrl: 'http://dgzc725.ktwlkj.com/Public/Home/images/share.jpg', // 分享图标
    success: function () { 
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
  });

wx.onMenuShareAppMessage({
    title: '西门子家电 2016全国巡展-长治站', // 分享标题
    desc: '8.06-8.08到达洋电器博源店  0元众筹 预约赢好礼', // 分享描述
    link: "dgzc725.ktwlkj.com", // 分享链接
    imgUrl: 'http://dgzc725.ktwlkj.com/Public/Home/images/share.jpg', // 分享图标
    type: '', // 分享类型,music、video或link，不填默认为link
    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
    success: function () { 
        // 用户确认分享后执行的回调函数
    },
    cancel: function () { 
        // 用户取消分享后执行的回调函数
    }
});
    });

</script>



</head>
  
<body >
  <style>
    html,body{width: 100%;height: 100%;}
    .share_pop{position: fixed;width:100%;height: 100%;z-index: 1000000000000;background: rgba(0,0,0,0.9);display: none;}
    .share_pop img{display: block;width: 60px;position: absolute;top:10px;right: 10px;}
    .share_pop span{color: #fff;font-size: 16px;position: absolute;top:100px;right: 20px;}
  </style>

  <div class="share_pop">
    <img src="/Public/Home/icon/corner.png">
    <span>快点喊你的朋友来增加人气吧！</span>
  </div>

  <div class="index tcbg">
    <div class="content">
      <div class="xiangqing1"><img src="<?php echo ($list["headimg"]); ?>"></div>
      <!--滚动-->
     
      <div class="project">
      <div class="project-screening">
      <div class="project-screening-yellow"></div>
        
      <div class="screening-select select-2"><a href="javascript:void(0)">￥<?php echo ($list["m1"]); ?></a></div>
      <div class="screening-select select-3"><a href="javascript:void(0)">￥<?php echo ($list["m2"]); ?></a></div>
      <div class="screening-select select-4"><a href="javascript:void(0)">￥<?php echo ($list["m3"]); ?></a></div>

      </div>
      <div class="xiangqing2-3">
        <ul>
         <li><span class="sl"><?php echo ($list["p1"]); ?></span><em>所需人数</em></li>
        <li><span class="s2"><?php echo ($list["p2"]); ?></span><em>所需人数</em></li>
         <li><span class="s3"><?php echo ($list["p3"]); ?></span><em>所需人数</em></li>
        </ul>
      </div>
    </div>
      
	<div class="zhe">
      <div class="zhe-main">
       <span class="l">第<?php echo ($data["z"]); ?>组</span>
       <span class="r">
         <div class="zhe-main-left">当前价格</div>
         <div id="now_m" class="zhe-main-right"><?php echo ($data["now_price"]); ?></div>
	     <div class="zhe-main-left">当前人数</div>
        <div id="now_p" class="zhe-main-right"><?php echo ($data["now_people"]); ?></div>
       </span>
      </div>
    </div>

    <!--滚动-->
    <br><br>
     <div class="">
       <div class="tit"><span>详情介绍</span></div>
       <!-- <img src="<?php echo ($list["image"]); ?>"></div> -->
      </div>
    <style>
		  .detail_img .content{margin:0;padding: 0;}
      .detial_img div img{display: block;width: 100%;}
    </style>
      <div class="detial_img">
          <!-- <img style="display: block;width: 100%;" src=""> -->
          <div style="display: block;width: 100%;"><?php echo ($data["imgdetail"]); ?></div>
          <br><br>
      </div>
      <br><br>
    </div>
    
    <style>
      .xiangqing-anniu{background:#3b6082;padding:10px 15px;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;}
      .xiangqing-anniu a{display: block;background: #92cc59 !important;width:30%;margin:0 1.6%;color: #fff;text-align: center;border-radius: 4px;line-height:30px;height: 30px;}
    </style>

    <div class="xiangqing-anniu">
     <a href="index.html">活动首页</a>
     <a href="<?php echo U('Home/Index/youhui');?>">我的优惠券</a>
     <a class="sure_btn">报名抢购</a>
    </div>
  </div>

  <div class="layer_goumai">
     <form id="form2" method="post" id="index_form">
       <h1><img src="/Public/Home/icon/goumai-tit.png" /></h1>
      <div class="biaodan"><img src="/Public/Home/icon/dh-icon.png"><input type="text" value="" name="tel" id='tel'></div>
      <div class="biaodan"><img src="/Public/Home/icon/xm-icon.png"><input type="text" value="" name="name" id='name'></div>
      <div class="submit tijiao"><img src="/Public/Home/icon/submint.png">
       <input type="submit" value="" class="" >
      </div>
     </form>
  </div>
  <div class=""></div>

<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/public.js"></script>
<script src="/Public/Home/js/wow.min.js"></script>
<script  src="/Public/Home/layer/layer.js"></script>
<script type="text/javascript">
    $(".sure_btn").click(function(){
      	layer.open({
        	type: 1,
        	shade: false,
        	title: false, //不显示标题
        	content: $('.layer_goumai'), //捕获的元素
      	});
    })
</script>

<script>
$(".tijiao").click(function(){
var userTel = $("#tel").val();
var userName = $("#name").val();
$("#tel").val("");
$("#name").val("");
if(userTel == ""){
    alert("请输入电话");
    return;
}

/*var myreg = /^((1[0-9][0-9]{1})+\d{8})$/; 
if(!myreg.test(userTel)) 
{ 
    alert('请输入有效的手机号码！'); 
    return false; 
}*/

if(isNaN(userTel)){
  alert('请输入有效的手机号码！'); 
  return false;
}
   

if(userName == ""){
    alert("请输入姓名");
    return; 
   }
 /*$("#form").submit();*/

  	var data=$("#form2").serialize();
  
  	var type_ = "<?php echo ($data["type"]); ?>";
  	var table_ = "<?php echo ($data["rule"]); ?>";

    $.post("<?php echo U('Home/Index/commit');?>",{type:type_,table:table_,name:userName,tel:userTel},function(result){
      	if (result.code>0) {
        	layer.msg('参与成功',{
          		icon: 1,
                time: 1000 //2秒关闭（如果不配置，默认是3秒）
              });
        	
              var num = $("#now_p").text();
              num = Number(num)+1;
              if(num==parseInt("<?php echo ($list["p1"]); ?>")){
              	$("#now_m").text("<?php echo ($list["m1"]); ?>");
              }else if(num==parseInt("<?php echo ($list["p2"]); ?>")){
              	$("#now_m").text("<?php echo ($list["m2"]); ?>");
              }else if(num==parseInt("<?php echo ($list["p3"]); ?>")){
              	$("#now_m").text("<?php echo ($list["m3"]); ?>");
              }

              $("#now_p").text(num);
            }else{
              	layer.msg(result.msg,{
                	icon: 2,
                	time: 1000 //2秒关闭（如果不配置，默认是3秒）
            });
        }
    });

  $(".share_pop").click(function(){
    $(this).fadeOut(200);
  })
})
</script>

<script type="text/javascript">
  //var Num1=90;//当前数量
  var Num1=parseInt("<?php echo ($data["now_people"]); ?>");//当前数量
  var AllNum1=parseInt("<?php echo ($list["p1"]); ?>");//目标数量1
  var AllNum2=parseInt("<?php echo ($list["p2"]); ?>");//目标数量2
  var AllNum3=parseInt("<?php echo ($list["p3"]); ?>");//目标数量3

  window.onload=function(){
    if(Num1<AllNum1) {
      var _parent = $(".select-1");
    }else if(Num1<AllNum2){
      var _parent = $(".select-2");
    }else if(Num1<AllNum3){
      var _parent = $(".select-3");
    }else if(Num1==AllNum3){
      var _parent = $(".select-4");
    }
    var _postX = _parent.position().left-20;
    _parent.siblings(".screening-select").removeClass("current");
    _parent.addClass("current");
    _parent.siblings(".project-screening-yellow").animate({ width: _postX }, 1000);
  }
</script>


</body>
</html>