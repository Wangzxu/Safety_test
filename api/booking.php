<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../config/mysql_connect.php");	
	session_start();
	if(empty($_SESSION['phone']))
	{
		echo "<script> alert('无权限!');parent.location.href='../login.html'; </script>";
	}	
	$doc_phone = $_POST['doc_phone'];
	$doc_name = $_POST['doc_name'];
	$pat_name = $_POST['name'];
	$pat_phone = $_POST['pat_phone'];
	$symptom = $_POST['symptom'];
	date_default_timezone_set('PRC');
	$date = date('Y-m-d H:i:s');
	$sql = "insert into booking(doc_name,doc_phone,pat_name,pat_phone,symptom,booking_time,status) value('$doc_name','$doc_phone','$pat_name','$pat_phone','$symptom','$date',0)";
	$res = mysqli_query($link,$sql);
	if($res == false)
	{
		echo "<script> alert('预约失败');parent.location.href='../patient.php?action=booking&phone='.$doc_phone.'&doc_name='.$doc_name.''; </script>";
	}
	else
	{
		echo "<script> alert('预约成功,请在两天内到达医院签到就诊！');parent.location.href='../patient.php'; </script>";
	}
	
	include("../config/mysql_unconnect.php");
?>