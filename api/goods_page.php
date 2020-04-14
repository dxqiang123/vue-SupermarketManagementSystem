<?php
	include('./conn.php');
	
	// 步骤一：准备三大条件
	// 条件1：设置每页显示多少条数据
	$pagesize = 3;
	
	// 条件2：获取当前在第几页上
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	
	// 条件3：计算出一共有多少条数据
	$sql = "select * from goods";
	$rs = mysqli_query($conn, $sql);
	$recordcount = mysqli_num_rows($rs);
	
	// 步骤二：计算当前页应该显示哪些数据
	$start = ($page - 1) * $pagesize;
	// $sql = "select * from goods limit $start,$pagesize";
	$sql = "select goods.*,category.name as cateid from goods,category where goods.cate_id = category.id limit $start,$pagesize";
	$rs = mysqli_query($conn, $sql);
	$data = [];
	while($row = mysqli_fetch_assoc($rs)) {
		array_push($data, $row);
	}
	
	// 步骤三： 计算出总页数
	$pagecount = ceil($recordcount/$pagesize);
	
	array_push($data, $pagecount);
	
	echo json_encode($data);
	
?>