<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"D:\www\hbutcyy\public/../application/index\view\activeapply\showDetail.html";i:1520242372;s:66:"D:\www\hbutcyy\public/../application/index\view\public\static.html";i:1520820489;s:72:"D:\www\hbutcyy\public/../application/index\view\public\header_index.html";i:1520326592;}*/ ?>
<HTML>
  <HEAD>
          <TITLE><?php echo $name; ?></TITLE>
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

<LINK rel="stylesheet" type="text/css" href="/static/index/static/css/activeapply/showDetail.css">



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
<div class="banner">
	<div class="b_left">
		<ul>
			<li class="li_name">活动列表</li>
			<?php foreach ($list as $key=>$value){
			echo '<li><a href="../../index/Activeapply/showDetail?id='.$value['id'].'">'.$value['name'].'</a></li>';
		}?>
		</ul>
	</div>
	<div class="b_right">
		<div class="title"><?php echo $data['name']; ?></div>
		<div class="time">文章出处：<?php echo $data['publisher']; ?>   发布时间：<?php echo $data['time']; ?></div>
		<div class="detail"><?php echo $data['regular']; ?>
</div>
	</div>
</div>
