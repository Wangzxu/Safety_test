<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../config/mysql_connect.php");	
	$id = $_GET['id'];
	$sql = "update booking set status = 1 where id = $id";
	$res = mysqli_query($link,$sql);
	if($res == false)
	{
		echo "<script> alert('系统签到出错，请联系管理员！');parent.location.href='../patient.php?action=my_booking; </script>";
	}
	else
	{
		echo "<script> alert('患者签到成功!');parent.location.href='../doctor.php?action=booking'; </script>";
	}
	include("../config/mysql_unconnect.php");	
?>