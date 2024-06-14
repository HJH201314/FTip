<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" /> 
	<title>FTip小站|探索新世界</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/mdui.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/my.min.css" />
</head>
<body class="mdui-theme-primary-teal mdui-theme-accent-orange mdui-drawer-body-left mdui-appbar-with-toolbar">
	
	<?php include("../header.php"); ?>
	
	<div class="mdui-container">
		<div class="mdui-card mdui-m-t-1 mdui-m-b-1">
			<div class="mdui-card-media">
				<img src="../assets/images/card.jpg"/>
				<div class="mdui-card-media-covered">
					<div class="mdui-card-primary">
						<div class="mdui-card-primary-title">探索新世界</div>
						<div class="mdui-card-primary-subtitle">输入关键词,去探索新世界吧!</div>
					</div>
				</div>
			</div>
			<div class="mdui-card-actions mdui-typo">
				<form id="form" action="do_search.php" target="iframe" method="post">
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="飞船启动密钥" id="key" name="key" onChange="check()" autofocus required></textarea>
						<div class="mdui-textfield-error">密钥不能为空</div>
						<div class="mdui-textfield-helper">启动飞船的密钥</div>
					</div>
				</form>
				<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block mdui-color-theme" id="submit" onClick="submit()" disabled>启动飞船通讯装置!</button>
				<iframe id="iframe" name="iframe" style="display:none;"></iframe>
				<div class="mdui-panel" id="panel">
					<div class="mdui-panel-item">
						<div class="mdui-panel-item-header">
							  <div class="mdui-panel-item-title">新世界的讯息</div>
							  <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
						</div>
						<div class="mdui-panel-item-body">
							<p id="content" name="content">输入密钥启动飞船才能接收到新世界的讯息哦~</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include("../footer.php"); ?>
	
	<script src="/assets/js/clipboard.min.js"></script>
	<script type="text/javascript">
	var inst = new mdui.Panel('#panel');
		function check() {
			var isOK = true;
			var key = document.getElementById("key").value;
			if(key == "") {
				isOK = false;
			}
			if(isOK) {
				document.getElementById("submit").disabled = false;
			} else {
				document.getElementById("submit").disabled = true;
			}
		}
		function submit() {
			inst.close(0);
			var myform = document.getElementById("form");
			myform.submit();
		}
	</script>
	<script type="text/javascript">
		var iframer=document.getElementById("iframe");
		var panel=document.getElementById("content");
		iframer.onload= function () {
			var contentr=iframer.contentDocument.body.innerHTML;
			panel.innerHTML = contentr;
			mdui.snackbar({
				message: '收到了来自新世界的讯息!',
				buttonText: '立即查看',
				position: "right-bottom",
				onButtonClick: function(){
					inst.open(0);
				}
			});
		}
	</script>
</body>
</html>