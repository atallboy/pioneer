<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\www\hbutcyy\public/../application/index\view\apply\detail.html";i:1521017185;s:44:"../application/admin/view/public/footer.html";i:1520218823;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
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
    <title>申请列表</title>

</head>
<body>


<div style="width:1000px;height:auto;margin:0 auto;">
<article class="page-container">
    <form action="dealFile" method="post" class="form form-horizontal" id="form-member-add" enctype="multipart/form-data" style="margin-left:-130px;">
       <input type="hidden" name="user_id" value="1">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>申请人姓名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['apply_name']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>团队/公司名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['team_name']; ?>
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>学院：</label>
            <div class="formControls col-xs-8 col-sm-9"> <?php echo $data['college']; ?> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>是否注册公司：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
           <?php   if($data['register']==1){ echo '是';}else{echo '否';}?>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>所属行业：</label>
            <div class="formControls col-xs-8 col-sm-9"> <?php echo $data['industry']; ?> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>联系电话：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['tel']; ?>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>QQ：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php echo $data['qq']; ?>
            </div>
        </div>



        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>申请时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
               <?php echo $data['create_time']; ?>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">项目简介：</label>
            <div class="formControls col-xs-8 col-sm-9">
				<?php echo $data['summary']; ?>
            </div>
        </div>

    </form>
</article>
</div>

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