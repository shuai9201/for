<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>循环显示学生成绩</title>
</head>
<body>
<?php
$_file= 'install.xml';
header('Content-Type: text/html; charset=UTF-8');
if (!file_exists($_file)) {
	header("Location:install.php?step=1");
}else{
	header("Location:display.php");
}
?>
</body>
</html>