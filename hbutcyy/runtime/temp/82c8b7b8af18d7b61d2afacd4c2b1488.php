<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\www\hbutcyy\public/../application/admin\view\image\showImage.html";i:1520394693;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\header.html";i:1520218805;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\footer.html";i:1520218823;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />


    <link rel="Bookmark" href="/static//favicon.ico" >
    <link rel="Shortcut Icon" href="/static//favicon.ico" />



    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/static/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />



    <link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />    
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />


    <!--[if IE 6]>
    <script type="text/javascript" src="/static/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>湖北工业大学双创基地</title>

</head>

    <title>图片展示</title>
    <link href="/static/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图片管理 <span class="c-gray en">&gt;</span> 查看图片 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="edit()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6df;</i> 编辑</a> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong></strong> 条</span> </div>
    <div class="portfolio-content">
        <ul class="cl portfolio-area">

            <?php foreach ($data as $values){
            echo '
            <li class="item">
                <div class="portfoliobox">
                    <input class="checkbox" name="" type="checkbox" value="'.$values['id'].'">
                    <div class="picbox"><img src="'.$values['url'].'"></div>
                    <div class="textbox">'.$values['image_name'].' </div>
                </div>
            </li>';}?>

            <li class="item">
                <div class="portfoliobox">
                    <input class="checkbox" name="" type="checkbox" value="">
                    <div class="picbox"><a href="temp/big/weishengjian.jpg" data-lightbox="gallery" data-title="卫生间1"><img src="/static/temp/Thumb/weishengjian.jpg"></a></div>
                    <div class="textbox">卫生间1 </div>
                </div>
            </li>

            <li class="item">
                <div class="portfoliobox">
                    <input class="checkbox" name="" type="checkbox" value="">
                    <div class="picbox"><a href="temp/big/weishengjian2.jpg" data-lightbox="gallery" data-title="卫生间2"><img src="/static/temp/Thumb/weishengjian2.jpg"></a></div>
                    <div class="textbox">卫生间2 </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/lightbox2/2.8.1/js/lightbox.min.js"></script>
<script type="text/javascript">
    $(function(){
        $(".portfolio-area li").Huihover();
    });
</script>
</body>
</html>