<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../config/mysql_connect.php");	
	session_start();
	if($_SESSION['user']!="admin")
	{
		echo "<script> alert('无管理员权限!');parent.location.href='../admin.html'; </script>";
	}	
	$identity = $_POST['identity'];
	if($identity =="doctor")
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$idcard = $_POST['idcard'];
		$sex = $_POST['sex'];
		$phone = $_POST['phone'];
		$department = $_POST['department'];
		$expenses = $_POST['expenses'];
		$introduce = $_POST['introduce'];
		$password = $_POST['password'];
		$sql = "update doctor set name= '$name',idcard = '$idcard',sex='$sex',phone = '$phone',department ='$department',expenses = $expenses,introduce = '$introduce',password = '$password' where id=$id";
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('修改失败！');parent.location.href='../admin.php?action=doctor_information'; </script>";
		}
		else
		{
			include("../config/mysql_unconnect.php");	
			echo "<script> alert('修改成功!');parent.location.href='../admin.php?action=doctor_information'; </script>";
		}
	}elseif($identity =="patient")
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$idcard = $_POST['idcard'];
		$sex = $_POST['sex'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$sql = "update patient set name= '$name',idcard = '$idcard',sex='$sex',phone = '$phone',address ='$address',password = '$password' where id=$id";
		$res = mysqli_query($link,$sql);
		if($res == false)
		{
			include("../config/mysql_unconnect.php");
			echo "<script> alert('修改失败！');parent.location.href='../admin.php?action=patient_information'; </script>";
		}
		else
		{
			include("../config/mysql_unconnect.php");	
			echo "<script> alert('修改成功!');parent.location.href='../admin.php?action=patient_information'; </script>";
		}
	}




?>