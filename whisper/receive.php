<!DOCTYPE html>
<?php
	include("../functions.php");
	$inf = is_Created($_GET["k"]);
	if($inf == false) {
		header("Location:http://tip.fcraft.cn/"); exit;
	//} elseif($inf["checked"] == "false") {
		//header("Location:http://tip.fcraft.cn/message.php?m=该页面未进行验证,暂时无法使用"); exit;
	}
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" /> 
	<title>FTip小站|对你说</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/mdui.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/my.min.css" />
</head>
<body class="mdui-theme-primary-teal mdui-theme-accent-orange mdui-drawer-body-left mdui-appbar-with-toolbar">
	
	<?php include("../header.php"); ?>
	
	<div class="mdui-container">
		<div class="mdui-card mdui-m-t-1 mdui-m-b-1">
			<div class="mdui-card-media">
				<img src="<?php echo get_background($inf["iurl"]); ?>"/>
				<div class="mdui-card-media-covered">
					<div class="mdui-card-primary">
						<div class="mdui-card-primary-title">来自用户<?php echo $inf["myqq"]; ?>的话</div>
						<div class="mdui-card-primary-subtitle">输入你的QQ看看Ta是否有话向你说吧!</div>
					</div>
				</div>
			</div>
			<div class="mdui-card-actions mdui-typo">
				<form id="form">
					<div class="mdui-textfield">
						<input class="mdui-textfield-input" type="text" pattern="^\d{5,11}$" placeholder="你的QQ(必填)" id="inputqq" name="inputqq" onKeyUp="check()"  required />
						<div class="mdui-textfield-error">这不是正确的QQ号</div>
						<div class="mdui-textfield-helper">请输入你的QQ号</div>
					</div>
				</form>
				<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block" id="submit" disabled>揭晓</button>
			</div>
		</div>
		
		<div class="mdui-dialog" id="ldialog">
			<div class="mdui-dialog-content">
				<?php echo $inf["wtsl"]; ?>
			</div>
		</div>
		<div class="mdui-dialog" id="ddialog">
			<div class="mdui-dialog-content">
				<?php echo $inf["wtsd"]; ?>
			</div>
		</div>
    </div>
	
	<?php 
		if($inf["yy"] == "on") {
			include("../footer.php");
		} else {
			echo '<footer>'.
					'<hr />'.
					'<div class="mdui-typo mdui-text-center">'.
						'<p class="mdui-text-color-theme">Copyright © 2018 FCraft.All rights reserved.</p>'.
					'</div>'.
				  '</footer>';
		}
	?>
	
	<script src="/assets/js/md5.min.js"></script>
	<script type="text/javascript">
	function check() {
		var isOK = true;
		var inputqq = document.getElementById("inputqq").value;
		if(inputqq.length < 5 || inputqq.length > 12 || inputqq.search(/^\d{5,11}$/) == -1) {
			isOK = false;
		}
		if(isOK) {
			document.getElementById("submit").disabled = false;
		} else {
			document.getElementById("submit").disabled = true;
		}
	}
	
	document.getElementById('submit').addEventListener('click', function () {
		var inputqq = document.getElementById("inputqq").value;
		var taqq = "<?php echo $inf["taqq"]; ?>";
		var qqs = taqq.split("|");
		var ldialog = new mdui.Dialog('#ldialog');
		var ddialog = new mdui.Dialog('#ddialog');
		if(qqs.in_array(hex_md5(inputqq))==true){
			ldialog.open();
		} else {
			ddialog.open();
		}
	});
	
	Array.prototype.in_array = function (element) { 
　　	for (var i = 0; i < this.length; i++) { 
　　		if (this[i] == element) { 
				return true; 
			} 
		} return false; 
	}
	
	</script>
</body>
</html>