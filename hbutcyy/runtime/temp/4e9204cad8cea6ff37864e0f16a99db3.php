<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"C:\websoft\www\pioneer\public/../application/index\view\mobile\active.html";i:1519787545;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport">

     <!--meta name="viewport" content="width=640,user-scalable=0, target-densitydpi=device-dpi">-->
    <title>湖北工业大学创业园</title>

   <link href="/static/index/static/css/mobile/active.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="detail">
	<div class="title"><?php echo $data['name']; ?></div>
	<div class="beizhu">发布者：<?php echo $data['publisher']; ?>  </div>
	<div class="article">
		活动时间：<?php echo $data['time']; ?><br>
		活动地点：<?php echo $data['address']; ?><br>
		活动对象：<?php echo $data['object']; ?><br>
		主办方：<?php echo $data['zhubanfang']; ?><br>
		承办方：<?php echo $data['chengbanfang']; ?><br>
		协办方：<?php echo $data['xiebanfang']; ?><br>
		合作伙伴：<?php echo $data['partner']; ?><br>		
		发布时间：<?php echo $data['update_time']; ?><br>
		活动要求：<?php echo $data['regular']; ?><br>
		活动内容：<br><?php echo $data['detail']; ?>
	</div>
</div>
</body>
</html1