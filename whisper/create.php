<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" /> 
	<title>FTip小站|对Ta说</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/mdui.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/my.min.css" />
</head>
<body class="mdui-theme-primary-teal mdui-theme-accent-orange mdui-drawer-body-left mdui-appbar-with-toolbar">
	
	<?php include("../header.php"); ?>
	
	<div class="mdui-container">
		<div class="mdui-card mdui-m-t-1 mdui-m-b-1">
			<div class="mdui-card-media">
				<img src="/assets/images/platelet.png"/>
				<div class="mdui-card-media-covered">
					<div class="mdui-card-primary">
						<div class="mdui-card-primary-title">对Ta说</div>
						<div class="mdui-card-primary-subtitle">有话对Ta说?在这快速生成链接吧!</div>
					</div>
				</div>
			</div>
			<div class="mdui-card-actions mdui-typo">
				<form id="form" action="do_create.php" target="iframe" method="post">
					<div class="mdui-textfield">
						<input class="mdui-textfield-input" type="text" pattern="^\d{5,11}$" placeholder="你的QQ(必填)" id="myqq" name="myqq" onKeyUp="check()"  required />
						<div class="mdui-textfield-error">这不是正确的QQ号</div>
					</div>
					<div class="mdui-textfield">
						<input class="mdui-textfield-input" type="text" pattern="^\d{5,11}$" placeholder="Ta的QQ(必填)" id="taqq" name="taqq" onKeyUp="check()"  required />
						<div class="mdui-textfield-error">这不是正确的QQ号</div>
					</div>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="对Ta说(必填)" id="wtsl" name="wtsl" onKeyUp="check()" required></textarea>
						<div class="mdui-textfield-error">对Ta说的话不能为空</div>
						<div class="mdui-textfield-helper">对方输入QQ后会显示的话</div>
					</div>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="对其他人说(必填)" id="wtsd" name="wtsd" onKeyUp="check()" required></textarea>
						<div class="mdui-textfield-error">对其他人说的话不能为空</div>
						<div class="mdui-textfield-helper">其他人输入QQ后会显示的话</div>
					</div>
					<div class="mdui-textfield">
						<input class="mdui-textfield-input" type="text" pattern="^((https|http)?:\/\/)[^\s]+" placeholder="图片链接(选填)" id="iurl" name="iurl" onKeyUp="check()" required />
						<div class="mdui-textfield-error" id="iurl_err">这不是正确的链接</div>
						<div class="mdui-textfield-helper">生成网页中显示的图片链接(请带上http(s)://)</div>
					</div>
					<label class="mdui-switch">
						<input type="checkbox" id="yy" name="yy" checked />
						<i class="mdui-switch-icon"></i>
						显示一言
					</label>
				</form>
				<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block" id="submit" onClick="submit()" disabled>创建 对Ta说 !</button>
				<iframe id="iframe" name="iframe" style="display:none;"></iframe>
			</div>
		</div>
	</div>
	
	<?php include("../footer.php"); ?>
	
	<script src="/assets/js/clipboard.min.js"></script>
	<script type="text/javascript">
		function check() {
			var isOK = true;
			var myqq = document.getElementById("myqq").value;
			var taqq = document.getElementById("taqq").value;
			var wtsl = document.getElementById("wtsl").value;
			var wtsd = document.getElementById("wtsd").value;
			if(myqq.length < 5 || taqq.length < 5 || wtsl == "" || wtsd == "" || myqq.search(/^\d{5,11}$/) == -1 || taqq.search(/^\d{5,11}$/) == -1) {
				isOK = false;
			}
			if(isOK) {
				document.getElementById("submit").disabled = false;
			} else {
				document.getElementById("submit").disabled = true;
			}
		}
		function submit() {
			var myform = document.getElementById("form");
			myform.submit();
		}
	</script>
	<script type="text/javascript">
		var iframer=document.getElementById("iframe");
		iframer.onload= function () {
			var contentr=iframer.contentDocument.body.innerHTML;
			var cw=contentr.split("|");
			//console.log(contentr);
			//处理
			if(cw[0]=="succeed") {
				var clipboard;
				mdui.dialog({
					title: cw[1],
					content:
					'<div class="mdui-typo">' +
					  '<div class="mdui-m-b-1">' +
						'<label class="mdui-text-color-black-secondary">点击复制你的表白链接:</label><br />' +
						'<code class="js-icon-code-copy" data-clipboard-text=\'http://tip.fcraft.cn/whisper/receive.php?k=' + cw[2] + '\' mdui-tooltip="{content: \'点击复制链接\'}">' +
						  'http://tip.fcraft.cn/whisper/receive.php?k=' + cw[2] +
						'</code><br />' +
						//'<p class="mdui-text-color-theme">你需要加机器人QQ<a href="http://qm.qq.com/cgi-bin/qm/qr?k=PNfP_881zYiAjkYCf3lJYNvGKnKhqD7w" target="_blank">1440926149</a>并发送上方链接进行验证!</p>' +
					  '</div>' +
					'</div>',
					onOpen: function (inst) {
						clipboard = new Clipboard('.js-icon-code-copy');
						clipboard.on('success', function(e) {
							mdui.snackbar({
								message: '复制成功'
							});
							e.clearSelection();
						});
						clipboard.on('error', function(e) {
							mdui.snackbar({
								message: '复制失败，请手动复制'
							});
						});
					},
					onClosed: function () {
						clipboard.destroy();
						location.reload(true);
					}
				});
			} else {
				mdui.dialog({
					title:cw[1],
					content:
					'<div class="mdui-typo">' +
					  '<div class="mdui-m-b-1">' +
						'<label class="mdui-text-color-black-secondary">' + cw[2] + '</label>' +
					  '</div>' +
					'</div>'
				});
			}
		}
	</script>
</body>
</html>