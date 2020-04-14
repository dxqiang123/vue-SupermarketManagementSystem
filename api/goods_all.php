<?php
	include('./conn.php');
	
	$sql = "select goods.*, category.name as cateid from goods,category where goods.cate_id = category.id";
	$rs = mysqli_query($conn, $sql);
	
	$data = [];
	while($row = mysqli_fetch_assoc($rs)) {
		array_push($data, $row);
	}
	
	echo json_encode($data);
	
?>