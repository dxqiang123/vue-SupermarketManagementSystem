<?php

	include('./conn.php');
	session_start();
	// header('Content-Type','text/html;charset=utf-8');
	
	// 连接数据库
	// $conn = mysqli_connect('localhost', 'root', 'root', 'market');	
	
	// 接受数据
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//验证用户名有效性
	if(strlen($username) < 3) {
		exit('请输入正确的用户名!');
	}
	
	// 构造SQL语句查询用户名和密码是否存在
	$sql = "select * from admin where username='$username' and password='$password'";
	
	// 执行SQL语句
	$result = mysqli_query($conn, $sql);
	
	// 将查询结果返回至客户端
	if(mysqli_num_rows($result) > 0) {
		echo '1';
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['userid'] = $row['id'];
		$_SESSION['usergroup'] = $row['usergroup'];
		
	}else{
		echo '0';
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>