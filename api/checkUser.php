<?php
	session_start();
	if(isset($_SESSION['username'])){
		echo '1';
	}else{
		echo 'alert("请登录后再进行操作！");location.href = "./login.html"';
	}
?>