<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\www\hbutcyy\public/../application/admin\view\index\modifyList.html";i:1514979745;}*/ ?>
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
        }
        a{
            text-decoration: none;
            color: #646464;
            font-size: small;
        }
        .edit_a{
                     float: right;
                    line-height: 35px;

                 }
        .del_a{
            float: right;
            margin-right: 15px;
            line-height: 35px;
        }
        .edit_b{
            float: right;
            line-height: 25px;
        }
        .del_b{
            float: right;
            margin-right: 15px;
            line-height: 25px;
        }
    </style>
</head>
<body>
<div class="box">
    <?php foreach ($data as $key => $values){
    if($key=='无上级栏目'){
    echo '<dl class="line"><dt class="line_a">'.$key.'<a href="alterList.html?type=1&data='.$key.'"></a>
    <a href="alterList.html?behavior=del&type=1&data='.$key.'"></a>
</dt>';
    }
    else{
    echo '<dl class="line"><dt class="line_a">'.$key.'<a href="alterList.html?type=1&data='.$key.'" class="edit_a">修改</a>
        <a href="alterList.html?behavior=del&type=1&data='.$key.'" class="del_a">删除</a>
    </dt>';}
        foreach ($values as $value){
        echo '<dd class="line_b">'.$value.'<a href="alterList.html?type=2&data='.$value.'" class="edit_b">修改</a>
            <a href="alterList.html?behavior=del&type=2&data='.$value.'" class="del_b">删除</a>
        </dd>';
        }
        echo '</dl>';
    }?>
</div>


</body>
</html>