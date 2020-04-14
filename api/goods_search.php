<?php
	include('./conn.php');
	
	$cateid = $_GET['cateid'];
	$keywords = $_GET['keywords'];

	/*
	* 情况一：如果什么条件都没有，则搜素全度数据
	* 情况二：如果只有分类数据，则按分类搜索
	* 情况三：如果只有关键词，则按关键词进行模糊搜索
	* 情况四：如果有关键词也有分类，则进行并且关系搜索，两个条件同时满足
	*/
	
	$sql = "select goods.*,category.name as cateid from goods,category where goods.cate_id=category.id";
	// 如果有分类
	if($cateid>0) {
		$sql.=" and goods.cate_id=$cateid";
	}
	
	// 如果有关键词
	if($keywords !== '') {
		$sql.=" and goods.name like '%$keywords%'";
	}
	
	$rs = mysqli_query($conn, $sql);
	
	$data = [];
	while($row = mysqli_fetch_assoc($rs)) {
		array_push($data, $row);
	}
	
	echo json_encode($data);
	
?>