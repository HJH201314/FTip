<?php
if($_POST["pw"] == "hjh201314233666"){
	$_POST["content"] = str_replace(PHP_EOL, "<br />".PHP_EOL, $_POST["content"]);
	switch($_POST["type"]){
		case "information":
		case "1":
			if($_POST["key"] != "" && $_POST["nick"] != "" && $_POST["content"] != "") {
				include_once("../connect.php");
				$key = str_replace("'","''",$_POST["key"]);
				$nick = str_replace("'","''",$_POST["nick"]);
				$content = str_replace("'","''",$_POST["content"]);
				$extra = "";
				$sql = "INSERT INTO search (`key`,nick,information,extra) VALUES ('$key','$nick','$content','$extra')";
				$result = mysqli_query($con,$sql);
				if($result == false) {
					//die("Warn:result false!");
					$sql = "UPDATE search SET nick='$nick',information='$content',extra='$extra' WHERE `key`='$key'";
					$result = mysqli_query($con,$sql);
					mysqli_close($con);
					if($result == false) {
						die("Warn: Insert failed!");
					} else {
						die("Update successfully");
					}
				} else {
					mysqli_close($con);
					die("Insert successfully");
				}
			} else {
				die("Warn:Something empty!");
			}
		case "homework":
		case "2":
			if($_POST["key"] != "" && $_POST["nick"] != "" && $_POST["content"] != "" && $_POST["extra"] != "") {
				include_once("../connect.php");
				$key = str_replace("'","''",$_POST["key"]);
				$nick = str_replace("'","''",$_POST["nick"]);
				$content = str_replace("'","''",$_POST["content"]);
				
				$pre1 = explode(PHP_EOL,$_POST["extra"]);//处理答案
				foreach ($pre1 as $pre1_each) {
					$pre2_each = explode(",",$pre1_each);
					if(count($pre2_each) == 3) {
						$pre[$pre2_each[0]] = array($pre2_each[1],$pre2_each[2]);
					}else {
						die("Warn:Split mistake!");
					}
				}
				$extra = json_encode($pre);
				
				$sql = "INSERT INTO search (`key`,nick,information,extra) VALUES ('".$key."','".$nick."','".$content."','".$extra."')";
				$result = mysqli_query($con,$sql);
				mysqli_close($con);
				if($result == false) {
					die("Warn:result false!");
				} else {
					die("Insert successfully");
				}
			} else {
				die("Warn:Something empty!");
			}
		default:
			die("Warn:You are so clever!");
	}
	
}
?>