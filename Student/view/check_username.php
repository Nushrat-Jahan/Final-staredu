<?php
	include '../controllers/valid_login.php';
	$username = $_GET["u"];
	$user = getUser($username);
	if($user){
		echo "<span style='color:red'>User Exists</span>";
	}
	else{
		echo "<span style='color:green'>Username Valid</span>"
	}

?>