<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><?php 
define('TITLE','显示数据页面');?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>循环显示学生成绩</title>
	<link rel="stylesheet" href="basic.css" />
</head>
<body>
	<h1>学生分数显示及存储系统</h1>
	<?php include "top.php"; ?>
<table>
<tr><th>序号</th><th>姓名</th><th>学号</th><th>数学</th><th>语文</th><th>英语</th><th>物理</th><th>化学</th><th>历史</th><th>地理</th><th>生物</th><th>政治</th><th>总分</th></tr>
<?php
include "conn.php";
include "function.php";
$_result = _query($_conn,'SELECT * FROM ss_score LIMIT 0,522');
while (!!$_rows = _fetch_array_list($_result)) {
	$j = 1;
	$_html = array();
	$_html['xh'] = $_rows['s_xh'];
	$_html = _html($_html);
?>
<tr><td><?php echo $j;?></td><td>2</td><td><?php echo $_html['xh'];?></td></tr>
<?php
$j++;
}
mysqli_close($_conn);
?>
<tr></tr>
</table>
<?php
include "footer.php";
?>
</body>
</html>