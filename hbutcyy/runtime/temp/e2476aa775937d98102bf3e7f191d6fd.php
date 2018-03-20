<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"C:\websoft\www\pioneer\public/../application/index\view\mobile\detail.html";i:1519786277;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport">

     <!--meta name="viewport" content="width=640,user-scalable=0, target-densitydpi=device-dpi">-->
    <title>湖北工业大学创业园</title>

   <link href="/static/index/static/css/mobile/detail.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="detail">
	<div class="title"><?php echo $data['tittle']; ?></div>
	<div class="beizhu">文章出处：<?php echo $data['source']; ?>  作者：<?php echo $data['author']; ?></div>
	<div class="article">
		<?php echo $data['content']; ?>
	</div>
</div>
</body>
</html1