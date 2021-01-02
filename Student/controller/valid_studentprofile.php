<?php 
	require_once "../model/db_connection.php";

	$id = $_GET["id"];
	$query = "SELECT * FROM student WHERE id=$id";
	$student = get($query);
	$student = $student[0];
	//echo "<pre>";
	//print_r($student);
	//echo "<pre>>";
	
?>