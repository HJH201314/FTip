<footer>
	<hr />
	<div class="mdui-typo mdui-text-center">
		<p class="mdui-text-color-theme">Copyright © 2017-2019 FCraft.All rights reserved.<br /><span class="shake-face mdui-text-color-theme-accent">(●'◡'●)ﾉ♡</span><span id="hitokoto">Loading...</span><span class="shake-face mdui-text-color-theme-accent">O(∩_∩)O</span></p>
	</div>
	<script src="/assets/js/mdui.min.js"></script>
	<script>
		fetch('https://v1.hitokoto.cn')
		.then(function (res){
			return res.json();
		})
		.then(function (data) {
			var hitokoto = document.getElementById('hitokoto');
			hitokoto.innerText = data.hitokoto; 
		})
		.catch(function (err) {
			console.error(err);
		})
	</script>
	<script>
	//百度统计
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?c5edb92621898dde39e05ac995191cf8";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	
	//标题相关
	var title=document.title;
	var t=title.split("|");
	document.getElementById("title").innerText = t[1];
	
	document.addEventListener('visibilitychange', function() {
		var isHidden = document.hidden;
		if (isHidden) {
			document.title = '哎呦快回来(๑•̀ㅂ•́)و✧';
		} else {
			document.title = title;
		}
		});	
	</script>
</footer>