<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../config/mysql_connect.php");	
	session_start();
	if(empty($_SESSION['phone']))
	{
		echo "<script> alert('无权限!');parent.location.href='../login.html'; </script>";
	}	
	$id = $_GET['id'];
	$sql = "update booking set status = 3 where id = $id";
	$res = mysqli_query($link,$sql);
	if($res == false)
	{
		echo "<script> alert('取消预约预约失败');parent.location.href='../patient.php?action=my_booking; </script>";
	}
	else
	{
		echo "<script> alert('取消预约成功!');parent.location.href='../patient.php?action=my_booking'; </script>";
	}
	include("../config/mysql_unconnect.php");	
?>