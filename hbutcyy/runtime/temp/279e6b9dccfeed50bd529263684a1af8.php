<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\www\hbutcyy\public/../application/admin\view\file\editFile.html";i:1520499105;s:45:"../application/admin/view/public/header1.html";i:1515034424;s:44:"../application/admin/view/public/footer.html";i:1520218823;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
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
    <!--/meta 作为公共模版分离出去-->
 
    <title>文件上传</title>
    <meta name="keywords" content="湖北工业大学，创业园">
    <meta name="description" content="">
</head>
<body>

<article class="page-container">
    <form action="editFile" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文件名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $data['oldname']; ?>" placeholder="" id="" name="file_name" style="width:300px;">
            </div>
        </div>

	<div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>原文件：</label>
            <div class="formControls col-xs-8 col-sm-9">
               <?php echo $data['name']; ?>
            </div>
        </div>
	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	<input type="hidden" name="oldfile" value="<?php echo $data['name']; ?>">
		
	
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>新文件：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="file" class="input-text" value="" placeholder="" id="" name="file" style="width:300px;">
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules:{
                apply_name:{
                    required:true,
                    minlength:2,
                    maxlength:16
                },
                team_name:{
                    required:true,
                    minlength:2,
                    maxlength:16
                },
                tel:{
                    isMobile:true,
                },

            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            //	submitHandler:function(form){
            //$(form).ajaxSubmit();
            //var index = parent.layer.getFrameIndex(window.name);
            //parent.$('.btn-refresh').click();
            //parent.layer.close(index);
            //	}
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>