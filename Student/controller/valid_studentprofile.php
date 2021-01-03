<?php 
	session_start();
	require_once "../model/db_connection.php";

	$id = $_SESSION["student_id"];
	$query = "SELECT * FROM student WHERE id=$id";
	$student = get($query);
	$student = $student[0];
	//echo "<pre>";
	//print_r($student);
	//echo "<pre>>";
	
?>