<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\www\hbutcyy\public/../application/index\view\user\page_v1.html";i:1521016118;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="/static/index/static/css/user/page_v1.css" rel="stylesheet" type="text/css">
 <script src="/static/index/static/js/jquery-1.7.2.min.js"></script>
<title>个人中心</title>
    <script type="text/javascript">
        function login() {
            $.ajax({
            //几个参数需要注意一下
                type: "POST",//方法类型
                dataType: "html",//预期服务器返回的数据类型
                url: "http://hbutcyy.dxsbb.com/index.php/index/user/edit" ,//url
                data: $('#form1').serialize(),
                success: function (result) {
					alert('修改成功');
					window.location.href="http://hbutcyy.dxsbb.com/index.php/index/Grade/judgeLook"; 
                },
                error : function() {
                    alert("修改失败");
                }
            });
        }
		
        function editPassword() {
		var p = $('#p').val();
		var p1 = $('#p1').val();
		var p2 =$('#p2').val();
		if(p1==''||p==''||p2==''){
				alert('原密码和新密码都不能为空');
				return ;		}
		else if(p1!==p2){
				alert('两次新密码不一致');}
		else if(p1.length<6){
				alert('密码长度不能低于6位数');
		}
		else{
			$.ajax({
			//几个参数需要注意一下
				type: "POST",//方法类型
				dataType: "html",//预期服务器返回的数据类型
				url: "http://hbutcyy.dxsbb.com/index.php/index/user/editPassword" ,//url
				data: $('#form2').serialize(),
				success: function (result) {
					
					if(result=='原密码错误'){alert(result);}
					else if(result=='修改失败'){alert(result);}
					else{
					alert('修改成功');
					window.location.href="http://hbutcyy.dxsbb.com/index.php/index/Grade/judgeLook"; }
				},
				error : function(result) {
					alert(result);
				}
			});			
		}


        }		
		
    </script>
</head>
<body>
<div class="header">
	<div class="icon-school"><img src="/static/index/static/img/school1.png"></div>
	<a href="http://hbutcyy.dxsbb.com/">
		<div class="title-school">湖北工业大学·大学生创业园</div>
	</a>
	<div class="head-img"><img src="/static/index/static/img/school1.png"></div>
	<div class="name-user"><?php echo $data['user_name']; ?></div>
</div>

<div class="nav">
	<div class="nav-tab">
		<a href="http://hbutcyy.dxsbb.com/">
		   <span class="back">
		   		<span class="icon">﹤</span>返回首页
		   </span>
		</a>
			<ul>
		<li class="tab-a" id="tab-a" onclick="changeDisplay('tab-a','tab-info')" onmouseout="delBorder('tab-a')" onmouseover="addBorder('tab-a')">帐号信息</li>
		<li class="tab-b" id="tab-b" onclick="changeDisplay('tab-b','tab-edit')" onmouseout="delBorder('tab-b')" onmouseover="addBorder('tab-b')">修改资料</li>
		<li class="tab-f" id="tab-f" onclick="changeDisplay('tab-f','tab-password')" onmouseout="delBorder('tab-f')" onmouseover="addBorder('tab-f')">修改密码</li>		
		<li class="tab-c" id="tab-c"  onclick="changeDisplay('tab-c','tab-active')" onmouseout="delBorder('tab-c')" onmouseover="addBorder('tab-c')">活动申请</li>
		<li class="tab-d" id="tab-d"  onclick="changeDisplay('tab-d','tab-apply')" onmouseout="delBorder('tab-d')" onmouseover="addBorder('tab-d')">入驻申请</li>
		<li class="tab-e" id="tab-e"  onclick="changeDisplay('tab-e','tab-login')" onmouseout="delBorder('tab-e')" onmouseover="addBorder('tab-e')">访问记录</li>	
		<a href="../../index/Grade/applyList">
			<li class="tab-e">评分入口</li>	
		</a>						
			</ul>	
	</div>

</div>

<div class="tab-info" id="tab-info">
	<table>
		<caption>
			<span>帐号信息</span>
		</caption>
		<tbody>
			<tr>
				<th>昵称：</th>
				<td><?php echo $data['user_name']; ?></td>
			</tr>
			<tr>
				<th>帐号：</th>
				<td><?php echo $data['user_id']; ?></td>
			</tr>
			<tr>
				<th>性别：</th>
				<td><?php echo $data['sex']; ?></td>
			</tr>
			<tr>
				<th>年龄：</th>
				<td><?php echo $data['age']; ?></td>
			</tr>
			<tr>
				<th>电话：</th>
				<td><?php echo $data['tel']; ?></td>
			</tr>
			<tr>
				<th>邮箱：</th>
				<td><?php echo $data['email']; ?></td>
			</tr>
			<tr>
				<th>学校：</th>
				<td><?php echo $data['school']; ?></td>
			</tr>
			<tr>
				<th>年级：</th>
				<td><?php echo $data['grade']; ?></td>
			</tr>
			<tr>
				<th>认证：</th>
				<td><?php echo $data['identification']; ?></td>
			</tr>			
			<tr>
				<th>注册日期：</th>
				<td><?php echo $data['create_time']; ?></td>
			</tr>									
		</tbody>
	</table>
