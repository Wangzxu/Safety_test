<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="CSS/register.css">
</head>
<body>
<?php
	header("Content-Type:text/html;charset=utf-8");	
	include("config/array.php");
	echo '<a class="switch" href="register.php?type=patient">患者注册</a>'.' 
	'.'<a class="switch" href="register.php?type=doctor">医生注册</a><br/>';
	if(!empty($_GET['type']))
	{
		$type=$_GET['type'];
	}else{
		$type='patient';
	}
	switch($type)
	{
		case 'patient':
			echo '
			<form method="post" action="api/pat_reg.php">
			<h2 class="title">患者注册</h2>
			<div class="input-field">
				<input type="text" name="name" placeholder="姓名">
			</div>
			<div class="input-field">
				<input type="text" name="phone" placeholder="手机号" >
			</div>
			<div class="input-field">
				<input type="text" name="idcard" placeholder="身份证号码" >
			</div>
			<div class="input-field">
				<input type="text" name="address" placeholder="地址" >
			</div>
			<div class="input-field">
				<input type="password" name="passwd" placeholder="密码">
			</div>
			<div class="">
				<span class="">性别</span>
				<input type="radio" name = "sex" value="1" checked="checked">男
				<input type="radio" name = "sex" value="0">女
			</div>		

			<input type="submit" class="btn-submit" value="注册">
			</form>';
			break;
		case 'doctor':
			echo '
			<form method="post" action="api/doc_reg.php">
			<h2 class="title">医生注册</h2>
			<div class="input-field">
				<input type="text" name="name" placeholder="姓名">
			</div>
			<div class="input-field">
				<input type="text" name="phone" placeholder="手机号" >
			</div>
			<div class="input-field">
				<input type="text" name="idcard" placeholder="身份证号码" >
			</div>
			<div class="input-field">
				<input type="text" name="introduce" placeholder="个人经历" >
			</div>
			<div class="input-field">
				<input type="password" name="passwd" placeholder="密码">
			</div>
			<div class="">
				<span class="">性别</span>
				<input type="radio" name = "sex" value="1" checked="checked">男
				<input type="radio" name = "sex" value="0">女
			</div>
			<div class="not-input-field">
				<span class="change">选择科室</span>
			<select name = "department">';
			for($i=0;$i <11;$i++)
			{
				$department = $department_array[$i];
				
					echo '<optgroup label = '.$department.'>';
						for($j=0;$j<count($department_array[$department]);$j++)
						{
							$department_sec = $department_array[$department][$j];
							echo '<option value="'.$department_sec.'">'.$word_to_Chinese[$department_sec].'</option>';
						}
			}
			echo '</select>
			</div>
			<input type="submit" class="btn-submit" value="注册">
			</form>';
	}

?>
</body>
</html>


