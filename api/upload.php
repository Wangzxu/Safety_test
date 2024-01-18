<?php
header("Content-Type:text/html;charset=utf-8");	
include("../config/mysql_connect.php");
session_start();
	if(empty($_SESSION['phone']))
	{
		echo "<script> alert('无权限!');parent.location.href='../login.html'; </script>";
	}	
$phone = $_POST['phone'];
$user = $_POST['user'];
if(isset($_POST['submit']))
{
	$file = $_FILES['file'];
	$filename = $_FILES['file']['name'];
	$fileSize = $_FILES['file']['size'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.',$filename);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg','jpeg');
	
	if(in_array($fileActualExt,$allowed))
	{
			if($fileError === 0)
			{
				$fileNameNew = time().".".$fileActualExt;
				if($user=="doctor")
				{
					$fileDestination = '../doctor/image/'.$fileNameNew;
					$fileDestination_user = 'doctor/image/'.$fileNameNew;
				}else{
					$fileDestination = '../patient/image/'.$fileNameNew;
					$fileDestination_user = 'patient/image/'.$fileNameNew;
				}
				move_uploaded_file($fileTmpName,$fileDestination);
				$sql = "update $user set headimage='$fileDestination_user' where phone = '$phone'";
				$res = mysqli_query($link,$sql);
				if($res == false)
				{
					echo "<script> alert('数据更新失败');parent.location.href='../$user.php?action=basic_information_image_edit'; </script>";
				}
				include("../config/mysql_unconnect.php");
				echo "<script> alert('文件上传成功！');parent.location.href='../$user.php'; </script>";
			}else
			{
				include("../config/mysql_unconnect.php");
				echo "<script> alert('文件上传出错！！！');parent.location.href='../$user.php?action=basic_information_image_edit'; </script>";
			}
	}else{
		include("../config/mysql_unconnect.php");
		echo "<script> alert('未经允许的文件后缀名');parent.location.href='../$user.php?action=basic_information_image_edit'; </script>";
	}
}