<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	if($_SESSION['user']!="admin")
	{
		echo "<script> alert('无管理员权限!');parent.location.href='admin.html'; </script>";
	}	
	$file = ".".$_GET['file'];
	$status = unlink($file);
	if($status){  
		echo "<script> alert('删除成功！');parent.location.href='../admin.php?action=photo'; </script>";    
	}else{  
		echo "<script> alert('删除失败！');parent.location.href='../admin.php?action=photo'; </script>";    
	} 


?>