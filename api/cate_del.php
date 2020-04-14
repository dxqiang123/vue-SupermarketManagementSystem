<?php
	include('./conn.php');
	$id = $_GET['id'];
	$sql = "delete from category where id = $id";
	$rs = mysqli_query($conn, $sql);
	if($rs){
		$arr = ['errcode'=>0,'msg'=>'分类删除成功！'];
		echo json_encode($arr);
	}else{
		$arr = ['errcode'=>1010,'msg'=>'分类删除失败!'];
		echo json_encode($arr);
	}
?>