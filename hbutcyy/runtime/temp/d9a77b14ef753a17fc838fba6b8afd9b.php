<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\www\hbutcyy\public/../application/index\view\index\article.html";i:1520837998;}*/ ?>
<HTML>
<HEAD>
				<TITLE><?php echo $content[0]['tittle']; ?>-湖北工业大学大学生创业园</TITLE>
		        <meta name="description" content="<?php echo $content[0]['summary']; ?>湖北工业大学大学生创业园"/>
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
	
	