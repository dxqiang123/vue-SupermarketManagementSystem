<?php
	include('./conn.php');
	session_start();
	$oldPass = $_POST['oldPass'];
	$newPass = $_POST['newPass'];
	$id = $_SESSION['userid'];
	// echo $id;
	$sql = "select * from admin where password = '$oldPass' and id= '$id'";
	$rs = mysqli_query($conn, $sql);
	if( mysqli_num_rows($rs) > 0) {
		$sql = "update admin set password='$newPass' where id=$id";
		$rs = mysqli_query($conn, $sql);
		if($rs){
			echo '{"errcode": 0,"msg": "密码更改成功！"}';
		}else{
			echo '{"errcode": 1004,"msg": "密码更改失败,请稍后再试！"}';
		}
	}else{
		echo '{"errcode":1003,"msg": "旧密码不正确，修改失败！"}';
	}
	
	
	
?>