<?php
	if($_GET["key"] != ""){
		$key = $_GET["key"];
	} elseif ($_POST["key"] != ""){
		$key = $_POST["key"];
	}
	if($key != "") {
		include_once("../connect.php");
		$result = mysqli_query($con,"select * from search where `key`='".$key."'");
		while($row = mysqli_fetch_array($result)) {
			$information = $row["information"];
			$extra = $row["extra"];
		}
		if($information == "") {
			$result = mysqli_query($con,"select * from search where `nick`='".$key."'");
			while($row = mysqli_fetch_array($result)) {
				$information = $row["information"];
				$extra = $row["extra"];
			}
		}
		mysqli_close($con);
		if($information == "") {
			$information = "新世界拒绝了你的请求!";
		}
		if($_POST["difficulty"] != "" && $extra != "") {
			$arr_extra = json_decode($extra);
			foreach($arr_extra as $key => $nr){
				if(count($nr) == 2) {
					$information = $information."<br />".$key.".".$nr[0]." ".$nr[1];
				} elseif(count($nr) == 1) {
					$information = $information."<br />".$key.".".$nr[0];
				}
			}
		}
		die($information);
	} else {
		die("信号传输故障");
	}
?>