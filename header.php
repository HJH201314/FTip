<header class="mdui-appbar mdui-appbar-fixed">
	<div class="mdui-toolbar mdui-color-theme">
		<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
		<a href="/" class="mdui-typo-headline mdui-hidden-xs">FTip小站</a>
		<span class="mdui-typo-title" id="title">首页</span>
		<div class="mdui-toolbar-spacer"></div>
		<!--<a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple-white mdui-ripple"><i class="mdui-icon material-icons">search</i></a>-->
		<a href="javascript:location.reload(true);" class="mdui-btn mdui-btn-icon mdui-ripple-white mdui-ripple" mdui-tooltip="{content: '刷新'}"><i class="mdui-icon material-icons">refresh</i></a>
		<a href="javascript:;" class="mdui-btn mdui-btn-icon mdui-ripple-white mdui-ripple" mdui-tooltip="{content: '更多'}"><i class="mdui-icon material-icons">more_vert</i></a>
	</div>
	<!--<audio src="" autoplay loop style="position: fixed;bottom: 1px;right: 1px;float: right;z-index: 66666;">
		你的浏览器不支持此功能
	</audio>-->
	
</header>

<div class="mdui-drawer" id="main-drawer">
	<div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
		<div class="mdui-collapse-item">
			<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
				<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">near_me</i>
				<div class="mdui-list-item-content">开始使用</div>
				<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
			</div>
			<div class="mdui-collapse-item-body mdui-list">
				<a href="#" class="mdui-list-item mdui-ripple">哇</a>
			</div>
		</div>
		<!--item分隔-->
		<div class="mdui-collapse-item">
			<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
				<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">widgets</i>
				<div class="mdui-list-item-content">工具箱</div>
				<i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
			</div>
			<div class="mdui-collapse-item-body mdui-list">
				<a href="/search/" class="mdui-list-item mdui-ripple">探索新世界</a>
			</div>
		</div>
		<!--item分隔-->
		<div class="mdui-collapse-item">
			<a href="/about.php">
			<div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
				<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">flag</i>
				<div class="mdui-list-item-content">关于</div>
			</div>
			</a>
		</div>
	</div>
	<!--<iframe id="wyyyy" frameborder="no" border="0" marginwidth="0" marginheight="0" width=100% height=86 src="http://music.163.com/outchain/player?type=2&id=1297743786&auto=true&height=66"></iframe>-->
</div>