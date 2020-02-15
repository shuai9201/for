<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>写入参数并创建数据库</title>
<style>
p{color:green;size: 1em;}
b{font-style: normal;size: 0.5em;color:red;}
</style>
<?php
include "step.func.php";
if (empty($_POST['send'])) {
	_black('非法操作！');
}
$_clean = array();
$_clean['host'] = _data($_POST['host'],'数据库地址不得为空！');
$_clean['user'] = _data($_POST['user'],'数据库用户名不得为空！');
$_clean['pwd'] = $_POST['pwd'];
$_clean['dbname'] = _data($_POST['dbname'],'数据库名称不得为空！');
$_conn = mysqli_connect($_clean['host'],$_clean['user'],$_clean['pwd']);
mysqli_set_charset($_conn,"utf8");
header('Content-Type: text/html; charset=UTF-8');
if (mysqli_connect_errno($_conn)) {
	die('连接MYSQL失败：'.mysqli_connect_errno());
}
$_file = fopen('install.xml','w') or die("无法打开文件！");
$_frist = '<?xml version="1.0" encoding="utf-8"?>';
$_n = "\n";
fwrite($_file,$_frist.$_n);
fwrite($_file,"<LOCATION>$_n");
fwrite($_file,"<DBHOST>".$_clean['host']."</DBHOST>{$_n}");
fwrite($_file,"<DBUSER>".$_clean['user']."</DBUSER>{$_n}");
fwrite($_file,"<DBPWD>".$_clean['pwd']."</DBPWD>{$_n}");
fwrite($_file,"<DBNAME>".$_clean['dbname']."</DBNAME>");
fwrite($_file,"</LOCATION>");
if (fopen('install.xml','r')) {
	echo "<p>参数设置成功！</p>";
	if (mysqli_select_db($_conn,$_clean['dbname'])) {
		echo "<b>数据库已存在，正在创建 ss_user、ss_score 数据表...</b>";
		include "sql_add.php"; 
		if (mysqli_query($_conn,$_user) AND mysqli_query($_conn,$_score)) {
			echo "<p>数据表 ss_user、ss_score 创建成功！</p>";
			echo "系统会在 5 秒后跳转，如未正常跳转请<a href='index.php'>点击这里</a>";
			sleep(5);
			_location(NULL,'index.php');
		}else{
			_black('数据表建立失败！'.mysqli_error($_conn));
		}
	}else{
		echo '<p>正在创建数据库...</p>';
		$_cds = "CREATE DATABASE {$_clean['dbname']}";
		if (mysqli_query($_conn,$_cds)) {
			echo '<p>数据库创建成功！正在创建ss_user、ss_score数据表...</p>';
			include "sql_add.php";
			if (mysqli_query($_conn,$_user) AND mysqli_query($_conn,$_score)) {
				echo "<p>数据表 ss_user、ss_score 创建成功！</p>";
			echo "系统会在 5 秒后跳转，如未正常跳转请<a href='index.php'>点击这里</a>";
			sleep(5);
			_location(NULL,'index.php');
			}else{
				_black('数据表创建失败！'.mysqli_error($_conn));
			}
		}else{
			_black("数据库创建失败！".mysqli_error($_conn));
		}
	}
}else{
	_black('参数设置失败！');
}
mysqli_close($_conn);
?>