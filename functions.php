<?php
	//对Ta说
	function is_Created($rand){//对Ta说是否存在
		include("connect.php");
		$result = mysqli_query($con,"select * from expression where rand='".$rand."'");
		mysqli_close($con);
		if(mysqli_num_rows($result) < 1){
			return false;
		} else {
			while($row = mysqli_fetch_array($result)) {
				$back = ["rand"=>$row["rand"],"myqq"=>$row["myqq"],"taqq"=>$row["taqq"],"wtsl"=>$row["wtsl"],"wtsd"=>$row["wtsd"],"iurl"=>$row["iurl"],"yy"=>$row["yy"],"checked"=>$row["checked"]];
			}
			return $back;
		}
	}
	
	/* function get_inf($rand) {
		include("connect.php");
		$result = mysqli_query($con,"select * from expression where rand='".$rand."'");
		while($row = mysqli_fetch_array($result)) {
			$back = ["rand"=>$row["rand"],"myqq"=>$row["myqq"],"taqq"=>$row["taqq"],"wtsl"=>$row["wtsl"],"wtsd"=>$row["wtsd"],"iurl"=>$row["iurl"],"yy"=>$row["yy"]];
		}
		mysqli_close($con);
		return $back;
	} */
	
	function get_wyyyy($id) {
		if($id != "") {
			return $id;
		} else {
			return "2132154854";
		}
	}
	
	function get_background($url) {//获取图片
		if($url != ""){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //是否跟着爬取重定向的页面
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //将curl_exec()获取的值以文本流的形式返回，而不是直接输出。
			curl_setopt($ch, CURLOPT_HEADER,  1); // 启用时会将头文件的信息作为数据流输出
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); //设置超时时间
			curl_setopt($ch, CURLOPT_URL, $url);  //设置URL
			curl_setopt($ch, CURLOPT_NOBODY,true);//设置不获取body
			$content = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  //curl的httpcode
			$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE); //获取头大小
			curl_close($ch);
			$headers = substr($content, 0, $headerSize); //根据头大小截取头信息
			$head_data=preg_split('/\n/',$headers);  //逐行放入数组中
			$head_data = array_filter($head_data);  //过滤空数组
			$headers_arr = [];
			foreach($head_data as $val){  //按:分割开
				list($k,$v) = explode(":",$val); //:前面的作为key，后面的作为value，放入数组中
				$headers_arr[$k] = $v;
			}
			$img_type = explode("/",trim($headers_arr['Content-Type']));  //然后将获取到的Content-Type中的值用/分隔开
			if ($httpcode == 200 && strcasecmp($img_type[0],'image') == 0) {//如果httpcode为200，并且Content-type前面的部分为image，则说明该链接可以访问成功，并且是一个图片类型的
				return $url;
			} else {
				return "assets\images\platelet.png";
			}
		} else {
			return "assets\images\platelet.png";
		}
	}
?>