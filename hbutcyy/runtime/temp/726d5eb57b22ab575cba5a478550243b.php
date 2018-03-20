<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\www\hbutcyy\public/../application/index\view\file\fileDownload.html";i:1520902297;s:72:"D:\www\hbutcyy\public/../application/index\view\public\header_index.html";i:1520326592;}*/ ?>
<HTML>
  <HEAD>
          <TITLE>文件下载</TITLE>
            <META name="keywords" content="湖北工业大学创业园">

            <!--  header-all -->
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/global.css">
              <!-- banner--all -->
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/style.css">
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/lrtk.css">
              <!-- header-onblur -->
            <SCRIPT type="text/javascript" src="/static/index/static/js/jquery-1.7.2.min.js"></SCRIPT>

              <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/content.css">
             <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/footer.css">
			<LINK rel="stylesheet" type="text/css" href="/static/index/static/css/public/list_a.css">
			<LINK rel="stylesheet" type="text/css" href="/static/index/static/css/public/foot.css">
			

          <SCRIPT type="text/javascript">
      
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

<!--左侧主体结束-->
      <!--左侧主体结束-->
      <!--右侧主体开始-->
      <div class="article">
        <h3 class="title">
          <div class="position">当前位置：<a href="#">入园申请</a> &gt; <a href="#">文件下载</a></div>
          <span>文件列表</span>
        </h3>
        <div class="article_list">
          <ul>
     <?php foreach ($contentList as $key =>$value){
          echo '       
              <li>
                <div class="article_list_div"><a href="/upload/file/admin/'.$value['file'].'" target="_blank">'.$value['file_name'].'</a></div>
                <div class="article_list_span">'.$value['create_time'].'</div>
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
