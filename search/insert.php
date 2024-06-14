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
						<div class="mdui-card-primary-title">Insert</div>
						<div class="mdui-card-primary-subtitle">Insert keys and contents,admin only!</div>
					</div>
				</div>
			</div>
			<div class="mdui-card-actions mdui-typo">
				<form id="form" action="do_insert.php" target="iframe" method="post">
					Insert type:
					<select class="mdui-select" id="type" name="type" mdui-select onChange="check()">
						<option value="1">information</option>
						<option value="2">homework</option>
					</select>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="Key" id="key" name="key" onKeyUp="check()" required></textarea>
						<div class="mdui-textfield-error">Empty key!</div>
						<div class="mdui-textfield-helper">Key</div>
					</div>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="Nick" id="nick" name="nick" onKeyUp="check()" required></textarea>
						<div class="mdui-textfield-error">Empty Nick!</div>
						<div class="mdui-textfield-helper">Nick</div>
					</div>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="Content" id="content" name="content" onKeyUp="check()" required></textarea>
						<div class="mdui-textfield-error">Empty Content!</div>
						<div class="mdui-textfield-helper">Content</div>
					</div>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="Extra" id="extra" name="extra"></textarea>
						<div class="mdui-textfield-helper">Extra</div>
					</div>
					<div class="mdui-textfield">
						<textarea class="mdui-textfield-input" type="text" placeholder="Password" id="pw" name="pw" onKeyUp="check()" required></textarea>
						<div class="mdui-textfield-error">Empty password!</div>
						<div class="mdui-textfield-helper">Password</div>
					</div>
				</form>
				<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block mdui-color-theme" id="submit" onClick="submit()" disabled>Insert!</button>
				<iframe id="iframe" name="iframe" style="display:none;"></iframe>
			</div>
		</div>
	</div>
	
	<?php include("../footer.php"); ?>
	
	<script type="text/javascript">
		function check() {
			var isOK = true;
			var key = document.getElementById("key").value;
			var nick = document.getElementById("nick").value;
			var content = document.getElementById("content").value;
			if(key == "" || content == "") {
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
			mdui.snackbar({
				message: contentr,
				position: "right-bottom"
			});
		}
	</script>
</body>
</html>