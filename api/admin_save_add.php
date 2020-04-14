<?php
	include('./conn.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usergroup = $_POST['usergroup'];
	
	$sql = "insert into admin(username, password, usergroup) values('$username', '$password', '$usergroup')";
	$result = mysqli_query($conn, $sql);
	
	if($result) {
		echo '1';
	}else{
		echo '0';
	}
	
?>