<?php
	include('./conn.php');
	$cate_name = $_POST['cate_name'];
	$state = $_POST['state'];
	$parentid= $_POST['parentid'];
	
	if($parentid == 0) {
		$level = 1;
	}else{
		$rs = mysqli_query($conn, "select level from category where id=$parentid");
		$row = mysqli_fetch_assoc($rs);
		$level= $row['level'] + 1;
		mysqli_free_result($rs);
	}
	
	$sql = "insert into category(name, state, parentid, level) values('$cate_name', $state, $parentid, $level)";
	$rs = mysqli_query($conn, $sql);
	if($rs) {
		echo '{"errcode":0, "msg":"分类新增成功！"}';
	}else{
		echo '{"errcode":1004, "msg":"分类新增失败！"}';
	}
	
?>