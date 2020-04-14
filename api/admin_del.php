<?php
	include('./conn.php');
	$id = $_GET['id'];
	$sql = "delete from admin where id = $id";
	$rs = mysqli_query($conn, $sql);
	if($rs){
		$arr = ['errcode'=>0,'msg'=>'删除成功！'];
		echo json_encode($arr);
	}else{
		$arr = ['errcode'=>1001,'msg'=>'删除失败!'];
		echo json_encode($arr);
	}
?>