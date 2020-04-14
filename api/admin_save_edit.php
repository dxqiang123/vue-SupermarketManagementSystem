<?php
	include('./conn.php');
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$usergroup = $_POST['usergroup'];
	$sql = "update admin set username='$username',password='$password',usergroup='$usergroup' where id=$id";
	$rs = mysqli_query($conn, $sql);
	if($rs){
		echo '1';
	}else{
		echo '0';
	}
?>