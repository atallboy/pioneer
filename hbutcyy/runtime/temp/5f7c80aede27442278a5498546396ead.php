<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"D:\www\hbutcyy\public/../application/index\view\index\showContentList.html";i:1520845914;s:64:"D:\www\hbutcyy\public/../application/index\view\public\list.html";i:1520327779;}*/ ?>
<HTML>
<HEAD>
    <TITLE><?php echo $name; ?>-湖北工业大学大学生创业园</TITLE>
	<meta name="description" content="湖北工业大学大学生创业园"/>
	<meta name="keywords" content="湖北工业大学大学生创业园" />
    <META content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <!--  header-all -->
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/global.css">
    <!-- banner--all -->
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/style.css">
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/lrtk.css">
    <!-- header-onblur -->
    <SCRIPT type="text/javascript" src="/static/index/static/js/jquery-1.7.2.min.js"></SCRIPT>
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/lm.css">

    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/public/footer.css">
    <link href="/static/index/static/css/public/common.css" rel="stylesheet" type="text/css">
    <link href="/static/index/static/css/public/detail.css" rel="stylesheet" type="text/css">
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
		
              if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
			      var urlm = window.location.href;
				  var link = urlm.replace('index/showCategory','mobile/nav');
				 window.location.href =link;
				  }
				  
		
		
    </SCRIPT>

</HEAD>



<BODY style="overflow-x: hidden;" target="_blank">


<DIV class="header">
    <DIV class="box-c2">
        <DIV class="logo">
            <TABLE border="0" cellSpacing="0" cellPadding="0">
                <TBODY>
                <TR>
                    <TD><IMG title="大学生创业园" border="0" alt="大学生创业园" src="/static/index/static/img/logo3.jpg">
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
        <DIV style="margin: 0px auto; width: 100%;">
            <UL class="navigation">
                <LI style="width: 50px;font-size: 16px;"><A href="http://hbutcyy.dxsbb.com/">首页</A>
                <?php  foreach ($nav as $key =>$value){
                echo'
                <LI style="width: auto;font-size: 16px;"><A href="#">'.$key.'</A>
                    <UL>';
                        foreach ($value as $k=>$v){
                        echo '
                        <LI style="padding: 0px 15px;"><A href="../../index/index/showCategory?id='.$v['id'].'"
                                                          target="_blank">'.$v['name'].'</A></LI>';}
                        echo'
                    </UL>
                    <DIV class="clear"></DIV>
                </LI>
                ';}?>

            </UL>
            <!--#endeditable-->
            <DIV class="clear"></DIV></DIV></DIV></DIV>

<DIV class="banner-bjtoo">
    <DIV class="lmbanner">
        <DIV class="lmban"><IMG
                border="0" src="/static/index/static/img/bj.jpg" width="1000" height="230"><!--#endeditable--></DIV>
</DIV></DIV>
<!--  模板引入需同时引入css样式文件
    <link href="/static/index/static/css/public/common.css" rel="stylesheet" type="text/css">
    <link href="/static/index/static/css/public/detail.css" rel="stylesheet" type="text/css">
-!>




    <!--幻灯片开始-->
    <!--幻灯片结束-->
    <!--主体开始-->
    <div class="detail">
      <!--左侧主体开始-->
      <!--左侧主体开始-->
<div class="left_menu">
<h2 style="font-size:20px;height:44px;line-height:44px;"><?php echo $first_name; ?></h2>
<ul>
                <?php foreach ($category as $key =>$value){ echo '
                <LI style="font-size:18px;height:38px;line-height:38px;"><A href="../../index/index/showCategory?id='.$value['id'].'"
                       target="">'.$value['name'].'</A> </LI>
                ';}?>
</ul>
</div>
<!--左侧主体结束-->
      <!--左侧主体结束-->
      <!--右侧主体开始-->
      <div class="article">
        <h3 class="title" style="height:38px;line-height:38px;">
          <div class="position" style="font-size:14px;">当前位置：<a href="#"><?php echo $first_name; ?></a> &gt; <a href="#"><?php echo $name; ?></a></div>
          <span style="font-size:18px;"><?php echo $name; ?></span>
        </h3>
        <div class="article_list">
          <ul>
     <?php foreach ($contentList as $key =>$value){
          echo '       
              <li style="font-size:16px;height:36px;line-height:36px;">
                <div class="article_list_div"><a href="../../index/index/article?id='.$value['id'].'" target="_blank">'.$value['tittle'].'</a></div>
                <div class="article_list_span">'.$value['publish_time'].'</div>
              </li>
            ';}?>

          </ul>
        </div>

      </div>
      <!--右侧主体结束-->
    </div>
    <!--主体结束-->
    <!--友情链接开始-->
<div class="clear"></div>
<!--友情链接结束-->

	
<div class="footer">
	<div class="top">
			<div class="part_a">
				<ul>
					<li  onmouseover="inme('code_a')" onmouseout="outme('code_a')">移动版</li>
					<li></li>
        <?php foreach ($link as $k){
                echo '					
					<li><a href="'.$k['source'].'">'.$k['tittle'].'</a></li>
					<li></li>';}?>	
													
				</ul>
			</div>
			<div class="part_b">
				<span >联系方式</span>
				<div class="detail">
					电话： 027-59751111</br>
					邮编： 430068</br>
					地址： 湖北工业大学大学生创业园一楼123室
					
				</div>
			</div>
			<div class="part_c">
				<ul>
					<li class="li_a"><div class="wechat" onmouseover="inme('code_c')" onmouseout="outme('code_c')">
						<img src="/static/index/static/img/weixin.png">
						
						<p>园区微信公众号</p>
					</div>
					</li>
					<li class="li_b"><div class="wechat" onmouseover="inme('code_d')" onmouseout="outme('code_d')">
						<img src="/static/index/static/img/qq.png">
						<p>园区QQ群</p>						
					</div>
					</li>
				</ul>
				
				
			</div>	

				<div class="code"><img src="/static/index/static/img/gsqq.png" class="code_b" id="code_b" style="display:none;">
									<img src="/static/index/static/img/mobileVersion.png" class="code_b" id="code_a" style="display:none;">
									<img src="/static/index/static/img/cyygzh.jpg" class="code_c" id="code_c" style="display:none;">
									<img src="/static/index/static/img/cyyqqq.png" class="code_d" id="code_d" style="display:none;"></div>
	</div>
	<div class="buttom">
		版权所有：&nbsp;湖北工业大学 &nbsp;<span  onmouseover="inme('code_b')" onmouseout="outme('code_b')">武汉赢在大学网络科技有限公司技术支持 </span>   &nbsp;  &nbsp;&nbsp;  Copyright 2018    &nbsp;  |     &nbsp;  创业园管理中心
	</div>
</div>	



</BODY>
</HTML>

	<script type="text/javascript">
		function inme(id){
			obj=document.getElementById(id);
			obj.style.display = "block";
		}

		function outme(id){
			obj=document.getElementById(id);
			obj.style.display = "none";			
		}

	</script>