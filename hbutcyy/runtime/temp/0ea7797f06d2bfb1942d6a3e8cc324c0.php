<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\www\hbutcyy\public/../application/index\view\user\addUser.html";i:1520995130;}*/ ?>
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
		  
		  
		  function checkUser(){
			var name = $("#username").val();
            $.ajax({
            //几个参数需要注意一下
                type: "GET",//方法类型
                dataType: "html",//预期服务器返回的数据类型
                url: "http://hbutcyy.dxsbb.com/index.php/index/user/checkUser?name="+name ,//url
                success: function (result) {
					if(result=='false'){
						alert('该用户名已被注册，请更换');
						$("#username").val('');
					}
					
                },
                error : function() {
                    alert("修改失败");
                }
            });	
		  }
		  
		  
          </SCRIPT>
		  <style type="text/css">
			.formControls {
				width: 780px;}
		  </style>

<title>用户注册</title>
<meta name="keywords" content="湖北工业大学，创业园">
<meta name="description" content="">
</head>
<body>



<DIV class="header">
    <DIV class="box-c2">
        <DIV class="logo"><!--#begineditable clone="0" namechanged="0" order="0" ispublic="0" tagname="LOGO" viewid="64319" contentviewid="" contype="" stylesysid="" layout="" action="" name="LOGO"-->
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
		
					<a href="../../index/apply/addApply" style="font-size:15px;color:rgb(0,91,172);font-family: Arial;">申请入园&nbsp;</a>

                    <a href="../../index/Grade/judgeLook">个人中心</a>
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
	<form action="../../index/User/addUser" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="username" name="user_name" onmouseout="checkUser()">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>登陆账号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value=""  id="user_id" name="user_id" placeholder="此为每次登陆所需账号，请勿泄露并牢记">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>登录密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder=""  name="password2">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>身份：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="role">
					<option value="null" selected>请选择</option>
					<option value="student">学生</option>
					<option value="teacher">教师</option>
					<option value="jury">评委</option>
					<option value="employee">创业园员工</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" value="男" checked>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" value="女">
					<label for="sex-2">女</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="tel">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="email" id="email">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>学校：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="school">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>年级：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" name="grade">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么..." onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
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
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			user_id:{
				required:true,
				minlength:6,
				maxlength:16
			},
			password:{
				required:true,
				minlength:6,
				maxlength:16
			},
			password2:{
				required:true,
				minlength:6,
				maxlength:16
			}

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