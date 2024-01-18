<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../config/mysql_connect.php");	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$idcard = $_POST['idcard'];
	$address = $_POST['address'];
	$password = $_POST['passwd'];
	$sex = $_POST['sex'];
	$sql = "insert into patient(name,sex,phone,idcard,address,password,headimage) value('$name','$sex','$phone','$idcard','$address','$password','patient/image/default.jpg')";
	$res = mysqli_query($link,$sql);
	if($res == false)
	{
		include("../config/mysql_unconnect.php");
		echo "<script> alert('注册失败！');parent.location.href='../register.php'; </script>";
	}
	else
	{
		include("../config/mysql_unconnect.php");	
		echo "<script> alert('用户添加成功!');parent.location.href='../login.html'; </script>";
	}
?>