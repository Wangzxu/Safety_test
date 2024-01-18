<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="CSS/doctor.css">
</head>
<body>
<?php
header("Content-Type:text/html;charset=utf-8");	
session_start();
include("config/mysql_connect.php");
include("config/array.php");
$user = $_COOKIE['user'];
$phone= $_SESSION['phone'];
$sql = "select * from doctor where phone = '$phone'";
$res = mysqli_query($link,$sql);
$rows = mysqli_fetch_array($res);
if(empty($user)||empty($phone))
{
	echo "<script> alert('cookie不存在或已过期，请重新登陆');parent.location.href='login.html'; </script>";
}else{
	echo '
	<a class="switch" href="doctor.php?action=basic_information">医生基本信息</a>'.'    
	'.'<a class="switch" href="doctor.php?action=booking">患者预约信息</a>'.'    
	'.'<a class="logout" href="doctor.php?action=logout">登出</a>';
	if(!empty($_GET['action']))
	{
		$action=$_GET['action'];
	}else{
		$action='basic_information';
	}
	switch($action)
	{
		case 'basic_information':
			echo '
			<div class="wrapper">
				
					<aside class="profile-image">
						<img src = '.$rows['headimage'].' width=200px height=300px>
						<div>
							<a href="doctor.php?action=basic_information_image_edit">修改头像</a>
						<div/>
					</aside>
					<div class="content">					
						<h2 class="news-title">
							'.$rows['name'].'
						</h2>
						<p>
						电话号码: '.$rows['phone'].'<br/>
						所属科室: '.$word_to_Chinese[$rows['department']].'<br/>
						挂号费用: '.$rows['expenses'].'<br/>
						个人经历: '.$rows['introduce'].'<br/>
						</p>
						
						<a href="doctor.php?action=basic_information_edit">编辑</a>
					<div/>	
				
			<div/>
			';
			break;
		case 'basic_information_edit':
			echo '
			<form method="post" action="api/update.php">
				<div class="profile-image2">
					<img src = '.$rows['headimage'].' width=200 height=300><br/>
				</div>

				<input type = "hidden" name="phone" value ='.$rows['phone'].'>
				<input type = "hidden" name="user" value ='.$user.'>
				
				<div class="input-field">
					<span class="change">修改姓名</span>
					<input type="text" name = "name" value='.$rows['name'].'>
				</div>
				<div class="input-field">
					<span class="change">修改费用</span>
					<input type="text" name = "expenses" value='.$rows['expenses'].'>
				</div>
				<div class="input-field">
					<span class="change">修改经历</span>
					<input type="text" name = "introduce" value='.$rows['introduce'].'>
				</div>
				
				<input type="submit" class="btn-submit" value="提交">
			</form>
			';
			break;
		case 'basic_information_image_edit':
			echo '
			
				<form method="post" action="api/upload.php" enctype="multipart/form-data">
					<div class="profile-image2">
						<img src = '.$rows['headimage'].' width=200 height=300><br/>
					</div>
					<div class="filebox">
						点击此处选择您要修改的头像<br/><input type="file" class="file" accept="image/jpeg" name="file" ><br/>
					</div>
					<input type = "hidden" name="phone" value ='.$rows['phone'].'>
					<input type = "hidden" name="user" value ='.$user.'>
					<button type="submit" class="btn-submit" name = "submit">上传头像</button>
				</form>
			
			';
			break;
		case 'booking':
			// $sql = "select * from booking where doc_phone = '$phone'";
			// $res = mysqli_query($link,$sql);
			// while($rows = mysqli_fetch_array($res)){
			// 	if($rows['status'] == 0){
			// 	echo '预约病患：'.$rows['pat_name'].' '.'联系方式：'.$rows['pat_phone'].' '.'预约时间：'.$rows['booking_time'].' '.'<a href="api/sign.php?id='.$rows['id'].'">患者签到</a><br/>';
			// 	}	
			// }
			$sql = "select * from booking where doc_phone = '$phone'";
			$res = mysqli_query($link,$sql);
			echo '<form method="get" action="doctor.php">
					<div class="search-box">
						<input class="search-txt" type="hidden" name="action" value="search">
						<input class="search-txt" type="text" name="search" placeholder="输入预约信息">
						<input class="search-btn" type="submit" value="提交">
					</div>
				</form>';
			echo '<table border="1">';
			echo '<tr class="tableheader"><td>预约病患</td><td>联系方式</td><td>症状</td><td>预约时间</td><td>患者签到</td></tr>';
				while($rows = mysqli_fetch_array($res))
				{
					if($rows['status'] == 0)
					{
						echo '<tr><td>'.$rows['pat_name'].'</td><td>'.$rows['pat_phone'].'</td><td>'.$rows['symptom'].'</td><td>'.$rows['booking_time'].'</td><td>'.'<a href="api/sign.php?id='.$rows['id'].'">点击签到</a></td></tr>';
					}
					
				}
			echo '</table>';
			// echo '<form method="post" action="doctor.php?action=search">
			// 		<div class="search-box">
			// 			<input class="search-text" type="text" name="search" placeholder="输入预约信息">
			// 			<input class="search-btn" type="submit" value="提交">
			// 		</div>
			// 	</form>';
			break;
		case 'search':
			$search = $_GET['search'];
			$sql = "select * from booking where 
			concat(ifnull(pat_name,''),ifnull(pat_phone,''),ifnull(symptom,''),
			ifnull(booking_time,'')) 
			like '%$search%'";
			$res = mysqli_query($link,$sql);
			
			echo '<form class="search-form" method="get" action="doctor.php">';
			echo '<h3 style="margin-left:60px">当前搜索患者:'.$search;
			echo '</h3>
					<div class="search-box">
						<input class="search-txt" type="hidden" name="action" value="search">
						<input class="search-txt" type="text" name="search" placeholder="输入预约信息">
						<input class="search-btn" type="submit" value="提交">
					</div>
				</form>';
			echo '<table border="1">';
			echo '<tr class="tableheader"><td>预约病患</td><td>联系方式</td><td>症状</td><td>预约时间</td><td>患者签到</td></tr>';
			while($rows = mysqli_fetch_array($res))
			{
				if($rows['status'] == 0)
				{
					echo '<tr><td>'.$rows['pat_name'].'</td><td>'.$rows['pat_phone'].'</td><td>'.$rows['symptom'].'</td><td>'.$rows['booking_time'].'</td><td>'.'<a href="api/sign.php?id='.$rows['id'].'">点击签到</a></td></tr>';
				}
					
			}
			echo '</table>';
			// echo '<form method="post" action="doctor.php?action=search">
			// 		<div class="search">
			// 			<input type="text" name="search" placeholder="输入预约信息">
			// 			<input type="submit" value="提交">
			// 		</div>
			// 	</form>';
			break;
			
		case 'logout':
			include("api/logout.php");
			break;
	}

}

include("config/mysql_unconnect.php");
?>
</body>
</html>