</div>

<div class="tab-edit" id="tab-edit">
		<table>
			<form method="post" action="" id="form1">
				<caption>
					<span>修改资料</span>
				</caption>
				<tbody>
					<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
					<tr>
						<th>昵称：</th>
						<td><?php echo $data['user_name']; ?></td>
					</tr>
					<tr>
						<th>帐号：</th>
						<td><?php echo $data['user_id']; ?></td>
					</tr>					
					<tr>
						<th>性别：</th>
						<td class="sex">
							<input type="radio" name="sex" value="男" <?php if($data['sex']=='男')echo 'checked';?>>男
							<input type="radio" name="sex" value="女" <?php if($data['sex']=='女')echo 'checked';?>>女
						</td>

					</tr>
					<tr>
						<th>手机：</th>
						<td><input type="text" name="tel" value="<?php echo $data['tel']; ?>"></td>
					</tr>
					<tr>
						<th>邮箱：</th>
						<td><input type="text" name="email" value="<?php echo $data['email']; ?>"></td>
					</tr>
					<tr>
						<th>学校：</th>
						<td><input type="text" name="school" value="<?php echo $data['school']; ?>"></td>
					</tr>
					<tr>
						<th>年级：</th>
						<td><input type="text" name="grade" value="<?php echo $data['grade']; ?>"></td>
					</tr>						
					<tr>
						<th></th>
						<td><input type="button" value="提交" class="submit" onclick="login()"></td>
					</tr>														
				</tbody>				
			</form>
	</table>
</div>


<div class="tab-password" id="tab-password">
		<table>
			<form method="post" action="" id="form2">
				<caption>
					<span>修改密码</span>
				</caption>
				<tbody>
					<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
					<tr>
						<th>原密码：</th>
						<td><input type="password" name="password" value="" id="p" placeholder="请输入原密码"></td>
					</tr>
					<tr>
						<th>新密码：</th>
						<td><input type="password" name="password1" value="" id="p1" placeholder="密码长度不低于6位"></td>
					</tr>
					<tr>
						<th>再次新密码：</th>
						<td><input type="password" name="password2" value="" id="p2" placeholder="密码长度不低于6位"></td>
					</tr>					
								
					<tr>
						<th></th>
						<td><input type="button" value="提交" class="submit" onclick="editPassword()"></td>
					</tr>														
				</tbody>				
			</form>
	</table>
</div>





<div class="tab-active" id="tab-active">
	<div class="record">活动申请记录</div>
	<div class="active-record">
	<?php foreach ($active as $k=>$v){
		echo '
		<table>
			<tbody>
				<tr>
					<th>活动名称：</th>
					<td>'.$v['item'].'</td>
				</tr>
				<tr>
					<th>报名时间：</th>
					<td>'.$v['create_time'].'</td>
				</tr>
				<tr>
					<th>状态：</th>
					<td>'.$v['status'].'</td>
				</tr>								
			</tbody>
		</table>';}?>


	</div>
</div>


<div class="tab-apply" id="tab-apply">
	<div class="record">入园申请记录</div>
	<div class="apply-record">
	<?php foreach ($apply as $k=>$v){
	echo '
		<table>
			<tbody>
				<tr>
					<th>申请人：</th>
					<td>'.$v['apply_name'].'</td>
				</tr>
				<tr>
					<th>申请团队：</th>
					<td>'.$v['team_name'].'</td>
				</tr>
				<tr>
					<th>报名时间：</th>
					<td>'.$v['create_time'].'</td>
				</tr>
				<tr>
					<th>评审结果：</th>
					<td>'.$v['status'].'</td>
				</tr>								
			</tbody>
		</table>';}?>
	
	</div>
</div>

<div class="tab-login" id="tab-login">
	<div class="record">登录记录</div>
	<div class="login-record">
		<table>
			<tbody>
			<?php foreach ( $login_record as $k=>$v){
			echo '
				<tr>
					<th>登陆信息：</th>
					<td>'.$v['login_time'].'</td>
				</tr>';}?>								
			</tbody>
		</table>


	</div>
</div>



</body>
</html>

<script type="text/javascript">
	function addBorder(id){
		var obj = document.getElementById(id);
			obj.style.borderBottom = "3px solid rgb(55,144,206)";
		
	}
	function delBorder(id){
		var obj = document.getElementById(id);

			obj.style.borderBottom = "0px solid rgb(55,144,206)";

			
		
	}

	function changeDisplay(id1,id2){
		var arr = ['tab-info','tab-edit','tab-active','tab-apply','tab-login','tab-password'];
		for (var i = 0; i < arr.length; i++) {
			var obj = document.getElementById(arr[i]);
				obj.style.display = "none";
		};
		var arr = ['tab-a','tab-b','tab-c','tab-d','tab-e','tab-f'];
		for (var i = 0; i < arr.length; i++) {
			var obj = document.getElementById(arr[i]);
				obj.style.borderTop = "0px solid rgb(55,144,206)";
		};		
		var obj = document.getElementById(id2);
				obj.style.display = "block";		
		var obj = document.getElementById(id1);
				obj.style.borderTop = "3px solid rgb(55,144,206)";
	}
</script>