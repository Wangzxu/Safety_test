<?php

	$username = $_POST['username'];
	$password = $_POST['password'];
	$admin_username = "admin";
	$admin_password = "admin";
	session_start();
	if($username != $admin_username || $password != $admin_password)
	{
	
		echo "<script> alert('登录失败!');parent.location.href='../admin.html'; </script>";
	}
	else
	{
		
		$_SESSION['user'] = "admin";
		setcookie("user", "admin");
		echo "<script>parent.location.href='../admin.php'; </script>";
	}

?>