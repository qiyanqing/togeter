<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>修改分类信息</title>
</head>
<body>
<form action="<?php echo U('admin/category/handleedit');?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo ($a['id']); ?>">
	<!-- 修改分类 ：<select name="parent">
			<?php foreach($category as $v) { ?>
				<option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option>
			<?php } ?>	
			<!-- <option value="0">顶级分类</option>
			<?php foreach($category as $v) { ?>
			<?php echo ($v); ?>
			<?php } ?> -->
		<!-- </select> -->
		<br><br>
	修改名字 :
		<input type="text" name="name" value="<?php echo ($a['name']); ?>"><br>
		<br><br>
	修改icon :
		<input type="file" name="icon" value="<?php echo ($a['icon']); ?>"><br>
		<br><br>
	修改状态 :
		<input type="text" name="status" value="<?php echo ($a['status']); ?>"><br><br>
		<input type="submit" name="">

	</form>
</body>
</html>