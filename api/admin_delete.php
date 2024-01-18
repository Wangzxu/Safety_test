<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../config/mysql_connect.php");	
	session_start();
	if($_SESSION['user']!="admin")
	{
		echo "<script> alert('无管理员权限!');parent.location.href='../admin.html'; </script>";
	}	
	$do = $_GET['do'];
	if($do == "doctor_del")
	{
		$id = $_GET['id'];
		$sql = "delete from doctor where id = $id";
		#echo $sql;
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('删除失败');parent.location.href='../admin.php?action=doctor_information'; </script>";
		}
		else
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('删除成功!');parent.location.href='../admin.php?action=doctor_information'; </script>";
		}

	}elseif($do == "patient_del")
	{
		$id = $_GET['id'];
		$sql = "delete from patient where id = $id";
		#echo $sql;
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('删除失败');parent.location.href='../admin.php?action=patient_information'; </script>";
		}
		else
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('删除成功!');parent.location.href='../admin.php?action=patient_information'; </script>";
		}
	}elseif($do == "booking_del")
	{
		$id = $_GET['id'];
		$sql = "delete from booking where id = $id";
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('删除失败');parent.location.href='../admin.php?action=booking_information'; </script>";
		}
		else
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('删除成功!');parent.location.href='../admin.php?action=booking_information'; </script>";
		}
	}

	
?>