<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width" /> 
  <title>登录|FTip</title> 
  <link rel="stylesheet" href="/assets/css/mdui.min.css" />  
 </head> 
 <body class="mdui-theme-primary-light-blue mdui-theme-accent-green"> 
  <div class="mdui-container mdui-center">
   <div class="mdui-tab mdui-tab-centered" mdui-tab>
    <a href="#tab-login" class="mdui-ripple mdui-tab-active">登录</a> 
    <a href="#tab-register" class="mdui-ripple">注册</a>
   </div> 
   <div id="tab-login"> 
    <!--登录开始--> 
	<div class="mdui-card mdui-m-y-2">
	 <div class="mdui-m-x-2 mdui-m-y-2">
      <form action="do_log.php" method="post" name="log_form" target="log_iframe">
       <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">用户名</label>
        <input class="mdui-textfield-input" type="text" id="log_username" name="log_username" onKeyUp="log_check()">
       </div>
	   <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">密码</label>
        <input class="mdui-textfield-input" type="password" maxlength="16" id="log_password" name="log_password" onKeyUp="log_check()">
       </div>
        <p class="mdui-text-color-red" id="ltip"></p>
        <input type="submit" id="log_button" value="登录" class="mdui-btn mdui-color-theme-accent" disabled>
      </form>
         <iframe id="log_iframe" name="log_iframe" style="display:none;"></iframe>
         <script>
             var iframel=document.getElementById("log_iframe");
             iframel.onload= function () {
                 var contentl=iframel.contentDocument.body.innerHTML;
                 console.log(contentl);
                 //处理
                 document.getElementById("ltip").innerHTML = contentl;
             }
         </script>
     </div>
	</div>
	<!--登录结束--> 
   </div> 
   <div id="tab-register"> 
    <!--注册开始-->
	<div class="mdui-card mdui-m-y-2">
	 <div class="mdui-m-x-2 mdui-m-y-2">
         <form action="do_reg.php" method="post" name="reg_form" target="reg_iframe">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">用户名</label>
                <input class="mdui-textfield-input" type="text" name="reg_username" id="reg_username" onKeyUp="reg_check()">
                <div class="mdui-textfield-helper"></div>
            </div>
	        <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">密码</label>
                <input class="mdui-textfield-input" type="password" maxlength="16" name="reg_password" id="reg_password" onKeyUp="reg_check()">
            </div>
	        <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">重复密码</label>
                <input class="mdui-textfield-input" type="password" maxlength="16" name="reg_re_password" id="reg_re_password" onKeyUp="reg_check()">
            </div>
	        <p class="mdui-text-color-red" id="rtip"></p>
             <input type="submit" id="reg_button" value="注册" class="mdui-btn mdui-color-theme-accent" onClick="reg_click()" disabled>
         </form>
         <iframe id="reg_iframe" name="reg_iframe" style="display:none;"></iframe>
         <script>
             var iframer=document.getElementById("reg_iframe");
             iframer.onload= function () {
                 var contentr=iframer.contentDocument.body.innerHTML;
                 console.log(contentr);
                 //处理
                 document.getElementById("rtip").innerHTML = contentr;
             }
         </script>
	 </div>
	</div>
	<!--注册结束--> 
   </div>
  </div>
  <script>
      function reg_check(){
          var u = document.getElementById("reg_username").value;
          var p1 = document.getElementById("reg_password").value;
          var p2 = document.getElementById("reg_re_password").value;
          if(u.length>2 && u.length<15 && p1 === p2 && p1 !== "") {
              document.getElementById("reg_button").disabled = false;
          } else {
              document.getElementById("reg_button").disabled = true;
          }
      }
      function log_check(){
          var u = document.getElementById("log_username").value;
          var p = document.getElementById("log_password").value;
          if(u.length>2 && u.length<15 && p !== "") {
              document.getElementById("log_button").disabled = false;
          } else {
              document.getElementById("log_button").disabled = true;
          }
      }
  </script>
  <script src="/assets/js/mdui.min.js"></script>
 </body>
</html>