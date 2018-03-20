<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\www\hbutcyy\public/../application/index\view\index\index.html";i:1520987985;}*/ ?>
<HTML>
  <HEAD>
			    <TITLE>湖北工业大学大学生创业园</TITLE>
		        <meta name="description" content="湖北工业大学大学生创业园" />
				<meta name="keywords" content="湖北工业大学大学生创业园" />
            <META content="text/html; charset=UTF-8" http-equiv="Content-Type">
            <!--  header-all -->
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/global.css">
              <!-- banner--all -->
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/style.css">
            <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/lrtk.css">
              <!-- header-onblur -->
            <SCRIPT type="text/javascript" src="/static/index/static/js/jquery-1.7.2.min.js"></SCRIPT>
              <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/lunbo.css">
              <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/flash.css">			  
              <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/index/content.css">
             <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/public/footer.css">
          <SCRIPT type="text/javascript">

              if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {window.location.href ="http://hbutcyy.dxsbb.com/index.php/index/Mobile/index";}


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
		
					<a href="../../index.php/index/apply/addApply" style="font-size:15px;color:rgb(0,91,172);font-family: Arial;">申请入园&nbsp;</a>
			
                    
                        <?php if(isset($user_name)){echo '<a href="../../index.php/index/Grade/judgeLook"  target="_blank">欢迎您，'.$user_name.'</a>';}else{echo '<A href="../../index.php/index/user/login"  target="_blank">登录</A>';}if(isset($user_name)){echo ' <A href="../../index.php/index/user/deleteCookie">退出</A>';}?>
                    <a href="../../index.php/index/user/addUser"  target="_blank">注册</a>
                    <a href="../../index.php/index/Grade/judgeLook"  target="_blank">个人中心</a>
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
</UL>
<!--#endeditable-->
<DIV class="clear"></DIV></DIV></DIV></DIV>



<div class="loop-wrap">
	<div class="loop-images-container">
		<a href="../../index.php/index/index/showCategory?id=新闻速递" target="_blank">
			<img src="/static/index/static/img/bg03.jpg" alt="" class="loop-image">
		</a>
		<a href="../../index.php/index/index/showCategory?id=新闻速递" target="_blank">
			<img src="/static/index/static/img/bg04.jpg" alt="" class="loop-image">
		</a>
		<a href="../../index.php/index/index/showCategory?id=新闻速递" target="_blank">
			<img src="/static/index/static/img/bg05.jpg" alt="" class="loop-image">
		</a>
		<a href="../../index.php/index/index/showCategory?id=新闻速递" target="_blank">
			<img src="/static/index/static/img/bg06.jpg" alt="" class="loop-image">
		</a>
		<a href="../../index.php/index/index/showCategory?id=新闻速递" target="_blank">
			<img src="/static/index/static/img/bg03.jpg" alt="" class="loop-image">
		</a>
	</div>
</div>

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
        <li>发布时间：<?php echo $active['publish_time'];?></li>
      </ul>
    </div>
    <div class="b_right">
      <div class="detail"><a href="../../index.php/index/Activeapply/showDetail?id=<?php echo $active['id'];?>" target="_blank">详情</a></div>
      <div class="apply"><a href="../../index.php/index/Activeapply/addApply?id=<?php echo $active['id'];?>" target="_blank">报名</a></div>
    </div>
  </div>
</div>

<div class="blank_25"></div>


<div class="blank_25"></div>
	<div class="company">
		<div class="company_show">企业展播</div>
		<div class="company_flash">
			<div class="flash">
				<ul>
          <?php foreach($company as $k){
                echo '				
					<li>
						<a href="../../index.php/index/index/article?id='.$k['id'].'"  target="_blank">
							<img src="/upload/image/detail/'.$k['image'].'">
							<div class="name">
								'.$k['tittle'].'
							</div>
						</a>
					</li>';}foreach($company as $k){
                echo '				
					<li>
					
						<a href="../../index.php/index/index/article?id='.$k['id'].'"  target="_blank">
							<img src="/upload/image/detail/'.$k['image'].'">
							<div class="name">
								'.$k['tittle'].'
							</div>
						</a>
					</li>';}?>								
				</ul>
			</div>
		</div>		
	</div>

<div class="blank_25"></div>
  <div class="clearfloat"></div>
  <div class="blank_box"></div>    
    <div class="clearfloat"></div>

	
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
					电话： 027-59750249 </br>
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
		版权所有：&nbsp;湖北工业大学 &nbsp;<span  onmouseover="inme('code_b')" onmouseout="outme('code_b')">技术支持：武汉赢在大学网络科技有限公司 </span>   &nbsp;  &nbsp;&nbsp;  Copyright 2018    &nbsp;  |     &nbsp;  创业园管理中心
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