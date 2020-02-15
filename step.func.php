<?php
/**
 * [_black 返回跳转]
 * @param  [type] $_info [description]
 * @return [type]        [description]
 */
function _black($_info){
	echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
  exit();
}
/**
 * [_html 数据过滤]
 * @param  [type] $_string [description]
 * @return [type]          [description]
 */
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
/**
 * [_mysql_string 转义状态判断]
 * @access public
 * @param  [string] $_string [接收数据]
 * @return [string]          [转义数据]
 */
function _mysql_string($_string){
  //如果get_magic..开启状态，那么就不需要转义
  if (!GPC) {
    //retrun mysql_real_escape_string($_string);
   if (is_array($_string)) {
    foreach ($_string as $_key => $_value) {
      $_string[$_key] = _mysql_string($_value);}
      //采用递归，不理解用下面的等式
      //$_string[$_key] =htmlspecialchars($_string)
    }else{
    $_string = mysql_real_escape_string($_string);
  }
  }
    return $_string;
}
/**
 * [_data 信息验证]
 * @param  [type] $_string [字符串]
 * @param  [type] $_info   [提示信息]
 * @return [type]          [description]
 */
function _data($_string,$_info){
	if (empty($_string)) {
		_black($_info);
	}
	return $_string;
}
/**
 * [_location 跳转]
 * @param  [type] $_info [提示信息]
 * @param  [type] $_url  [跳转地址]
 * @return [type]        [description]
 */
function _location($_info,$_url){
  if (!empty($_info)) {
    echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
    exit();
  }else{
    header('Location:'.$_url);
  }
}
?>