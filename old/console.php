
<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width" /> 
  <title>控制台|FTip</title> 
  <link rel="stylesheet" href="/assets/css/mdui.min.css" />  
 </head> 
 <body class="mdui-theme-primary-light-blue mdui-theme-accent-green mdui-drawer-body-left mdui-appbar-with-toolbar mdui-appbar-with-tab"> 
  <div class="mdui-container mdui-center">
	<div class="mdui-appbar mdui-appbar-fixed">
     <div class="mdui-toolbar mdui-color-theme-700">
      <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#main_drawer'}"><i class="mdui-icon material-icons">menu</i></a>
      <a href="javascript:;" class="mdui-typo-title">控制台|FTip</a>
      <div class="mdui-toolbar-spacer"></div>
       <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></a>
       <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
       <a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">more_vert</i></a>
      </div>
    </div>
	<?php include('drawer.php'); ?>
   </div>
  <script src="/assets/js/mdui.min.js"></script>
 </body>
</html>