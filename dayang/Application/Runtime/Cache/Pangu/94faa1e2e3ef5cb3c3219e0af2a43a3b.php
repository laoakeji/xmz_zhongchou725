<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/Public/Pangu/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/Pangu/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/Public/Pangu/skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="/Public/Pangu/lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/Public/Pangu/lib/jquery/1.9.1/jquery.min.js"></script> 
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>版权所有</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 行业动态 <span class="c-gray en">&gt;</span></nav>
<div class="pd-20">

<!-- <div class="cl pd-5 bg-1 bk-gray mt-20"> 
  <span class="l"><a href="javascript:;" id="" class="btn btn-danger radius del_all"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
  <a class="btn btn-primary radius" onclick="admin_add('添加','<?php echo U('Pangu/Index/edit');?>?table=news&type=<?php echo ($type); ?>','800','800')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加</a>
   </span> 
</div> -->

	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
 					<th width="80">用户ID</th>
 					<th width="150">预约电话</th>
 					<th width="150">预约姓名</th>
          			<th width="80">微信昵称</th>
			        <th width="150">预约商品</th>
			        <th width="150">预约时间</th>
			        <th width="150">兑换时间</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td class="hidden-xs" aid="<?php echo ($vo["id"]); ?>"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" aid="<?php echo ($vo["id"]); ?>" name=""></td>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["uid"]); ?></td>
					<td><?php echo ($vo["tel"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
		          	<td><?php echo ($vo["nickname"]); ?></td>
		          	<td>
		          		<?php if($type == 1 ): switch($vo["lid"]): case "1": echo ($data[0]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php case "2": echo ($data[1]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php case "3": echo ($data[2]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php case "4": echo ($data[3]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php case "5": echo ($data[4]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php case "6": echo ($data[5]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php case "7": echo ($data[7]["name"]); ?> <?php echo ($data[0]["type"]); break;?>
							    <?php default: ?>none<?php endswitch;?>
						<?php else: ?>
							<?php switch($vo["lid"]): case "1": echo ($data[0]["type"]); break;?>
							    <?php case "2": echo ($data[1]["type"]); break;?>
							    <?php default: ?>default<?php endswitch; endif; ?>
		          	</td>
		          	<td>
		          		<?php if($vo["c_time"] != 0 ): echo (date("Y-m-d H:i",$vo["c_time"])); endif; ?>
		          	</td>
		          	<td>
						<?php if($vo["e_time"] != 0 ): echo (date("Y-m-d H:i",$vo["e_time"])); endif; ?>
		          	</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
		<?php echo ($page); ?>
	</div>
</div>
<script type="text/javascript" src="/Public/Pangu/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Pangu/lib/layer/1.9.3/layer.js"></script> 
<script type="text/javascript" src="/Public/Pangu/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/Pangu/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/Pangu/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/Pangu/js/H-ui.admin.js"></script>
<script type="text/javascript">

function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
function admin_edit(title,url,w,h){
	layer_show(title,url,w,h);
}
</script>
</body>
</html>