<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\www\hbutcyy\public/../application/admin\view\index\haveList.html";i:1514979729;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style type="text/css">
        .box{
            width: 300px;
            height: 100%;
            padding-left: 50px;
            padding-top: 30px;
        }
        .line_a{
            font-size: 16px;
            height: 35px;;
            line-height: 35px;
        }
        .line_b{
            font-size: small;
            height: 25px;
            line-height: 25px;
            margin-left: 80px;;


    </style>
</head>
<body>
<div class="box">
    <?php foreach ($data as $key => $values){
    echo '<dl class="line"><dt class="line_a">'.$key.'</dt>';
    foreach ($values as $value){
    echo '<dd class="line_b">'.$value.'</dd>';
    }
    echo '</dl>';
    }?>

</div>



</body>
</html>