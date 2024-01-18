<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="CSS/admin.css">
</head>
<body>
<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
include("config/mysql_connect.php");
include("config/array.php");
if($_SESSION['user']!="admin")
{
	echo "<script> alert('cookie参数有误!');parent.location.href='admin.html'; </script>";
}
else
{
	include("config/mysql_connect.php");	
	echo '<a class="switch" href="admin.php?action=admin_introduce">管理员须知</a>'.'    
	'.'<a class="switch" href="admin.php?action=doctor_information">医生信息管理</a>'.'    
	'.'<a class="switch" href="admin.php?action=patient_information">患者信息管理</a>'.'    
	'.'<a class="switch" href="admin.php?action=booking_information">预约管理</a>'.'    
	'.'<a class="switch" href="admin.php?action=photo">删除图片文件</a>'.'    
	'.'<a class="switch" href="admin.php?action=scan">扫描可疑文件</a>'.'    
	'.'<a class="logout" href="admin.php?action=logout">登出</a><br/>';
	if(!empty($_GET['action']))
	{
		$action=$_GET['action'];
	}else{
		$action='admin_introduce';
	}
	switch($action)
	{
		case 'admin_introduce':
			echo '
			<div class="wrapper">
				<div class="content">
				<h2 class="greeting">
					您好，超级管理员！(^◡^)
				</h2>
				<p>
					管理员密码请修改配置文件admin_config.php中$admin_password参数
				</p>
				<h3>
					祝您使用愉快！<br/>
				</h3>
				</div>
			</div>
			';
			break;
			
		case 'doctor_information':
			$sql = "select * from doctor";
			$res = mysqli_query($link,$sql);
			echo '<table border="1">';
			echo '<tr class="tableheader"><td>医生姓名</td><td>身份证号码</td>
			<td>性别</td><td>电话号码</td>
			<td>部门</td><td>挂号费用</td>
			<td>自我介绍</td><td>操作</td></tr>';
			while($rows = mysqli_fetch_array($res))
			{
				echo '<tr><td>'.$rows['name'].'</td><td>'.$rows['idcard'].'</td>
				<td>'.get_sex($rows['sex']).'</td><td>'.$rows['phone'].'</td>
				<td>'.$rows['department'].'</td><td>'.$rows['expenses'].'</td>
				<td>'.$rows['introduce'].'</td><td><a href="admin.php?action=doctor_edit&id='.$rows['id'].'">编辑</a>'.' 
				'.'<a href="api/admin_delete.php?do=doctor_del&id='.$rows['id'].'" onclick="return toVaild()">删除医生用户</a></td></tr>';
			}
			break;
		case 'patient_information':
			$sql = "select * from patient";
			$res = mysqli_query($link,$sql);
			echo '<table border="1">';
			echo '<tr class="tableheader"><td>患者姓名</td><td>身份证号码</td>
			<td>性别</td><td>电话号码</td>
			<td>住址</td><td>操作</td></tr>';
			while($rows = mysqli_fetch_array($res))
			{
				echo '<tr><td>'.$rows['name'].'</td><td>'.$rows['idcard'].'</td>
				<td>'.get_sex($rows['sex']).'</td><td>'.$rows['phone'].'</td>
				<td>'.$rows['address'].'</td>
				<td><a href="admin.php?action=patient_edit&id='.$rows['id'].'">编辑</a>'.' '.'<a href="api/admin_delete.php?do=patient_del&id='.$rows['id'].'" onclick="return toVaild()">删除患者用户</a></td>';
			}
			break;
		case 'booking_information':
			$sql = "select * from booking";
			$res = mysqli_query($link,$sql);
			echo '<table border="1">';
			echo '<tr class="tableheader"><td>医生</td><td>医生联系方式</td>
			<td>病人</td><td>病人联系方式</td>
			<td>患者症状</td><td>预约状态</td><td>预约时间</td><td>操作</td></tr>';
			while($rows = mysqli_fetch_array($res))
			{
				echo '<tr><td>'.$rows['doc_name'].'</td><td>'.$rows['doc_phone'].'</td>
				<td>'.$rows['pat_name'].'</td><td>'.$rows['pat_phone'].'</td>
				<td>'.$rows['symptom'].'</td><td>'.get_status($rows['status']).'</td><td>'.$rows['booking_time'].'</td>
				<td><a href="api/admin_delete.php?do=booking_del&id='.$rows['id'].'" onclick="return toVaild()"">删除预约信息</a></td>';
			}
			break;
		case 'photo':
			echo '<br/><h3 style="color:#09f">您可以删除多余图片文件</h3>';
			$dir = "./doctor/image/";
			$sql = "select headimage from doctor";
			$res = mysqli_query($link,$sql);
			$arr_doctor_image = array();
			while($rows = mysqli_fetch_array($res))
			{
				array_push($arr_doctor_image,"./".$rows['headimage']);
			}
			if(is_dir($dir)){
				$info = opendir($dir);
				echo '
				<h3 class="doc-title">医生头像：</h3>
				<table class="doc-img"><tr>
				';
				$i = 0;
				while(($file = readdir($info))!=false)
				{
					if($file != "." && $file != "..")
					{
						$file = $dir.$file;
						if(!in_array($file,$arr_doctor_image)&$file!=$dir."default.jpg")
						{
							$i++;
							echo '
							<td class="image">
								<img src = '.$file.' width=80 height=120>
								<div class="del-btn">
									<a class="btn-delete" href="api/admin_del_photo.php?file='.$file.'">删除</a>
								</div>
								
							</td>
							
							';
						}
						
						if($i%5==0)
						{
							echo '<br/>';
						}
					}	
				}
				echo'</tr></table>';
				closedir($info);
			}
			$dir_1 = "./patient/image/";
			if(is_dir($dir_1)){
				$info = opendir($dir_1);
				echo '
				<br/><h3 class="pat-title">患者头像：</h3><br/>
				<table class="pat-img"><tr>
				';
				$sql = "select headimage from patient";
				$res = mysqli_query($link,$sql);
				$arr_patient_image = array();
				while($rows = mysqli_fetch_array($res))
				{
					array_push($arr_patient_image,"./".$rows['headimage']);
				}
				$i = 0;
				while(($file = readdir($info))!=false)
				{
					if($file != "." && $file != "..")
					{
						$file = $dir_1.$file;
						if(!in_array($file,$arr_patient_image)&$file!=$dir_1."default.jpg")
						{
							$i++;
							echo '
							<td class="image">
								<img src = '.$file.' width=80 height=120>
								<div class="del-btn">
									<a class="btn-delete" href="api/admin_del_photo.php?file='.$file.'">删除</a>
								</div>
							</td>
							';
						}
						if($i%5==0)
						{
							echo '<br/>';
						}
					}	
				}
				echo'</tr></table>';
				closedir($info);
			}
			break;
		case 'doctor_edit':
			$id = $_GET['id'];
			$sql = "select * from doctor where id = $id";
			$res = mysqli_query($link,$sql);
			while($rows = mysqli_fetch_array($res))
			{
				echo '
				<form method="post" action="api/admin_update.php">
					<h2>医生信息修改</h2>

					<input type = "hidden" name="id" value ='.$id.'>
					<input type = "hidden" name="identity" value ="doctor">
					<div class="input-field">
						<span class="change">姓名</span>
						<input type="text" name = "name" value='.$rows['name'].'><br/>
					</div>

					<div class="input-field">
						<span class="change">身份证</span>
						<input type="text" name = "idcard" value='.$rows['idcard'].'><br/>
					</div>

					<div class="">
					<span class="">性别</span>
						<input type="radio" name = "sex" value="1" checked="checked">男
						<input type="radio" name = "sex" value="0">女
					</div>
					
					<div class="input-field">
						<span class="change">电话</span>
						<input type="text" name = "phone" value='.$rows['phone'].'><br/>
					</div>
					
					<div class="not-input-field">
					<span class="change">部门</span>
					<select name = "department">
				';
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
				echo '
					</select>
					</div>

					<div class="input-field">
						<span class="change">挂号费</span>
						<input type="text" name = "expenses" value='.$rows['expenses'].'><br/>
					</div>

					<div class="input-field">
						<span class="change">个人介绍</span>
						<input type="text" name = "introduce" value='.$rows['introduce'].'><br/>
					</div>

					<div class="input-field">
						<span class="change">密码</span>
						<input type="password" name = "password" value='.$rows['password'].'><br/>
					</div>
					
					<input type="submit" class="btn-submit" value="提交">';
			}
			break;
		case 'patient_edit':
			$id = $_GET['id'];
			$sql = "select * from patient where id = $id";
			$res = mysqli_query($link,$sql);
						while($rows = mysqli_fetch_array($res))
			{
				echo '
				<form method="post" action="api/admin_update.php">
					<h2>患者信息修改</h2>
					<div class="input-field">
						<span class="change">姓名</span>
						<input type="text" name = "name" value='.$rows['name'].'><br/>
					</div>
					<div class="input-field">
						<span class="change">身份证</span>
						<input type="text" name = "idcard" value='.$rows['idcard'].'><br/>
					</div>
					<div class="">
						性别
						<input type="radio" name = "sex" value="1" checked="checked">男
						<input type="radio" name = "sex" value="0">女<br/>
					</div>
					<div class="input-field">
						<span class="change">电话</span>
						<input type="text" name = "phone" value='.$rows['phone'].'><br/>
					</div>
					<div class="input-field">
						<span class="change">地址</span>
						<input type="text" name = "address" value='.$rows['address'].'><br/>
					</div>
					<div class="input-field">
						<span class="change">密码</span>
						<input type="password" name = "password" value='.$rows['password'].'><br/>
					</div>
					<input type = "hidden" name="id" value ='.$id.'>
					<input type = "hidden" name="identity" value ="patient">

					<input type="submit" class="btn-submit" value="提交">';
			}
			break;
		case 'doctor_del':
			echo '<script>toVaild()</script>';
			echo '<form action="api/admin_delete.php" onsubmit="return toVaild()" method="post">
			<button type="submit">删除</button>  
			</form>';
			break;
		case 'scan':
			echo '
			<h3 style="margin-left: 50px; margin-top: 30px">请选择要扫描的路径</h3>
			<div class="scan-route">
				<a class="btn-scan" href="admin.php?action=scan_do">当前路径</a><br/>
			</div>
			<div class="scan-route">
				<a class="btn-scan" href="admin.php?action=scan_do&path=api">api</a><br/>
			</div>
			<div class="scan-route">
				<a class="btn-scan" href="admin.php?action=scan_do&path=config">config</a><br/>
			</div>
			';
			break;
		case 'scan_do':
			$path = @$_GET['path'];
			if(!empty($_GET['path']))
			{
				$path=$_GET['path'];
			}else{
				$path='';
			}
			$dir = './'.$path;
			if(isset($dir))
			{
				if(strlen($dir)<10)
				{
					$dir = blacklist($dir);
					system("cd ".$dir."& dir /b");
				}else{
					echo '非法请求';
				}	
			}
			break;
		case 'logout':
			include("api/admin_logout.php");
			break;
	}
}
function get_status($status)
{
	if($status==0)
	{
		return '未签到';
	}elseif($status==1)
	{
		return '已签到';
	}else
	{
		return '被删除';
	}
}
function get_sex($sex)
{
	if($sex==1)
	{
		return '男';
	}else
	{
		return '女';
	}
}
function blacklist($target)
{
	$target = str_replace('&','',$target);
	$target = str_replace('|','',$target);
	$target = str_replace(';','',$target);
	$target = str_replace('\\','',$target);
	$target = str_replace('!','',$target);
	return $target;
}
?>
<script>
        function toVaild(){
            return confirm("确定删除？")
        }
</script>
</body>
</html>
