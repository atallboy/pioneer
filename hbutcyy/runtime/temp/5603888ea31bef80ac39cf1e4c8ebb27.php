<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\www\hbutcyy\public/../application/index\view\user\mypage.html";i:1520383976;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/static/index/static/css/user/homepage.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
	function change(id){
		obj = document.getElementById('right_a');
		obj.style.display="none";
		obj = document.getElementById('right_b');
		obj.style.display="none";
		obj = document.getElementById('right_c');
		obj.style.display="none";						

		obj = document.getElementById(id);
		obj.style.display="block";
		
	}

	function changeColorIn(id){
		obj = document.getElementById(id);
		obj.style.color="rgb(15,102,188)";		
	}

		function changeColorOut(id){
		obj = document.getElementById(id);
		obj.style.color="rgb(0,0,0)";		
	}

</script>
<title>个人中心</title>
</head>
<body>
<div class="content">
	<div class="first">
		<ul>
			<li><img src="/static/index/static/img/boy.jpg"></li>
		</ul>张坚城的主页</div>
	<div class="second">个人档<span><a href="http://hbutcyy.dxsbb.com/">返回网站首页&nbsp;&nbsp;</a></span></div>
	<div class="three">
		<div class="t-left">
			<ul>
				<li id="self" onclick="change('right_a')" onmouseover="changeColorIn('self')" onmouseout="changeColorOut('self')">个人资料</li>

				<li onclick="change('right_b')">申请记录</li>
				<li onclick="change('right_c')">申请结果</li>
				<li>留言区</li>
				<li><a href="../../index/Grade/applyList">评分系统</a></li>	
				<li>修改资料</li>				
			</ul>
		</div>
		<div class="right_a" id="right_a" >
			<div class="bottom">
				<ul>
					<li>用户名：&nbsp;&nbsp;张坚城</li>
					<li>登陆账号：</li>
					<li>身份：</li>	
					<li>性别：</li>
					<li>年龄：</li>
					<li>学校：</li>
					<li>年级：</li>
					<li>邮箱：</li>
														
				</ul>
			</div>
		</div>
		<div class="right_b" id="right_b">
			hfh
		</div>
		<div class="right_c" id="right_c">
			489
		</div>
	</div>
</div>
</body>
</html>