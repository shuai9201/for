<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><?php define('TITLE','批量写入数据页面'); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>循环显示学生成绩</title>
	<link rel="stylesheet" href="basic.css" />
</head>
<body>
	<h1>学生分数显示及存储系统</h1>
	<?php include "top.php"; ?>
<table>
<tr><th>序号</th><th>姓名</th><th>学号</th><th>数学</th><th>语文</th><th>英语</th><th>物理</th><th>化学</th><th>历史</th><th>地理</th><th>生物</th><th>政治</th></tr>
	<?php
	$_class = $_GET['class'];
	$_room = $_GET['room'];
	include "xm.php";
	include "mzpy.php";
	include "function.php";
	$_people_num = rand(53,61);
	for ($i=1; $i <= $_people_num; $i++) { 
		$_x = $_xs[rand(0,count($_xs)-1)];//姓氏
		$_m = $_mz[rand(0,count($_mz)-1)];//名字
		$_ms = $_mz[rand(0,count($_mz)-1)];//名字
		$_brith = _rt('2013-01-01','2013-8-31');
		$py = new py_class();
		$_sex = rand(0,1);//性别
		if ((count($_xs) % 2) == 0) {//取余得到名字位数
			$_xms = $_x.$_m;//2字名
		}else{
			$_xms = $_x.$_m.$_m;//3字名
		}
		if ($i <= 9) {//学号
			$_xh = "20190{$_class}0{$_room}00".$i;//9以下的
		}else{
			$_xh = "20190{$_class}0{$_room}0".$i;//9以上的
		}
	?><tr>
	<td><?php echo $i;?></td><td><?php echo $_xms;?></td><td><?php echo $_xh;?></td>
	<?php
		for ($o=0; $o < 9; $o++) {//循环成绩单元格
			$_fs[$i][$o] = rand(0,100);
			if ($_fs[$i][0] >= 90) {
				$_fs[$i][$o] = rand(90,100);
			}elseif ($_fs[$i][0] >= 80) {
				$_fs[$i][$o] = rand(90,100);
			}elseif ($_fs[$i][0] >= 70) {
				$_fs[$i][$o] = rand(90,100);
			}elseif ($_fs[$i][0] >= 60) {
				$_fs[$i][$o] = rand(90,100);
			}elseif ($_fs[$i][0] > 50) {
				$_fs[$i][$o] = rand(10,50);
			}else{
				$_fs[$i][$o] = rand(15,50);
			}
			echo "<td>{$_fs[$i][$o]}</td>";
		}
	?>
	</tr>
<?php 
include "conn.php";
$_mzpy=$py->str2pys($_xms);
$_pwd = _pwd(123456);
$_check = _check(6);
$_clas = '0'.$_GET['class'].'0'.$_GET['room'];//班级
 $_into = "INSERT INTO ss_user (s_user,s_pwd,s_sex,s_class,s_name,s_brith,s_check,s_ip,s_date,s_add_r,s_browser,s_state,s_xh)VAlUES('{$_mzpy}','{$_pwd}','{$_sex}','{$_clas}','{$_xms}','{$_brith}','{$_check}','{$_SERVER['REMOTE_ADDR']}',NOW(),'admin','{$_SERVER['HTTP_USER_AGENT']}',1,'{$_xh}')";
 mysqli_query($_conn,$_into);
if (mysqli_affected_rows($_conn) == 1) {
	$_intos = "INSERT INTO ss_score(s_xh,s_sx,s_yw,s_yy,s_hx,s_wl,s_ls,s_dl,s_sw,s_zz,s_add_r,s_add_ip,s_add_date,s_add_browser)VALUES('{$_xh}','{$_fs[$i][0]}','{$_fs[$i][1]}','{$_fs[$i][2]}','{$_fs[$i][3]}','{$_fs[$i][4]}','{$_fs[$i][5]}','{$_fs[$i][6]}','{$_fs[$i][7]}','{$_fs[$i][8]}','leader','{$_SERVER['REMOTE_ADDR']}','NOW()','{$_SERVER['HTTP_USER_AGENT']}')";
	mysqli_query($_conn,$_intos);
	if (mysqli_affected_rows($_conn) == 1){
		echo '记录写入成功!';
	}else{
		echo '记录<font color=red>未</font>写入,受影响的行数：'. mysqli_affected_rows($_conn);
	}
}else{
	echo '记录<font color=red>未</font>写入,受影响的行数：'. mysqli_affected_rows($_conn);
}



mysqli_close($_conn);
} ?>
</table>
<p class="hr">联系我们｜All Right Reserve 版权所有</p>
</body>
</html>