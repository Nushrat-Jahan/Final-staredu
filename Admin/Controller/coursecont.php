<?php
	
	require_once "../Model/dbconnect.php";
	
	$id = $_GET["id"];
	
	$query = "DELETE FROM course WHERE course_id = $id";
	
	$results = get($query);
	
	header("Location: ../View/courselist.php");
	
?>