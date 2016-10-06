<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="UTF-8">
<title>优惠券</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1，user-scalable=0;">
<link type="text/css" rel="stylesheet" href="/Public/Home/css/style.css"/>
<link type="text/css" rel="stylesheet" href="/Public/Home/css/animate.css" />
<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/public.js"></script>
<script src="/Public/Home/js/wow.min.js"></script>
<script  src="/Public/Home/layer/layer.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".sure_btn").click(function(){
			var tag = $(this);
			var ids = tag.attr("ids");
			var img = tag.children("img").attr("ids");
			if(img==0){
				layer.confirm('你确定要使用优惠券吗', {
				   btn: ['确定','取消'] //按钮
				}, function(){
					$.post("<?php echo U('Home/Index/getprize');?>",{type:ids,lt:1},function(result){ 
						if(result.code>0){
							layer.msg('使用成功',{
								icon: 1,
								time: 1000 //2秒关闭（如果不配置，默认昿秒）
							});
							tag.children("img").attr("src","/Public/Home/images/youhuijuan1-1.png");
							tag.children("img").attr("ids","1");
							tag.find("span.dj").text("已使用");
						}else{
							layer.msg(result.msg,{
								icon: 1,
								time: 1000 //2秒关闭（如果不配置，默认昿秒）
							});
						}
					})
				},function(){
					//取消
				})
			}else{
				return;
			}
		});

		$(".sure_4_btn").click(function(){
				var tag = $(this);
				var ids = tag.attr("ids");
				var img = tag.children("img").attr("ids");
				if(img==0){
					layer.confirm('你确定要使用优惠券吗', {
				   	btn: ['确定','取消'] //按钮
					}, function(){
						$.post("<?php echo U('Home/Index/getprize');?>",{type:ids,lt:2},function(result){
	  						if(result.code>0){
								layer.msg('使用成功',{
									icon: 1,
									time: 1000 //2秒关闭（如果不配置，默认昿秒）
								});

								if(ids==1){
									tag.children("img").attr("src","/Public/Home/images/4s.png");
								}else{
									tag.children("img").attr("src","/Public/Home/images/5s.png");
								}
								tag.children("img").attr("ids","1");
								tag.find("span.dj").text("已使用");
							}else{
								layer.msg(result.msg,{
									icon: 1,
									time: 1000 //2秒关闭（如果不配置，默认昿秒）
								});
							}
	  					})
					},function(){
					//取消
					})
				}else{
					return;
				}
			})
	});
</script>


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
  <style>
		html,body{height: 100%;}
  </style>
<body>
  <div class="index youhuijuan" style="min-height:100%;">
    <div class="youhuijuan-main1">
       <a><img src="/Public/Home/icon/yhu-tit.png"  class="wow bounceInLeft animated"></a>
    </div>
    <div class="youhuijuan-main2">
    <ul>
    
	<?php if(is_array($ldata)): $i = 0; $__LIST__ = $ldata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="wow bounceInLeft animated">
	        <a class="sure_btn" ids="<?php echo ($vo["lid"]); ?>">
				<?php if(($vo["pid"]) == "0"): ?><img ids ="0" src="/Public/Home/images/youhuijuan1.png"><?php endif; ?>
		        <?php if(($vo["pid"]) == "1"): ?><img ids ="1" src="/Public/Home/images/youhuijuan1-1.png"><?php endif; ?>
		            
		        <div class="yh">
		            <div class="yh-l">
		                <p><span>型号：</span><?php echo ($llist[$vo['lid']-1]["type"]); ?></p>
		                <p><span>名称：</span><?php echo ($llist[$vo['lid']-1]["name"]); ?></p>
		                <p><span>原价：</span><em><?php echo ($llist[$vo['lid']-1]["m"]); ?></em></p>
		            </div>
		            <div class="yh-r">
		                <div class="yh-r-main">
		                    <span class="gm">当前购买价</span>
		                    <span class="dq">
								<?php switch($vo["lstatus"]): case "0": echo ($llist[$vo['lid']-1]["m"]); break;?>
									<?php case "1": echo ($llist[$vo['lid']-1]["m1"]); break;?>
									<?php case "2": echo ($llist[$vo['lid']-1]["m2"]); break;?>
									<?php case "3": echo ($llist[$vo['lid']-1]["m3"]); break;?>
									<?php default: echo ($llist[$vo['lid']-1]["m"]); endswitch;?>
		                    </span>
		                    <?php if(($vo["pid"]) == "0"): ?><span class="dj">点击使用</span><?php endif; ?>
		                    <?php if(($vo["pid"]) == "1"): ?><span class="dj">已使用</span><?php endif; ?>
		                </div>
		            </div>
		        </div>
	        </a>
	    </li><?php endforeach; endif; else: echo "" ;endif; ?>

	<?php if(is_array($tdata)): $i = 0; $__LIST__ = $tdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tvo): $mod = ($i % 2 );++$i;?><li class="wow bounceInRight animated">
					<a class="sure_4_btn" ids="<?php echo ($tvo["lid"]); ?>">
						<img ids ="<?php echo ($tvo["pid"]); ?>" 
						<?php switch($tvo["lid"]): case "1": if($tvo['pid'] == 0): ?>src='/Public/Home/images/4.png'
		                        <?php else: ?>
		                            src='/Public/Home/images/4s.png'<?php endif; break;?>
						    <?php case "2": if($tvo['pid'] == 0): ?>src='/Public/Home/images/5.png'
		                        <?php else: ?>
		                            src='/Public/Home/images/5s.png'<?php endif; break;?>
						    <?php default: endswitch;?>
					>

                        <div class="yh">
                            <div class="yh-l"> </div>
                            <div class="yh-r">
                                <div class="yh-r-main">
                                    <span class="gm">当前购买价</span>
									<span class="dq">
										<?php switch($tvo["lstatus"]): case "0": echo ($tlist[$tvo['lid']-1]["m"]); break;?>
											<?php case "1": echo ($tlist[$tvo['lid']-1]["m1"]); break;?>
											<?php case "2": echo ($tlist[$tvo['lid']-1]["m2"]); break;?>
											<?php case "3": echo ($tlist[$tvo['lid']-1]["m3"]); break;?>
											<?php default: echo ($tlist[$tvo['lid']-1]["m"]); endswitch;?>
				                    </span>
                                    <?php if(($tvo["pid"]) == "0"): ?><span class="dj">点击使用</span><?php endif; ?>
                                    <?php if(($tvo["pid"]) == "1"): ?><span class="dj">已使用</span><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>


    </ul>

    </div>
   </div>
</body>
</html>