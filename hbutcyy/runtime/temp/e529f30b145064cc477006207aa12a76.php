<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"C:\websoft\www\pioneer\public/../application/index\view\index\showContentList.html";i:1520210257;s:72:"C:\websoft\www\pioneer\public/../application/index\view\public\list.html";i:1520150447;s:80:"C:\websoft\www\pioneer\public/../application/index\view\public\index_footer.html";i:1518078913;}*/ ?>
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
                <!--#endeditable-->
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
<h2><?php echo $first_name; ?></h2>
<ul>
                <?php foreach ($category as $key =>$value){ echo '
                <LI><A href="../../index/index/showCategory?id='.$value['id'].'"
                       target="">'.$value['name'].'</A> </LI>
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
          <ul>
     <?php foreach ($contentList as $key =>$value){
          echo '       
              <li>
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
