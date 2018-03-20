<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\www\hbutcyy\public/../application/index\view\index\showDetail.html";i:1520852210;}*/ ?>
<HTML>
<HEAD>
    <TITLE><?php echo $data[0]['tittle'];?>-湖北工业大学大学生创业园</TITLE>
	<meta name="description" content="<?php echo $data[0]['summary'];?>-湖北工业大学大学生创业园"/>
	<meta name="keywords" content="湖北工业大学大学生创业园" />
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
    <LINK rel="stylesheet" type="text/css" href="/static/index/static/css/public/footer.css">

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
				  var link = urlm.replace('index/showDetail','mobile/detail');
				  window.location.href =link;}		
		
    </SCRIPT>


</HEAD>



<BODY style="overflow-x: hidden;" target="_blank">


<DIV class="header">
    <DIV class="box-c2">
        <DIV class="logo"><!--#begineditable clone="0" namechanged="0" order="0" ispublic="0" tagname="LOGO" viewid="64319" contentviewid="" contype="" stylesysid="" layout="" action="" name="LOGO"-->
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
        <DIV class="lmban-d"><SPAN><?php echo $first_name;?></SPAN><!--#endeditable-->
        </DIV>
    </DIV></DIV>
<div class="content">
    <div class="box_a">
        <div class="list_name"><?php print_r ($name);?></div>
        <div class="list_nav"><?php print_r ($first_name);?>>> <?php print_r ($name);?>>> 正文</div>
    </div>
    <div class="box_b">
        <div class="detail">
            <div class="tittle"><?php print_r ($data[0]['tittle']);?></div>
            <div class="source">来源：<a href="<?php print_r ($data[0]['source']);?>"><?php echo $data[0]['media'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                编辑：<?php print_r ($data[0]['author']);?>&nbsp;&nbsp;&nbsp;&nbsp;
                发布时间：<?php print_r ($data[0]['publish_time']);?></div>
            <div class="article"><?php print_r ($data[0]['content']);?></div>
        </div>
    </div>
</div>
<div class="blank_100"></div>
	
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