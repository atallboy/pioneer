<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\www\hbutcyy\public/../application/admin\view\detail\showDetail.html";i:1514882332;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="/static/index/detail.css" />
</head>
<body>
<div class="box">
    <div class="content">
        <h1><?php echo $data[0]['tittle']; ?></h1>
        <div class="info">
            <ul>
                <span class="time"><?php echo $data[0]['create_time']; ?></span>&nbsp;&nbsp;
                <span class="author"><?php echo $data[0]['author']; ?></span>&nbsp;&nbsp;
                <span class="source"><?php echo $data[0]['source']; ?></span>
            </ul>
        </div>
        <div class="msg">
            <?php echo $data[0]['content']; ?>
       </div>
    </div>
</div>
</body>
</html>