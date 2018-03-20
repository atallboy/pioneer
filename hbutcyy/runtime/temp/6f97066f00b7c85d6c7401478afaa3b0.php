<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\www\hbutcyy\public/../application/index\view\user\login.html";i:1520567562;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>登录湖工创业园</title>
    <script type="text/javascript">
    
    
    
    
	/*if (top != self){
 		top.location.href = "/sso/login";
 	}*/
 	
 	if (top != self){
		try{
			if (top.location.protocol != "file:" && top != self){
				top.location.href = "/sso/login";
			}
		}catch(err){
			if(document.location.protocol=="https:"||document.location.protocal=="http:"){
                top.location.href = "/sso/login";
            }
        }  
	}

function defaultLocal(){
	$.post("/sso/getSysConfigLocals",function(data){
		if(data!='' && data.length>1){
			$("#language").show();
			for ( var a = 0; a < data.length; a++) {
				if(data[a].prZhValue!='' && data[a].prZhValue!=null){
					$("#"+data[a].prZhValue).show();
				}
			}
		}
	});
}
        $(document).ready(function() {
        	nintRandomCode();
        	var isShowRandomCode = $('#isShowRandomCode').val();
        	$('#un').val('');
        	$('#randomCode').val('');
        	
            $('#login_btn').bind('click', function() {
                disableBtn();
            });
            $("#un").keydown(function(event){
                if(event.keyCode==13){
                    var unVal = $("#un").val();
                    var pdVal = $("#pd").val();
                    if(unVal!='' && pdVal!=''){
                        disableBtn();
                    }else if(unVal==''){
                        $("#un").focus();
                    }else if(pdVal==''){
                        $("#pd").focus();
                    }
                }
            });
            $("#pd").keydown(function(event){
                if(event.keyCode==13){
                    var unVal = $("#un").val();
                    var pdVal = $("#pd").val();
                    var randomCode = $("#randomCode").val();
                    if(unVal!='' && pdVal!=''){
                        disableBtn();
                    }else if(unVal==''){
                        $("#un").focus();
                    }else if(pdVal==''){
                        $("#pd").focus();
                    }
                }
            });
            if(isShowRandomCode=='1'){
	            $("#randomCode").keydown(function(event){
	                if(event.keyCode==13){
	                    var unVal = $("#un").val();
	                    var pdVal = $("#pd").val();
	                    var randomCode = $("#randomCode").val();
	                    if(unVal!='' && pdVal!='' && randomCode!=''){
	                        disableBtn();
	                    }else if(unVal==''){
	                        $("#un").focus();
	                    }else if(pdVal==''){
	                        $("#pd").focus();
	                    }else if(randomCode==''){
	                    	$("#randomCode").focus();
	                    }
	                }
	            });
            }
           initHideLoginType();
        });
        
        
        function initHideLoginType() {
            $("#RSA_id").hide();
            $("#ukey_id").hide();
            $("#sms_id").hide();
            $("#ad_ldap_div").hide();
        }
        function disableBtn() {
            $("#loginForm").submit();
        }
        function doRSALogin() {
            $("#authType").val("otp");
            $("#pd-clone").val("请输入动态码");
        }

 //validate login Way
  function checkLoginWay(){
      var uid = $.trim($("#un").val());
      if (uid != null && uid != '' && uid != "用户名") {
          var url = "/sso/loginAuth/forwardAuthType";
          var transObj = {};
          transObj.uId = uid;
          $.post(url, transObj, function(data) {
              if (data != null) {
                 showAuthMethod(data);
              } else {
              }
          });
      } else {
          $("#un").val("");
      }
}
function showAuthMethod(authMethods){
    $("#RSA_id").hide();
    $("#ukey_id").hide();
    $("#sms_id").hide();
    $("#ad_ldap_div").hide();

        $("#authType").val("pwd");
        $("#pd-clone").val("请输入密码");
    if (authMethods.indexOf("ldap") != -1) {
        $("#authType").val("ldap");
        $("#pd-clone").val("请输入LDAP密码");
    }
    if (authMethods.indexOf("ad") != -1) {
        $("#authType").val("ad");
        $("#pd-clone").val("请输入AD密码");
    }
    if (authMethods.indexOf("otp") != -1) {
        $("#RSA_id").show();
    }
    if (authMethods.indexOf("ca") != -1) {
        $("#ukey_id").show();
    }
    if (authMethods.indexOf("sms") != -1) {
        $("#sms_id").show();
    }
}
function nintRandomCode(){
    var data = '0';
	if(data!=''){
		$('#isShowRandomCode').val(data);
		if(data=='1'){
			$('#isRandomCode').show();
		}else{
			$('#isRandomCode').hide();
		}
	}else{
		$('#isShowRandomCode').val('0');
		$('#isRandomCode').hide();
	}
}

