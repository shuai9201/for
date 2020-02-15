<?php
include "conn.php";
	 $_s_db = mysqli_select_db($_conn,$_db);
   	if (!$_s_db) {
       exit('找不到指定的数据表！');
     }else{
     	echo 'ok';
     }

mysqli_close($_conn);
?>