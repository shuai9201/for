<?php
$xml = simplexml_load_file('install.xml');
$_host = $xml->DBHOST;
$_user = $xml->DBUSER;
$_pwd = $xml->DBPWD;
$_db = $xml->DBNAME;
$_conn = mysqli_connect($_host,$_user,$_pwd,$_db);
mysqli_set_charset($_conn,"utf8");
header('Content-Type: text/html; charset=UTF-8');
if (mysqli_connect_errno($_conn)) {
	dir('连接MYSQL失败：'.mysqli_connect_errno());
}


/*
影响数据库记录代码
if (mysqli_affected_rows($_conn) == 1) {
	echo "记录<font color=GREEN>已</font>写入,受影响的行数: " . mysqli_affected_rows($_conn); 
}else{
	echo '记录<font color=red>未</font>写入,受影响的行数：'. mysqli_affected_rows($_conn);
}*/
?>