(function($, doc, debug) {
    var input = ('placeholder' in doc.createElement('input')), 
        textarea = ('placeholder' in doc.createElement('textarea')), 
        selector = ':input[placeholder]';
    
    $.placeholder = {input: input, textarea: textarea};
    
    //skip if there is native browser support for the placeholder attribute
    if(!debug && input && textarea) {
        $.fn.placeholder = function() {};
        return;
    }
    
    if(!debug && input && !textarea) {
        selector = 'textarea[placeholder]';
    }
    $.fn.realVal = $.fn.val;
    $.fn.val = function() {
        var $element = $(this), val, placeholder;
        if(arguments.length > 0) return $element.realVal.apply(this, arguments);
        
        val = $element.realVal();
        placeholder = $element.attr('placeholder');
        
        return ((val == placeholder) ? '' : val);
    };
    
    function clearForm() {
        $(this).find(selector).each(removePlaceholder);
    }
    
    function extractAttributes(elem) {
        var attr = elem.attributes, copy = {}, skip = /^jQuery\d+/;
        for(var i = 0; i < attr.length; i++) {
            if(attr[i].specified && !skip.test(attr[i].name)) {
                copy[attr[i].name] = attr[i].value;
            }
        }
        return copy;
    }
    
    function removePlaceholder() {
        var $target = $(this), $clone, $orig;
        
        if($target.is(':password')) return;
        
        if($target.data('pd')) {
            $orig = $target.next().show().focus();
            $('label[for=' + $target.attr('id') + ']').attr('for', $orig.attr('id'));
            $target.remove();
        } else if($target.realVal() == $target.attr('placeholder')) {
            $target.val('');
            $target.removeClass('placeholder');
        }
    }
    
    function setPlaceholder() {
        var $target = $(this), $clone, plceholder, hasVal, cid;
        placeholder = $target.attr('placeholder');

        if($.trim($target.val()).length > 0) return;
        
        if($target.is(':password')) {
            cid = $target.attr('id') + '-clone';
            $clone = $('<input/>')
                        .attr($.extend(extractAttributes(this), {type: 'text', value: placeholder, 'data-pd': 1, id: cid}))
                        .addClass('placeholder');

            $target.before($clone).hide();
            $('label[for=' + $target.attr('id') + ']').attr('for', cid);
        } else {
            $target.val(placeholder);
            $target.addClass('placeholder');
        }
    }
    
    $.fn.placeholder = function() {
        this.filter(selector).each(setPlaceholder);
        return this;
    };
    
    $(function($) {
        var $doc = $(doc);
        $doc.on('submit', 'form', clearForm);
        $doc.on('focus', selector, removePlaceholder);
        $doc.on('blur', selector, setPlaceholder);
        $(selector).placeholder();
    });
})(jQuery, document, window.debug);

$(document).ready(function() {
	var isFormbasedLogin = false;
	if (isFormbasedLogin) {
		var un = '';
		var pd = '';
		
		$('#UN').val(un);
		$('#PW').val(pd);
		$('#authType').val('pwd');
		$('#isShowRandomCode').val('');
		document.getElementById('loginForm').submit();
	}
	
    initFocus();
});

function initFocus(){
	$("#UN").focus();
}
    </script>
</head>
<body class="loadbody" style="">
				
				 
       		 
        
        	


<style type="text/css">
	#msg{
		position:relative;
		text-align:center;
		color:red;
		font-size: 1.0em;
	}
</style>




<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta property="qc:admins" content="1655765374601213536375731353526525752100747716">
<link rel="stylesheet" href="/static/index/static/css/login/SISUStyle.css">
<link href="/static/index/static/css/login/default.css" rel="stylesheet" type="text/css">



	<!--================================header==begin========================================-->
	<div class="header">   
        <div id="newLogo">
            <a href="http://hbutcyy.dxsbb.com/">
        	<img class="blueLogo" src="/static/index/static/img/logo.png" style="width: 100%;height: 100%;display: block;" >
        </a>
        </div>
        <div class="logoName"><span class="logoNam-cn"></span></div>
        <div id="computer-lang" class="langBox">
        </div>  
    </div>
    <!--================================header==stop========================================-->
    
    
    <!--================================Content==begin========================================-->
    <div class="l-Content">
    	<div class="l-main">
			<div class="l-container">
				<!---loginBox-begin---->
				<div class="loginBox">
				   <h2 class="loginTit">身份认证</h2>
				   <div class="login-cont">
					  <div class="passContent">
						<div class="promptBox">你即将登录【<span>湖工创业园</span>】
						</div>
						<form id="loginForm" action="../../index/user/login" method="post">
                            <div class="inputBox">
								<div class="L-inputLi userLi">
										<input id="UN" name="user_id" tabindex="1" placeholder="学号/帐号" class="input-text" type="text" value="" autocomplete="off">
								</div>
							</div>
							<div class="inputBox">
								<div class="L-inputLi passLi">
								<input id="PW" name="password" tabindex="2" placeholder="密码/Password" class="input-text" type="password" value="" autocomplete="off">
								</div>
							</div>
							<div class="errMsgBox"></div>
							<div class="submitBtn"><input type="submit" class="login-subBtn" value="登录"><!-- 登陆 --></div>
						</form>
						
						<div class="lBox-btt">
							
							<a href="" target="_blank" class="forgetP">忘记密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
							
							<a href="../../index/user/addUser" class="c-help">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注册</a>
						</div>
					  </div>

				   </div>         
				</div>
				<!---loginBox-stop---->
				

			
			</div>
		</div>
	</div>
	<!--================================Content==stop========================================-->
	
	
	<!--================================footer==begin========================================-->
	<div class="l-footer">
		<div class="copyright">© 2018 湖北工业大学创业园</div>
	</div>
	<!--================================footer==stop========================================-->
	
	
	

	
        
       
    
		


</body></html>