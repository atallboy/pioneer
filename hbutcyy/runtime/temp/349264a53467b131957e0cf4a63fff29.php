<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\www\hbutcyy\public/../application/index\view\mobile\list.html";i:1521193773;}*/ ?>
<html>
<head>
    <meta charset="UTF-8">
    <!--
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport">

    <meta name="viewport" content="width=640,user-scalable=0, target-densitydpi=device-dpi">-->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">	
    <title>大学生创业园</title>
   <link href="/static/index/static/css/mobile/header.css" rel="stylesheet" type="text/css">
   <link href="/static/index/static/css/mobile/index.css" rel="stylesheet" type="text/css">
   <link href="/static/index/static/css/mobile/footer.css" rel="stylesheet" type="text/css">   
</head>
<body>
<div class="header">
	<a href="http://hbutcyy.dxsbb.com/index.php/index/Mobile/index"><img src="/static/index/static/img/logo3.jpg"></a>
</div>
<div class="nav">
	<div class="menu">
		<div class="clearfloat"></div>
		<ul>
		<li class="menu-left"><a href="http://hbutcyy.dxsbb.com/index.php/index/Mobile/index">首页</a></li>
		<li class="menu-right" onclick="openor()"><div class="menu-box"></div></li>			
		</ul>
	</div>
</div>


<div class="first" id="first">
	<?php
        foreach ($nav as $k=>$v){
        echo '
	<a href="./nav?id='.$v['id'].'&name='.$v['name'].'"><div class="nav-menu">'.$v['name'].'</div></a>';}?>

</div>

<div class="blank"></div>
<div class="news">
	<div class="news-top">
		<div class="news-name"><?php echo $name; ?></div>
	</div>
	<div class="news-list">
		<ul>
			<?php foreach ($data as $k){
                echo '
			<li>
				<a href="./detail?id='.$k['id'].'">
				<span class="l-title">'.$k['tittle'].'</span>
				<span class="l-time">'.$k['publish_time'].'</span>					
				</a>
			</li>';}?>
						
		</ul>
	</div>
</div>

<div class="clearfloat"></div>
<div class="blank"></div>

<div class="footer">
	<div class="f-top"></div>
	<div class="f-center">版权所有 湖北工业大学大学生创业园<br />
地址： 湖北省武汉市洪山区南李路28号 邮编：430068</div>
	<div class="f-bottom"><img src="/static/index/static/img/blue.png"></div>
</div>
</body>
   <script type="text/javascript">
   
		 function openor(){
		 	var value=window.getComputedStyle(document.getElementById("first") , null).display;
		 	 if(value == 'none'){ 	
		 	 	 var obj = document.getElementById("first");  obj.style.display= "block";	 
		 	 }else if(value == 'block'){
		 	 	var obj = document.getElementById("first");  obj.style.display= "none";	
		 	 }
		 }
   </script>
</html>