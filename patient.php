<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="CSS/patient.css">
</head>
<body>
<?php
header("Content-Type:text/html;charset=utf-8");	
session_start();
include("config/mysql_connect.php");
include("config/array.php");
$user = $_COOKIE['user'];
$phone= $_SESSION['phone'];
$sql = "select * from patient where phone = '$phone'";
$res = mysqli_query($link,$sql);
$rows = mysqli_fetch_array($res);
if(empty($user)||empty($phone))
{
	echo "<script> alert('cookie不存在或已过期，请重新登陆');parent.location.href='login.html'; </script>";
}else
{
	echo '<a class="switch" href="patient.php?action=basic_information">患者基本信息</a>'.'    
	'.'<a class="switch" href="patient.php?action=find_doctor">预约医生</a>'.'    
	'.'<a class="switch" href="patient.php?action=my_booking">我的预约</a>'.'    
	'.'<a class="logout" href="patient.php?action=logout">登出</a><br/>';
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
							<a href="patient.php?action=basic_information_image_edit">修改头像</a><br/>
						<div/>
					</aside>
					<div class="content">					
						<h2 class="news-title">
							'.$rows['name'].'
						</h2>
						<p>
						电话号码: '.$rows['phone'].'<br/>
						身份信息: '.$rows['idcard'].'<br/>
						个人地址: '.$rows['address'].'<br/>
						</p>
						
						<a href="patient.php?action=basic_information_edit">编辑</a>
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
					<span class="change">修改地址</span>
					<input type="text" name = "address" value='.$rows['address'].'>
				</div>
				
				<input type="submit" class="btn-submit" value="提交">
			';
			
			break;
		case 'basic_information_image_edit':
			echo '
			<form method="post" action="api/upload.php" enctype="multipart/form-data">
					<div class="profile-image2">
						<img src = '.$rows['headimage'].' width=200 height=300><br/>
					</div>
					<div class="filebox">
						点击此处选择您要修改的头像<br/>
						<input type="file" class="file" accept="image/jpeg" name="file" ><br/>
					</div>
					<input type = "hidden" name="phone" value ='.$rows['phone'].'>
					<input type = "hidden" name="user" value ='.$user.'>
					<button type="submit" class="btn-submit" name = "submit">上传头像</button>
			</form>
			';
			break;
		case 'find_doctor':
			echo '
			<form action="patient.php?action=find_doctor" method = "post">
				<div class="not-input-field">
				<span class="change">选择科室</span>

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
				<input type = "submit" class="btn-submit" value = "查询科室"><br/>
				
			</form>';
			if(!empty($_POST['department']))
			{
				$search_department = $_POST['department'];
				echo '<h3 style="margin:0px">当前查询科室为：'.$word_to_Chinese[$search_department].'</h3><br/>';
				if(strlen($search_department)>15)
				{
					echo '异常参数';
				}
				$search_department = blacklist($search_department);
				$sql = "select * from doctor where department = '$search_department'";
				$res = mysqli_query($link,$sql);
				while($rows = mysqli_fetch_array($res))
				{
					echo '
					<div class="wrapper">
					<aside class="profile-image">
						<img src = '.$rows['headimage'].' width=200px height=300px>
					</aside>
					<div class="content">					
						<h2 class="news-title">
							'.$rows['name'].'
						</h2>
						<p>
						电话号码: '.$rows['phone'].'<br/>
						所属科室: '.$word_to_Chinese[$rows['department']].'<br/>
						挂号费用: '.$rows['expenses'].'<br/>
						医生经历: '.$rows['introduce'].'<br/>
						</p>
						<a class="btn-book" href="patient.php?action=booking&phone='.$rows['phone'].'&doc_name='.$rows['name'].'">预约</a><br/>
					<div/>	
				<div/>
					';

				}
			}
			break;
		case 'booking':
			$doctor_phone = $_GET['phone'];
			$doctor_name = $_GET['doc_name'];
			
			echo '<form method="post" action="api/booking.php">
			<h2 style="margin:0px">请填写预约申请单</h2><br/><h3 style="margin:0px">预约医生：'.$doctor_name;
			echo '
			 </h3>
			<input type = "hidden" name="doc_phone" value ='.$doctor_phone.'>
			<input type = "hidden" name="doc_name" value ='.$doctor_name.'>
			<div class="input-book">
            	<input type="text" name="name" placeholder="姓名" >
			</div>
			<div class="input-book">
            	<input type="text" name="pat_phone" placeholder="手机号" >
			</div>
			<div class="input-book">
				<input type="text" name="symptom" placeholder="症状">
			</div>

			<input type="submit" class="btn-submit" value="提交">

			';
			break;
		case 'my_booking':
			$sql = "select * from booking where pat_phone = '$phone'";
			$res = mysqli_query($link,$sql);
			echo '
			<table border="1">
			<caption>我的预约</caption>
			';
			echo '<tr class="tableheader"><td>预约医生</td><td>联系方式</td>
			<td>预约时间</td><td>预约状态</td></tr>';
			while($rows = mysqli_fetch_array($res)){
				if($rows['status'] != 3){
					$status = ($rows['status'] == 0?'未签到':'已就医');
				echo '<tr><td>'.$rows['doc_name'].' '.'</td><td>'.$rows['doc_phone'].' '.'</td><td>'.$rows['booking_time'].' '.'</td><td>'.$status.'
				'.'<a href="api/unbooking.php?id='.$rows['id'].'">取消预约</a></td>';
				}	
			}

			break;
		case 'logout':
			include("api/logout.php");
			break;
	}

}
function blacklist($target)
{
  $target = preg_replace('/or/i',"",$target);      //过滤 or
  $target = preg_replace('/and/i',"",$target);     //过滤 and
  $target = preg_replace('/[\/\*]/',"",$target);   //过滤 /*
  $target = preg_replace('/[--]/',"",$target);     //过滤 --
  $target = preg_replace('/[*]/',"",$target);      //过滤 #  %23
  $target = preg_replace('/[\s]/',"",$target);     //过滤 空格 %20
  $target = preg_replace('/[\/\\\\]/',"",$target); //过滤 斜杠 \ 反斜杠 /
  $target = preg_replace('/union/',"",$target);    //过滤  union
  $target = preg_replace('/by/',"",$target);       //过滤  by 
  $target = preg_replace('/select/',"",$target);   //过滤  select  
  $target = preg_replace('/from/',"",$target);     //过滤  from
  $target = preg_replace('/floor/',"",$target);    //过滤  floor
  $target = preg_replace('/concat/',"",$target);   //过滤  concat
  $target = preg_replace('/count/',"",$target);    //过滤  count
  $target = preg_replace('/rand/',"",$target);     //过滤  rand
  $target = preg_replace('/group by/',"",$target); //过滤  group by
  $target = preg_replace('/substr/',"",$target);   //过滤  substr
  $target = preg_replace('/ascii/',"",$target);    //过滤  ascii
  $target = preg_replace('/mtarget/',"",$target);  //过滤  mtarget
  $target = preg_replace('/like/',"",$target);     //过滤  like
  $target = preg_replace('/sleep/',"",$target);    //过滤  sleep
  $target = preg_replace('/when/',"",$target);     //过滤  when
  $target = preg_replace('/order/',"",$target);    //过滤  order  
  return $target;
}
?>
</body>
</html>
