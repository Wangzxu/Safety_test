<?php 
	header("Content-Type:text/html;charset=utf-8");	
	include("../config/mysql_connect.php");
	session_start();
	if(empty($_SESSION['phone']))
	{
		echo "<script> alert('无权限!');parent.location.href='../login.html'; </script>";
	}	
	$user = $_POST['user'];
	if($user=="doctor")
	{
		$phone = $_POST['phone'];
		$name = $_POST['name'];
	
		$expenses = $_POST['expenses'];
		$introduce = $_POST['introduce'];
		$sql = "update doctor set name='$name',expenses = $expenses,introduce ='$introduce' where phone = '$phone'";
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			echo "<script> alert('数据更新失败');parent.location.href='../doctor.php'; </script>";
		}
		else
		{
			echo "<script> alert('数据更新成功');parent.location.href='../doctor.php'; </script>";
		}
	}elseif($user=="patient")
	{
		$phone = $_POST['phone'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$sql = "update patient set name='$name',address = '$address' where phone = '$phone'";
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			echo "<script> alert('数据更新失败');parent.location.href='../patient.php'; </script>";
		}
		else
		{
			echo "<script> alert('数据更新成功');parent.location.href='../patient.php'; </script>";
		}
	}
	
	include("../config/mysql_unconnect.php");
?>