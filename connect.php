<?php
/* $fromurl="http://tip.fcraft.cn/"; //跳转往这个地址。
if( $_SERVER['HTTP_REFERER'] == "" )
{
    header("Location:".$fromurl); exit;
} */
$host="localhost";
$db_user="tip_fcraft_cn";
$db_pass="Tip0900opi";
$db_name="tip_fcraft_cn";
$timezone="Asia/Shanghai";
 
$con=mysqli_connect($host,$db_user,$db_pass);//连接数据库主机
if(!$con){
	die("failed|创建失败!|数据库连接失败!");
}
mysqli_select_db($con,$db_name);//选择数据库
mysqli_query($con,"SET names UTF8");//设置数据库编码格式

header("Content-Type: text/html; charset=utf-8");//设置头部样式
date_default_timezone_set($timezone); //北京时间
?>