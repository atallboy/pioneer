<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"C:\websoft\www\pioneer\public/../application/index\view\index\article.html";i:1520178670;}*/ ?>
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

    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/footer.css">

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


</HEAD>



<BODY style="overflow-x: hidden;" target="_blank">


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
                <A href="../../index/user/login" >
                    <?php if(isset($user_name)){echo $user_name;}else{echo '登录';}?></A>

                <?php if(isset($user_name)){echo ' <A href="../../index/user/deleteCookie">退出</A>';}?>
                <a href="../../index/user/addUser">注册</a>
              
            </DIV>
        </DIV>
        <DIV class="mom"></DIV>
    </DIV>
</DIV>



<DIV class="nav">
    <DIV class="nav-c">
        <DIV style="margin: 0px auto; width: 100%;">
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
        <DIV class="lmban"><IMG
                border="0" src="/static/index/static/img/bj.jpg" width="1000" height="230"><!--#endeditable--></DIV>
        <DIV class="lmban-d"><SPAN><?php echo $name; ?></SPAN></DIV></DIV></DIV>
<DIV class="lmjx">
    <DIV class="lmnav">
        <DIV class="lmnav-s"></DIV>
        <DIV class="lmnav-lb">
            <UL>
                <?php foreach ($category as $key =>$value){ echo '
                <LI><A href="../../index/index/showCategory?id='.$value['id'].'"
                       target=""><SPAN>'.$value['name'].'</SPAN></A> </LI>
                ';}?>
            </UL>
        </DIV>
    </DIV>
    <DIV class="lmkj-r">

        <DIV class="edubox6">
            <DIV id="zoomcon" class="info_xwnr">
                <DIV id="zoom">
                    <DIV id="vsb_content_1375_u71">
                        <DIV id="vsb_content">
                            <h2 style="text-align: center;"> <?php echo $content[0]['tittle']; ?></h2>
                            <P style="text-align: center;margin-top: 15px;">
                                <span> <?php echo $content[0]['publish_time']; ?></span>&nbsp;&nbsp;
                                <span> <?php echo $content[0]['author']; ?></span>&nbsp;&nbsp;
                                <span> <?php echo $content[0]['source']; ?></span>
                            </P>
                            <?php echo $content[0]['content']; ?>
                </DIV>
            </DIV></DIV></DIV>
    <DIV class="mom"></DIV></DIV>
