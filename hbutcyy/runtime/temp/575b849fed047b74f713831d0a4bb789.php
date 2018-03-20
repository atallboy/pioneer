<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\www\hbutcyy\public/../application/index\view\activeapply\addApply.html";i:1521010666;}*/ ?>
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

    <link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/global.css">
              <!-- banner--all -->
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/style.css">
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/lrtk.css">
              <!-- header-onblur -->
            <SCRIPT type="text/javascript" src="/static/index/static/js/jquery-1.7.2.min.js"></SCRIPT>

              <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/content.css">
             <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/footer.css">

          <SCRIPT type="text/javascript">
          // Executes the function when DOM will be loaded fully
          $(document).ready(function () { 
              // hover property will help us set the events for mouse enter and mouse leave
              $('.navigation li').hover(
                  // When mouse enters the .navigation element
                  function () {
                      //Fade in the navigation submenu
                      $('ul', this).fadeIn();     // fadeIn will show the sub cat menu
                  }, 
                  // When mouse leaves the .navigation element
                  function () {
                      //Fade out the navigation submenu
                      $('ul', this).fadeOut();     // fadeOut will hide the sub cat menu      
                  }
              );
          });
          </SCRIPT>
		  <style type="text/css">
			.formControls {
				width: 780px;}
				
			.item{color:#555;
				  font-size:14px;
				}
		  </style>

    <title>活动报名</title>
    <meta name="keywords" content="湖北工业大学，创业园">
    <meta name="description" content="">
</head>
<body>

<DIV class="header">
    <DIV class="box-c2">
        <DIV class="logo">
                <TABLE border="0" cellSpacing="0" cellPadding="0">
                  <TBODY>
                     <TR>
                       <TD><IMG title="湖北工业大学创业园" border="0" alt="湖北工业大学创业园" src="/static/index/static/img/logo3.jpg">
                       </TD>
                     </TR>
                   </TBODY>
                 </TABLE>
                 <!--#endeditable-->
        </DIV>
              <DIV class="top-r">
                <DIV class="top-fl">
                    <a href="../../index/Grade/judgeLook">个人中心</a>
                <!--#endeditable-->
                  </DIV>
              </DIV>
              <DIV class="mom"></DIV>
          </DIV>
        </DIV>



<DIV class="nav">
<DIV class="nav-c">
<DIV style="margin: 0px auto; width: 100%;"><!--#begineditable clone="0" namechanged="0" order="2" ispublic="0" tagname="网站导航" viewid="64324" contentviewid="" contype="" stylesysid="" layout="" action="" name="网站导航"-->
<UL class="navigation">
<LI><A href="http://hbutcyy.dxsbb.com/">首页</A>
    <?php  foreach ($nav as $key =>$value){
    echo'
    <LI><A href="#">'.$key.'</A>
        <UL>';
            foreach ($value as $k=>$v){
            echo '
            <LI style="padding: 0px 15px;"><A href="../../index/index/showCategory?id='.$v['id'].'"
                                              target="">'.$v['name'].'</A></LI>';}
            echo'
        </UL>
        <DIV class="clear"></DIV>
    </LI>
    ';}?>

</UL>
<!--#endeditable-->
<DIV class="clear"></DIV></DIV></DIV></DIV>	

<article class="page-container">
    <form action="../../index/Activeapply/addApply" method="post" class="form form-horizontal" id="form-member-add">
	<input type="hidden" value="<?php echo $id; ?>" name="item">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>活动名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="item"><?php echo $name; ?></span>
            </div>
        </div>

	<div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>报名人姓名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="该项为必填项" id="username" name="name">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>报名企业：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="选填" name="team">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>年级：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="grade">
                    <option value="null" selected>请选择</option>
                    <option value="大一">大一</option>
                    <option value="大二">大二</option>
                    <option value="大三">大三</option>
                    <option value="大四">大四</option>
                    <option value="研一">研一</option>
                    <option value="研二">研二</option>
                    <option value="研三">研三</option>
                    <option value="已毕业">已毕业</option>					
                </select>
				</span> </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>学院：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" name="colleage">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>专业：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="" name="major" >
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电话：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="mobile" name="tel">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>QQ：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="" name="QQ" id="email">
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
                name:{
                    required:true,
                    minlength:2,
                    maxlength:16
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