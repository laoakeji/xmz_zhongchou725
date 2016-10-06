<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>西门子家电众筹  达洋电器</title>
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


<style>
	.btn_con{position: absolute;width: 100%;bottom:25px;left: 0;}
	.btn_con a{display: block;width: 36%;margin:0 7%;float: left;}
	.btn_con a img{display: block;width: 100%;}
</style>
</head>
  
<body>
  <!-- <h1>活动筹备中......</h1> -->
  <div class="index index1" style="background: url(/Public/Home/dayangImg/index_bg.jpg) no-repeat center center;background-size: 100% 100%;position: relative;">
  	<img style="position: absolute;top:0;left:20px;width: 35%;" src="/Public/Home/dayangImg/logo.png">
    <div class="sy_1">
      <img style="width: 80%;margin:0 auto" src="/Public/Home/dayangImg/sy1.png" class="wow bounceInDown  animated">
    </div>
    <!-- <div class="sy-anniu">
        <a href="<?php echo U('Home/Index/hdlist');?>"></a>
        <a href="<?php echo U('Home/Index/hdtuan');?>"></a>
        <a href="<?php echo U('Home/Index/store');?>"></a>
    </div> -->
    <div class="btn_con">
    	<a href="<?php echo U('Home/Index/hdlist');?>"><img src="/Public/Home/dayangImg/btn_list.png"></a>
    	<a href="<?php echo U('Home/Index/hdtuan');?>"><img src="/Public/Home/dayangImg/btn_btn_suite.png"></a>
    </div>
  </div>
<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/public.js"></script>
<script src="/Public/Home/js/wow.min.js"></script>
</body>
</html>