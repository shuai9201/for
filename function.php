<?php
/**
 * [_rt 随机日期]
 * @param  [type] $_starttime [开始]
 * @param  [type] $_endtime   [结束]
 * @return [type]             [返回日期]
 */
function _rt($_starttime,$_endtime){
	$_starttime = strtotime($_starttime);
	$_endtime = strtotime($_endtime);
	return date('Y-m-d',mt_rand($_starttime,$_endtime));
}
/**
 * [_pwd 密码加密]
 * @param  [type] $_str [密码源码]
 * @return [type]       [返回编译密码]
 */
function _pwd($_str){
	return sha1($_str);
}
/**
 * [_check 随机查询码]
 * @param  [type] $_size [随机码长度]
 * @return [type]        [返回码]
 */
function _check($_size){
	$_chars = array("a","b","c","d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G","H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R","S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2","3", "4", "5", "6", "7", "8", "9");
	shuffle($_chars);//打乱数组
	$_c = "";
	for ($i=0; $i < $_size; $i++) { 
		$_c .= $_chars[mt_rand(0,(count($_chars)-1))];
	}
	return $_c;
}
/**
 * [_location 跳转]
 * @param  [type] $_info [提示内容]
 * @param  [type] $_url  [连接地址]
 * @return [type]        [无返回]
 */
function _location($_info,$_url){
	if (empty($_info)) {
		echo "<script type='text/javascript'>location.href='$_url';</script>";
	}else{
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
	}	
}
/**
 * [_black 返回]
 * @param  [type] $_info [提示内容]
 * @return [type]        [无返回]
 */
function _black($_info){
	echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
  exit();
}
/**①
 * [_query sql语句判断]
 * @param  [string] $_sql [sql语句]
 * @return [void]         [description]
 */
function _query($_conn,$_sql){
  if(!$_result = mysqli_query($_conn,$_sql)){
    exit('SQL执行失败！'.mysqli_error($_conn));
  }
  return $_result;
}
/**②
 * [_fetch_array 返回结果集的数组]
 * @param  [string] $_sql [sql语句]
 * @return [void]         [description]
 * 词句接收sql，走到_query，去_query函数执行，然后返回结果集，在传到此处
 *此条只能获取一条数据组
 */
function _fetch_array($_conn,$_sql){
  return mysqli_fetch_array(_query($_conn,$_sql),MYSQLI_ASSOC);
}
/**
 * [_fetch_array_list 可以返回指定数据集的所有数据]
 * @param  [string] $_result [sql代码]
 * @return [result]          [返回数据结果]
 */
function _fetch_array_list($_result){
  return mysqli_fetch_array($_result,MYSQLI_ASSOC);
}
/**③
 * [_is_repeat 判断有无数据]
 * @return boolean [description]
 */
function _is_repeat($_sql,$_info){
  if(_fetch_array($_sql)){
  _black($_info);
  }
}
//记录集内行数
function _num_rows($_result){
  return mysqli_num_rows($_result);
}
//分页
function _page($_conn,$_sql,$_size){
  global $_pagesize,$_pagenum,$_pageabsolute,$_num,$_page;
  if (isset($_GET['page'])) {
  $_page = $_GET['page'];
  if (empty($_page) || $_page < 0 || !is_numeric($_page)) {
    $_page = 1;
  }else{
    $_page = intval($_page);
  }
}else{
  $_page = 1;
}
$_pagesize = $_size; //每页多少条
//得到所有数据总和
$_num = _num_rows(_query($_conn,$_sql));
//数据库清零情况下
if ($_num == 0) {
  $_pageabsolute = 1;
}else{
  $_pageabsolute = ceil($_num/$_pagesize);
}
//超过总页数，就在最大页数
if ($_page > $_pageabsolute) {
  $_page = $_pageabsolute;
}
$_pagenum = ($_page-1)*$_pagesize;//每页显示数
}
//*执行整个数据库需要①-③步
/**
 * [_close 数据库关闭]
 * @param  [type] $_conn [连接]
 * @return [type]        [无返回]
 */
//提取数据后过滤
function _html($_string){
  if (is_array($_string)) {
    foreach ($_string as $_key => $_value) {
      $_string[$_key] = _html($_value);
      //采用递归，不理解用下面的等式
      //$_string[$_key] =htmlspecialchars($_string)
    }
  }else{
    $_string = htmlspecialchars($_string);
  }
  return $_string;
}
function _close($_conn){
	if (!mysqli_close($_conn)) {
		exit('关闭异常！');
	}
}
?>