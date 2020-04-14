<?php
include('./conn.php');
$id = $_GET['id'];
$sql = "select * from admin where id=$id";
$rs = mysqli_query($conn, $sql);

if($row = mysqli_fetch_assoc($rs)){
	echo json_encode($row);
}else{
	// $arr = ["errcode"=>1002,"msg"=>"数据不存在！"];  echo json_encode($arr);
	echo '{"errcode":1002,"msg":"数据不存在！"}';
}

?>