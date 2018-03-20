<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"C:\websoft\www\pioneer\public/../application/index\view\index\companyDetail.html";i:1520156341;s:74:"C:\websoft\www\pioneer\public/../application/index\view\public\list_b.html";i:1518164963;s:80:"C:\websoft\www\pioneer\public/../application/index\view\public\index_footer.html";i:1518078913;}*/ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML>
<HEAD>
    <TITLE>湖北工业大学创业园</TITLE>
    <META name="keywords" content="湖北工业大学创业园">
    <META content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <!--  header-all -->
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/global.css">
    <!-- banner--all -->
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/style.css">
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/lrtk.css">
    <!-- header-onblur -->
    <SCRIPT type="text/javascript" src="/static/index/static/js/jquery-1.7.2.min.js"></SCRIPT>
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/lm.css">

    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/public/foot.css">
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
    </SCRIPT>



    <STYLE type="text/css">
        <!--
        .STYLE1 {
            font-size: 9pt;
            color: black;}
        -->
    </STYLE>
    <!--Announced by Visual SiteBuilder 9-->
    <LINK rel="stylesheet" type="text/css" href="_sitegray/_sitegray_d.css">
    <SCRIPT language="javascript" src="HomePage_files/_sitegray.js"></SCRIPT>
    <!-- CustomerNO:77656262657232307003475455525640035748 -->
    <LINK rel="stylesheet" type="text/css" href="HomePage_files/index.vsb.css">
    <SCRIPT type="text/javascript" src="HomePage_files/counter.js"></SCRIPT>

    <SCRIPT type="text/javascript">_jsq_(1001,'/index.jsp',-1,1183494679)</SCRIPT>
    <!--[if lt IE 7]><script type="text/javascript" src="/system/resource/js/unitpngfix/unitpngfix.js"></script><![endif]-->
    <META name="GENERATOR" content="MSHTML 9.00.8112.16737">
</HEAD>



<BODY style="overflow-x: hidden;" target="_blank">


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
            <DIV class="top-fl"><!--#begineditable clone="0" namechanged="0" order="1" ispublic="0" tagname="顶部链接列表" viewid="64320" contentviewid="" contype="" stylesysid="" layout="" action="" name="顶部链接列表"-->
                <SCRIPT language="javascript" src="HomePage_files/dynclicks.js"></SCRIPT>
                <SCRIPT language="javascript" src="HomePage_files/openlink.js"></SCRIPT>
                <A href="../../index/user/login" >
                    <?php if(isset($user_name)){echo $user_name;}else{echo '登录';}?></A>

                <?php if(isset($user_name)){echo ' <A href="../../index/user/deleteCookie">退出</A>';}?>
                <a href="../../index/user/addUser">注册</a>
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
        <DIV class="lmban"><!--#begineditable contype="" name="装饰图片1" action="" layout="" clone="0" namechanged="0" order="3" ispublic="0" tagname="装饰图片1" viewid="65187" stylesysid=""--><IMG
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
<h2><?php echo $first_name; ?></h2>
<ul>
                <?php foreach ($category as $key =>$value){ echo '
                <LI><A href="../../index/index/companyDetail?id='.$value['id'].'"
                       target="">'.$value['tittle'].'</A> </LI>
                ';}?>
</ul>
</div>
<!--左侧主体结束-->
      <!--左侧主体结束-->
      <!--右侧主体开始-->
      <div class="article">
        <h3 class="title">
          <div class="position">当前位置：<a href="#"><?php echo $first_name; ?></a> &gt; <a href="#"><?php echo $name; ?></a></div>
          <span><?php echo $name; ?></span>
        </h3>
        <div class="article_list">

    <div class="title" style="width: 100%;height: 50px;line-height: 50px;text-align: center;font-family: '微软雅黑';font-size: 18px;"><?php echo $data['tittle']; ?></div>
    <div class="detail" style="width: 700px;height: auto;margin: 0 auto;"><?php echo $data['content']; ?>


        </div>

      </div>
      <!--右侧主体结束-->
    </div>
    <!--主体结束-->
    <!--友情链接开始-->
<div class="clear"></div>
<!--友情链接结束-->

<div class="blank_30"></div>
   
    <div class="clearfloat"></div>
  <div class="foot">
    <div class="information">
      <p>湖北工业大学大学生创业园一楼123室&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：027-59750249 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编：430000 </p>
    </div>
  </div>



</BODY>
</HTML>
</body>
</html>



