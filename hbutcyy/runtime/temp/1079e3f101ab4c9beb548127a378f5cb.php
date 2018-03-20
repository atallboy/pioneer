<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"C:\websoft\www\pioneer\public/../application/index\view\index\showDetail.html";i:1520158715;}*/ ?>
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
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/lm.css">
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/detail/content.css">
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
            <DIV class="top-fl">
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
        <DIV class="lmban-d"><!--#begineditable contype="" name="栏目名称" action="" layout="" clone="0" namechanged="0" order="4" ispublic="0" tagname="栏目名称" viewid="64336" stylesysid=""--><SPAN><?php echo $first_name; ?></SPAN><!--#endeditable-->
        </DIV>
    </DIV></DIV>
<div class="content">
    <div class="box_a">
        <div class="list_name"><?php echo $name; ?></div>
        <div class="list_nav"><?php echo $first_name; ?>>> <?php echo $name; ?>>> 正文</div>
    </div>
    <div class="box_b">
        <div class="detail">
            <div class="tittle"><?php echo $data[0]['tittle']; ?></div>
            <div class="source">来源：<?php echo $data[0]['source']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                编辑：<?php echo $data[0]['author']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                发布时间：<?php echo $data[0]['publish_time']; ?></div>
            <div class="article"><?php echo $data[0]['content']; ?></div>
        </div>
    </div>
</div>
<div class="blank_100"></div>
<div class="footer">
    <div class="information">
        <p>湖北工业大学大学生创业园一楼123室&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：027-59750249 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编：430000 </p>
    </div>
</div>
