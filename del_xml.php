<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>删除配置文件及数据库</title>
	<style>
	p{color:green;size: 1em;}
	i{font-style: normal;color: red;size:1em; }
	</style>
</head>
<body>
	<?php
header("Content-Type:text/html;charset=utf-8");
include "step.func.php";
include "conn.php";
$_file = "install.xml";
if(file_exists($_file)){
	$_sql = "DROP DATABASE {$_db}";
	echo '<p>数据库删除中...</p>';
	if(!mysqli_query($_conn,$_sql)){
		echo '<i>删除数据库失败！</i>'.mysqli_error($_conn).'<br />';
		echo '<p>配置文件删除中...</p>';
		$_del = unlink($_file);
		if ($_del) {
			echo '<p>配置文件删除完毕！系统将在 5 秒后跳转，如未跳转请</p> <a href="index.php">点击这里</a>';
			sleep(5);
			_location(NULL,'index.php');
		}else{
			_black('<i>配置文件删除失败！</i>');
		}
	}else{
		echo '<p>数据库删除完毕！正在删除配置文件...</p>';
		$_del = unlink($_file);
		if ($_del) {
			echo '<p>配置文件删除完毕！系统将在 5 秒后跳转，如未跳转请</p> <a href="index.php">点击这里</a>';
			_location(NULL,'index.php');
		}else{
			_black('配置文件删除失败！');
		}
	}
}else{
	_location('配置文件不存在！','index.php');
}
mysqli_close($_conn);
?>
</body>
</html>