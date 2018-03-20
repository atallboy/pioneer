<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\www\hbutcyy\public/../application/admin\view\index\indexpp.html";i:1520394945;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\header.html";i:1520218805;s:67:"D:\www\hbutcyy\public/../application/admin\view\public\example.html";i:1520990097;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\footer.html";i:1520218823;}*/ ?>
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
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/index.php/admin/index/index">大学生创业园后台管理中心</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/index.php/admin/index/index"></a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>


            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>super admin</li>
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A">root<i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="#">切换账户</a></li>
                            <li><a href="#">退出</a></li>
                        </ul>
                    </li>

                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</header>

<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 栏目管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="addFirstList" data-title="一级栏目" href="javascript:void(0)">一级栏目</a></li>
                    <li><a data-href="addSecondList" data-title="二级栏目" href="javascript:void(0)">二级栏目</a></li>
                    <li><a data-href="modifyList" data-title="修改栏目" href="javascript:void(0)">修改栏目</a></li>
                    <li><a data-href="haveList" data-title="已有栏目" href="javascript:void(0)">已有栏目</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe622;</i> 内容管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../detail/detail" data-title="查看内容" href="javascript:;">查看内容</a></li>
                    <li><a data-href="../detail/addDetail" data-title="添加内容" href="javascript:void(0)">添加内容</a></li>

                </ul>
            </dd>
        </dl>
        <dl>
            <dt><i class="Hui-iconfont">&#xe622;</i> 活动管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../active/addActive" data-title="发布活动" href="javascript:void(0)">发布活动</a></li>
                    <li><a data-href="../active/activeList" data-title="活动列表" href="javascript:;">活动列表</a></li>
                    <li><a data-href="../active/applyList" data-title="活动申请列表" href="javascript:;">活动申请列表</a></li>
                </ul>
            </dd>
        </dl>

         <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe622;</i> 文件管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../file/upload" data-title="文件上传" href="javascript:;">文件上传</a></li>
                    <li><a data-href="../file/fileList" data-title="文件列表" href="javascript:void(0)">文件列表</a></li>
                </ul>
            </dd>
        </dl>  

        <dl id="menu-comments">
            <dt><i class="Hui-iconfont">&#xe622;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../image/addImage" data-title="添加图片" href="javascript:void(0)">添加图片</a></li>
                    <li><a data-href="../image/showImage" data-title="查看内容" href="javascript:;">查看图片</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../../index/user/showUser" data-title="用户列表" href="javascript:;">用户列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../administrator/addPage" data-title="添加管理员" href="javascript:void(0)">添加管理员</a></li>
                    <li><a data-href="../administrator/editAdministrator" data-title="修改管理员" href="javascript:void(0)">修改管理员</a></li>
                    <li><a data-href="../administrator/showAdministrator" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-apply">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 申请管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../../index/apply/showApply" data-title="申请列表" href="javascript:void(0)">申请列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-public">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 发布管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../Content_public/addContentPublic" data-title="发布管理" href="javascript:;">添加发布</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-system">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 静态化<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="../../index/Staticpage/staticByOne" data-title="页面静态化" href="javascript:;">页面静态化</a></li>				
                    <li><a data-href="../../index/Staticpage/staticByAll" data-title="页面静态化" href="javascript:;">批量静态化</a></li>

                </ul>
            </dd>
        </dl>		
        <dl id="menu-system">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="javascript:void(0)">系统设置</a></li>

                </ul>
            </dd>
        </dl>
    </div>
</aside>


<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
        </div>
    </div>
</section>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
