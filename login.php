<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
include("config/mysql_connect.php");
$phone = $_POST['phone'];
$password = $_POST['passwd'];
$usertype = $_POST['usertype'];
if($usertype == "doctor")
{
	$sql = "select * from doctor where phone = '$phone' and password = '$password'";
	$res = mysqli_query($link,$sql);
	$rows = mysqli_fetch_array($res);
	if($rows == NULL)
	{
		echo "<script> alert('登录失败');parent.location.href='login.html'; </script>";
	}
	$_SESSION['phone'] = $rows['phone'];
	setcookie("user", "doctor");
	echo "<script>parent.location.href='doctor.php'</script>";
}
else
{
	$sql = "select * from patient where phone = '$phone' and password = '$password'";
	$res = mysqli_query($link,$sql);
	$rows = mysqli_fetch_array($res);
	if($rows == NULL)
	{
		echo "<script> alert('登录失败');parent.location.href='login.html'; </script>";
	}
	$_SESSION['phone'] = $rows['phone'];
	setcookie("user", "patient");
	echo "<script>parent.location.href='patient.php'</script>";
}
include("config/mysql_unconnect.php");
?>