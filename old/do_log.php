<?php
$fromurl="http://tip.fcraft.cn/"; //跳转往这个地址。
if( $_SERVER['HTTP_REFERER'] == "" )
{
    header("Location:".$fromurl); exit;
}
    $username = $_POST["log_username"];
    $password = $_POST["log_password"];
    $con=mysqli_connect("localhost","FTip","fcraftfcraft","FTip");
    mysqli_query($con,"set names utf8");
    if(!$con){
        echo "注册失败,error_code:10001";
    }
    $dbusername=null;
    $result=mysqli_query($con,"select * from user where username='".$username."' AND password='".md5($password)."'");
    while($row = mysqli_fetch_array($result)) {
        $dbusername = $row["username"];
    }
    if(!is_null($dbusername)) {
        echo "用户已存在,请 登录 或 更换用户名~";
    } else {
        echo "用户名或密码错误~";
    }
    mysqli_close($con);
?>