<?php
	header('Content-Type','text/html;charset=utf-8');
	$conn = mysqli_connect('localhost', 'root', 'root', 'market');
	
	$category = $_POST['category'];
	$name= $_POST['name'];
	$code= $_POST['code'];
	$costprice= $_POST['costprice'];
	$price= $_POST['price'];
	$saleprice= $_POST['saleprice'];
	$weight= $_POST['weight'];
	$saled= $_POST['saled'];
	$introduce= $_POST['introduce'];
	$num= $_POST['num'];

	$sql = "insert into goods(name, code, cate_id, costprice, price, saleprice, num, weight, saled, introduce) values('$name','$code',$category,$costprice,$price,$saleprice,$num,$weight,$saled,'$introduce')";
	
	$rs = mysqli_query($conn, $sql);
	// var_dump(mysqli_error($conn));
	// exit;
	if($rs) {
		echo '{"errcode": 0,"msg": "商品新增成功！"}';
	}else{
		echo '{"errcode": 1011,"msg": "商品新增失败！"}';
	}
	 
?>