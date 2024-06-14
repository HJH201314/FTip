<?php
$fromurl="http://tip.fcraft.cn/"; //跳转往这个地址。
if( $_SERVER['HTTP_REFERER'] == "" )
{
    header("Location:".$fromurl); exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$myqq = $_POST["myqq"];
	$taqq = md5($_POST["taqq"]);
	$wtsl = $_POST["wtsl"];
	$wtsd = $_POST["wtsd"];
	$iurl = $_POST["iurl"];
	$yy = $_POST["yy"];
	//数据检查
	if ($myqq == "" || $taqq == "" || $wtsl == "" || $wtsd == "" || $yy == "") {
		die("failed|创建失败!|非法数据!");
	}
} else {
	die("failed|创建失败!|非法请求!");
}

function text_input($data) {//处理输入的数据
  //$data = trim($data);//去除多余字符
  //$data = stripslashes($data);//去除反斜线
  //$data = htmlspecialchars($data);//转义
  return $data;
}

include_once("../connect.php");

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$rand = "";

for ( $i = 0; $i < 10; $i++ ) {
// 这里提供两种字符获取方式 
// 第一种是使用 substr 截取$chars中的任意一位字符； 
// 第二种是取字符数组 $chars 的任意元素 
	$rand .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
}

$dbrand = null;
$result = mysqli_query($con,"select * from expression where rand='".$rand."'");
while($row = mysqli_fetch_array($result)) {
	$dbrand = $row["rand"];
}

if(!is_null($dbrand)){
	echo "failed|创建失败!|未知错误,请重试!";
} else {
	$sql = "INSERT INTO expression (rand,myqq,taqq,wtsl,wtsd,iurl,yy,checked) VALUES ('$rand','$myqq','$taqq','$wtsl','$wtsd','$iurl','$yy','false')";
	$result=mysqli_query($con,$sql);

	if($result==false) {
		echo "failed|创建失败!|写入数据失败,请重试!";
	} else {
		echo "succeed|创建成功啦~|".$rand;
	}
}

mysqli_close($con);
?>