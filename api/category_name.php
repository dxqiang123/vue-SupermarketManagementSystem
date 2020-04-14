<?php
	include('./conn.php');
	$sql = 'select id as value, name as label from category where parentid=0';
	$rs = mysqli_query($conn, $sql);
	$data = [];
	while($row = mysqli_fetch_assoc($rs)) {  // 将所有数据遍历放在 $data 中
		array_push($data, $row);  // 或 $data[] = $row;   
	}
	
	echo json_encode($data);
?>