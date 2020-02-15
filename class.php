<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><?php define('TITLE','写入数据分流页面'); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>循环显示学生成绩</title>
	<link rel="stylesheet" href="basic.css" />
</head>
<body>
	<h1>学生分数显示及存储系统</h1>
	<?php include "top.php"; ?>
<table>
<tr><th class="class">年级</th><th>班级</th></tr>
<?php
for ($e=1; $e <= 9; $e++) {
	switch ($e) {
		case '1':
			$_cl = '一';
			break;
		case '2':
			$_cl = '二';
			break;
		case '3':
			$_cl = '三';
			break;
		case '4':
			$_cl = '四';
			break;
		case '5':
			$_cl = '五';
			break;
		case '6':
			$_cl = '六';
			break;
		case '7':
			$_cl = '七';
			break;
		case '8':
			$_cl = '八';
			break;
		case '9':
			$_cl = '九';
			break;
		default:
			$_cl = '信息错误！';
			break;
	}
	echo "<tr><td rowspan='9'>{$_cl}年级</td><td><a href='info.php?class={$e}&room=1'>1班</a></td></tr>";
for ($w=2; $w <= 9; $w++) { 
	echo "<tr><td><a href='info.php?class={$e}&room={$w}'>{$w}班</a></td></tr>";
}
}
?>
</table>
<?php
include "footer.php";
?>
</body>
</html>