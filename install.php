<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>系统安装</title>
	<link rel="stylesheet" href="install.css" />
</head>
<body>
	<div id="top"><h1>安装程序-参数配置</h1></div>
	<div id="main">
		<ul><form action="step1.php" method="post">
			<li>数据库主机：<input type="text" name="host" />	<em>一般为localhost</em></li>
			<li>数据库用户：<input type="text" name="user" /><em>数据库用户名</em></li>
			<li>数据库密码：<input type="password" name="pwd" /><em>数据库密码</em></li>
			<li class="bottom">数据库名称：<input type="text" name="dbname" /></li>
		</ul>
		<p id="foot"><input type="reset" value="重置" /><input type="submit" value="提交" name="send" /></p></form>
	</div>
	<?php include "footer.php";?>
</body>
</html>