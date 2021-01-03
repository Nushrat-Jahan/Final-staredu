<?php
	
	require_once "../Model/dbconnect.php";
	
	$id = $_GET["id"];
	
	$query = "DELETE FROM teacher WHERE t_id = $id";
	
	$results = get($query);
	
	header("Location: ../View/teacherlist.php");
	
?>