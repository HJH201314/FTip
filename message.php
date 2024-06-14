<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" /> 
	<title>FTip小站|提示</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/mdui.min.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/my.min.css" />
</head>
<body class="mdui-theme-primary-teal mdui-theme-accent-orange mdui-drawer-body-left mdui-appbar-with-toolbar">
	
	<?php include("header.php"); ?>
	
	<div class="mdui-container">
		<div class="mdui-dialog" id="dialog">
			<div class="mdui-dialog-content">
				<p class="mdui-text-color-theme"><?php echo $_GET["m"]; ?></p>
			</div>
		</div>
    </div>
	
	<?php include("footer.php"); ?>
	<script type="text/javascript">
		var dialog = new mdui.Dialog('#dialog');
		dialog.open();
		
		dialog.addEventListener('close.mdui.dialog', function () {
			window.location.href = "http://tip.fcraft.cn/";
		});
	</script>
	
</body>
</html>