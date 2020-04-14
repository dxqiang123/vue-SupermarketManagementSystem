<?php
	header('Content-Type:text/html;charset=utf-8');
	session_start();
	// 清除session，清除登陆标识
	$_SESSION = [];
	// session_destroy(); // 清除服务器端的session文件
	
	echo '<script>alert("退出成功，欢迎下次再来~~");location.href="/login.html";</script>';
?>