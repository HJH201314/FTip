<?php
$fromurl="http://tip.fcraft.cn/"; //跳转往这个地址。
if( $_SERVER['HTTP_REFERER'] == "" )
{
    header("Location:".$fromurl); exit;
}
        $username = $_POST["reg_username"];
        $password = $_POST["reg_password"];
        $con=mysqli_connect("localhost","FTip","fcraftfcraft","FTip");
        mysqli_query($con,"set names utf8");
        if(!$con){
            echo "注册失败,error_code:10001";
        }
        $dbusername=null;
        $dbpassword=null;
        $result=mysqli_query($con,"select * from user where username='".$username."'");
        while($row = mysqli_fetch_array($result)) {
            $dbusername = $row["username"];
        }
        if(!is_null($dbusername)){
            echo "用户已存在,请 登录 或 更换用户名~";
        } else {
            $password = md5($password);
            $sql = "INSERT INTO user (username,password,tips) VALUES ('$username','$password','5')";
            $result=mysqli_query($con,$sql);
            if($result==false) {
                echo "注册失败,error_code:10002";
            } else {
                echo "注册成功啦!赶紧登录吧~";
            }
        }
        mysqli_close($con);
?>