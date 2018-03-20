<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\www\hbutcyy\public/../application/admin\view\active\editApply.html";i:1521013472;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\header.html";i:1520218805;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\footer.html";i:1520218823;}*/ ?>
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
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add" action="dealActiveApply" method="post">
        <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>报名人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['name']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>报名团队：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['team']; ?>
            </div>
        </div>		
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>报名团队：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['item']; ?>
            </div>
        </div>	
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">审批：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="status" size="1">

                <option value="未认证" <?php if($data['status']=='待处理'){echo 'selected';}?>>待处理</option>
                <option value="通过" <?php if($data['status']=='通过'){echo 'selected';}?>>通过</option>
                <option value="待定" <?php if($data['status']=='待定'){echo 'selected';}?>>待定</option>	
                <option value="报名失败" <?php if($data['status']=='报名失败'){echo 'selected';}?>>报名失败</option>					
            </select>
			</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span></label>
            <div class="formControls col-xs-8 col-sm-9">
               
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
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                adminName:{
                    required:true,
                    minlength:4,
                    maxlength:16
                },

            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "xxxxxxx" ,
                    success: function(data){
                        layer.msg('添加成功!',{icon:1,time:1000});
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>