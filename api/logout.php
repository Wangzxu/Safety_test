<?php

setcookie('user','true',time() - 3600 );
session_destroy();
echo "<script> alert('成功登出');parent.location.href='login.html'; </script>";
?>