<?php
include('./conn.php');
$id = $_GET['id'];
$sql = "select * from category where id=$id";
$rs = mysqli_query($conn, $sql);

if($row = mysqli_fetch_assoc($rs)){
	// $row['parentname'] ='--顶级分类--';
	
	if($row['parentid'] == 0) {
		$row['parentname'] ='--顶级分类--';
	}else{
		$sql1 = "select name form category where id=".$row['parentid'];
		$rs1 = mysqli_query($conn, $sql1);
		if($row1 = mysqli_fetch_assoc($rs1)) {
			$row['parentname'] = $row1['name'];
		}
	}
	
	
	
	// echo '{"errcode":0,"msg": "该分类获取成功！", "data":'.json_encode($row).'}';
	echo json_encode($row);
}else{
	// $arr = ["errcode"=>1002,"msg"=>"数据不存在！"];  echo json_encode($arr);
	echo '{"errcode":1007,"msg":"该分类不存在！"}';
}

?>