<?php
	
	require_once "../Model/dbconnect.php";
	
	$id = $_GET["id"];
	
	$query = "DELETE FROM student WHERE id = $id";
	
	$results = get($query);
	
	header("Location: ../View/studentlist.php");
	
?>