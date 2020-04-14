<?php
	include('./conn.php');
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$parentid = $_POST['parentid'];
	$state = $_POST['state'];
	
	$sql = "update category set name='$name',parentid='$parentid', state=$state where id=$id";
	$rs = mysqli_query($conn, $sql);
	
	if($rs){
		echo '{"errcode": 0,"msg":"修改分类成功！"}';
	}else{
		echo '{"errcode": 1008,"msg":"修改分类失败！"}';
	}
	
?>