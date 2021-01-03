<?php

	session_start();
	include_once "../model/db_connection.php";
	$id = $_GET["id"];
	$query = "SELECT * FROM student WHERE id=$id";
	$student = get($query);
	$student = $student[0];
	if(isset($_POST["change"])){
		
		$fname="";
		$uname="";
		$email="";
		$gender="";
		
		if(empty($_POST["edit_fullname"])){
			$fname = $student["fullname"];
		}
		else 
		{
			$fname = htmlspecialchars($_POST["edit_fullname"]);
		}
		if(empty($_POST["edit_username"])){
			$uname = $student["username"];	
		}
		else{
			$uname = htmlspecialchars($_POST["edit_username"]);
		}
		if(empty($_POST["edit_email"])){
			$email = $student["email"];
		}
		else{
			$email = htmlspecialchars($_POST["edit_email"]);
		}
		if(empty($_POST["edit_gender"])){
			$gender = $student["gender"];
		}
		else {
			$gender = htmlspecialchars($_POST["edit_gender"]);
		}
		$query = "update student set fullname='$fname', username='$uname', email='$email', gender='$gender' where id=$id";
		execute($query);
		//echo "User state changed";
		$_SESSION["student_id"] = $student["id"];
		header ("Location: studentprofile.php");
	}
	
	if(isset($_POST["go_back"]))
	{
		header ("Location: studentprofile.php");
	}
?>