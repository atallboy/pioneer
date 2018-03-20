<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"C:\websoft\www\pioneer\public/../application/index\view\index\index.html";i:1520210935;}*/ ?>
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
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/lrtk.css">
              <!-- header-onblur -->
            <SCRIPT type="text/javascript" src="/static/index/static/js/jquery-1.7.2.min.js"></SCRIPT>

              <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/content.css">
             <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/footer.css">

          <SCRIPT type="text/javascript">

              if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {window.location.href ="http://z.zuyi8.com/index.php/index/Mobile/index";}


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
                    <A href="../../index.php/index/user/login"  target="_blank">
                        <?php if(isset($user_name)){echo $user_name;}else{echo '登录';}?></A>

                        <?php if(isset($user_name)){echo ' <A href="../../index.php/index/user/deleteCookie">退出</A>';}?>
                    <a href="../../index.php/index/user/addUser">注册</a>
                    <a href="../../index.php/index/Grade/judgeLook">个人中心</a>
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
<LI><A href="http://hbutcyy.dxsbb.com/" target="_blank">首页</A></LI>
    <?php  foreach ($nav as $key =>$value){
    echo'
    <LI><A href="">'.$key.'</A>
        <UL>';
            foreach ($value as $k=>$v){
            echo '
            <LI style="padding: 0px 15px;"><A href="../../index.php/index/index/showCategory?id='.$v['id'].'" target="_blank">'.$v['name'].'</A></LI>';}
            echo'
        </UL>
        <DIV class="clear"></DIV>
    </LI>
    ';}?>
<LI><A href="">入园申请</A>
    <ul>
      <li style="padding: 0px 15px;"><A href="../../index.php/index/apply/applyRead" target="_blank">申请条件</A></li>
      <li style="padding: 0px 15px;"><A href="../../index.php/admin/file/indexDownload" target="_blank">文件下载</A></li>            
      <li style="padding: 0px 15px;"><A href="../../index.php/index/apply/addApply" target="_blank">申请入园</A></li>
    </ul>
  </LI>
</UL>
<!--#endeditable-->
<DIV class="clear"></DIV></DIV></DIV></DIV>


<!--  #2-->
<DIV class="banner">
    <DIV class="kePublic"><!--效果html开始-->
        <DIV class="slide_container"><!--#begineditable clone="0" namechanged="0" order="3" ispublic="0" tagname="图片新闻" viewid="64534" contentviewid="" contype="" stylesysid="" layout="" action="" name="图片新闻"-->
            <UL id="slider" class="rslides">
                <LI>
                    <IMG alt="" src="/static/index/static/img/banner1.jpg">
                </LI>
            </UL><!--#endeditable-->
        </DIV>

<!--效果html结束-->
        <DIV class="clear"></DIV>
    </DIV>
</DIV>


<div class="blank_5"></div>

<div class="floor_c">
  <div class="box">
    <div class="top">
      <ul>
        <li>
            <div class="floor_name">
             新闻速递
            </div>        
        </li>
        <li>
            <div class="more"><a href="../../index.php/index/index/showCategory?id=新闻速递" target="_blank">更多</a></div>
        </li>
      </ul>
    </div>
      <div class="box_bottom">
            <ul>
        <?php foreach ($news as $k){
                echo '
              <li>
                <div class="detail">
                  <a href="../../index.php/index/index/showDetail?id='.$k['id'].'" target="_blank">
                    <div class="detail_img"><img src="/upload/image/detail/'.$k['image'].'"></div>
                    <div class="detail_main">
                      <div class="title">'.$k['tittle'].'</div>
                      <div class="summary">'.$k['summary'].'...<br>'.$k['publish_time'].'</div>
                    </div>
                  </a>
                </div>
              </li>';}?>


              
            </ul>
      </div>    
  </div>
</div>

<div class="blank_25"></div>

<div class="floor_c">
  <div class="box">
    <div class="top">
      <ul>
        <li>
            <div class="floor_name">
             通知公告
            </div>        
        </li>
        <li>
            <div class="more"><a href="../../index.php/index/index/showCategory?id=通知公告" target="_blank">更多</a></div>
        </li>
      </ul>
    </div>
      <div class="box_bottom">
            <ul>
        <?php foreach ($announcement as $k){
                echo '
              <li>
                <div class="detail">
                  <a href="../../index.php/index/index/showDetail?id='.$k['id'].'" target="_blank">
                    <div class="detail_img"><img src="/upload/image/detail/'.$k['image'].'"></div>
                    <div class="detail_main">
                      <div class="title">'.$k['tittle'].'</div>
                      <div class="summary">'.$k['summary'].'...<br>'.$k['publish_time'].'</div>
                    </div>
                  </a>
                </div>
              </li>';}?>


              
            </ul>
      </div>    
  </div>
</div>

<div class="blank_25"></div>

<div class="floor_e">
  <div class="top">园区活动    <a href="../../index.php/index/Activeapply/getMore" target="_blank">更多</a></div>
  <div class="buttom">
    <div class="b_left">
      <ul>
        <li>活动名称：<?php echo $active['name'];?></li>
        <li>活动地点：<?php echo $active['address'];?></li>
        <li>活动时间：<?php echo $active['time'];?></li>
        <li>活动对象：<?php echo $active['object'];?></li>
        <li>发布时间：<?php echo $active['create_time'];?></li>
      </ul>
    </div>
    <div class="b_right">
      <div class="detail"><a href="../../index.php/index/Activeapply/showDetail?id=<?php echo $active['id'];?>" target="_blank">详情</a></div>
      <div class="apply"><a href="../../index.php/index/Activeapply/addApply?id=<?php echo $active['id'];?>" target="_blank">报名</a></div>
    </div>
  </div>
</div>

<div class="blank_25"></div>

<div class="floor_f">
      <div class="box">
          <div class="box_top"><div class="floor_name">园区企业介绍</div></div>
          <div class="box_bottom">
            <ul>

          <?php foreach($company as $k){
                echo '
              <li>
                <div class="detail">
                    <a href="../../index.php/index/index/companyDetail?id='.$k['id'].'" target="_blank">
                      <img src="/upload/image/detail/'.$k['image'].'">
                    
                    <div class="company_name">'.$k['tittle'].'</div>
                    </a>
                </div>
              </li>';}?>

            </ul>
          </div>
      </div>
</div>
<div class="blank_25"></div>

<div class="floor_g">
  <div class="box">
     <div class="floor_name">友情链接</div>
     <div class="list">
       <?php foreach($link as $k){echo '<a href="'.$k['source'].'" target="_blank">'.$k['tittle'].'</a>&nbsp;&nbsp;';}?>
     </div>
  </div>
</div>

<div class="blank_25"></div>
  <div class="clearfloat"></div>
  <div class="blank_box"></div>    
    <div class="clearfloat"></div>
  <div class="footer">
    <div class="information">
      <p>湖北工业大学大学生创业园一楼123室&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：027-59750249 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编：430000 </p>
    </div>
  </div>



</BODY>
</HTML>