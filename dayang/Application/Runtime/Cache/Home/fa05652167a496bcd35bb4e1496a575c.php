<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>活动列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1，user-scalable=0;">
 <meta name="format-detection" content="telephone=no" /> 
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
    dl.pro_list{overflow: hidden;margin:0 -2%;width: 104%;}
    dl.pro_list a{display: block;width: 100%;}
    dl.pro_list a img{display: block;width: 100%;}
    dl.pro_list dt{width: 100%;}
    dl.pro_list dd{width: 31%;margin:5px 1%;float: left;}
    .tc-anniu{overflow: hidden;background: none;height: 36px;}
    .tc-anniu a{display: block;width:33.33%;float: left;color: #fff;font-style: 16px;font-weight: bold;text-align: center;line-height: 40px !important;height: 40px;}
</style>
</head>
  
<body>
  <div class="index tclist" style="width: 100%;overflow: hidden;">
   <div class="content" style="padding-bottom: 40px;">
    <dl class="pro_list">
      <dt><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=1"><img src="/Public/Home/dayangImg/pro_01.jpg"></a></dt>
      <dd><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=2"><img src="/Public/Home/dayangImg/pro_02.jpg"></a></dd>
      <dd><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=3"><img src="/Public/Home/dayangImg/pro_03.jpg"></a></dd>
      <dd><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=4"><img src="/Public/Home/dayangImg/pro_04.jpg"></a></dd>
      <dd><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=5"><img src="/Public/Home/dayangImg/pro_05.jpg"></a></dd>
      <dd><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=6"><img src="/Public/Home/dayangImg/pro_06.jpg"></a></dd>
      <dd><a href="<?php echo U('Home/Index/detail');?>?rule=1&type=7"><img src="/Public/Home/dayangImg/pro_07.jpg"></a></dd>
    </dl>
     <div class="tc-anniu">
      <a href="<?php echo U('Home/Index/index');?>" style="background: #0a848f;">返回首页</a>
      <a class="sure_btn" style="background: #0bc6d7;">活动说明</a>
      <a href="<?php echo U('Home/Index/store');?>" style="background: #0a848f;">门店信息</a>
    </div>
   
  </div>
  <style>
    .shuoming span{display: block;color: #333;font-size: 14px;}
    .shuoming p{font-size: 12px;color: #666;line-height: 20px;}
  </style>
  <div class="layer_notice">
     <h1>活动说明</h1>
    <div class="shuoming">
    <span>活动主题：0元众筹，预约送好礼赢</span>
    <span>活动时间：2016.8.06—8.08</span>
      <p>1、点击众筹活动进入单品抢购，选择相应产品图片，即可参加单品抢购，抢购需要邀请好友参加报名，当参加人数达到5人、50人、100人，三个阶段会有不同优惠幅度。<br>
      2、点击套餐活动进入套餐抢购，选择参加套餐组合图片，即可参加套餐抢购，抢购需要邀请好友参加报名，当参加人数达到5人、50人、100人，三个阶段会有不同优惠幅度。<br>
      3、邀请好友参加报名人数达到，即可享受最低5折优惠。<br>
      4、同一用户对同一产品只能参与一次，所有参与抢购产品库存都是有限的，先到先得。<br>
      5、使用优惠券兑换时间8月06日-8月08日当天有效。<br>
      6.活动过程中，凡以不正当手段（包括但不限于作弊、恶意套现、虚假交易、扰乱系统、实施网络攻击等）参与活动的用户，我们有权终止其参加活动，并取消资格。活动详情请关注和咨询微信公众号“西门子家电晋蒙”,联系客服。<br>
    7.本活动主办方对本活动拥有最终解释权。
    <br><br><br><br><br>
    </p>
    </div>
  </div>

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
              content: $('.layer_notice'), //捕获的元素
              
               });
			})
</script>
</body>
</html>