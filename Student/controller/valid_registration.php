<?php
	
	include_once "../model/db_connection.php";

	
	$fname="";
	$err_fname="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$cpass="";
	$err_cpass="";
	$email="";
	$err_email="";
	$gender="";
	$err_gender="";
	$bdy="";
	$country="";
	$err_country="";
	$condition="";
	$profession="";
	$err_profession="";
	$hasError=false;
	if(isset($_POST["register"])){

		//Full name
		if(empty($_POST["fname"])){
			$err_fname="Full name Required";
			$hasError =true;	
		}
		else{
			$fname = htmlspecialchars($_POST["fname"]);
		}
		
		//Username
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError =true;	
		}
		else{
			$uname = htmlspecialchars($_POST["uname"]);
		}
		
		//Password
		if(empty ($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		else if (strlen($_POST["pass"]) < 8) {
        $err_pass = "Password must be 8 characters long";
   	 	$hasError = true;
		}
		else{
			$pass=htmlspecialchars($_POST["pass"]);
		}
		
		//Confirm password
		if(empty ($_POST["cpass"])){
			$err_cpass="Confirm your password";
			$hasError = true;
		}
		else if($_POST["cpass"]!=$_POST["pass"]){
			$err_cpass="Password and confirm password doesn't match";
			$hasError = true;
		}
		
		//Email
		if(empty($_POST["email"])){
			$err_email="Please give your email address";
			$hasError = true;
		}
		elseif(!strpos($_POST["email"],"@")){
			$err_email="Invalid email address";
			$hasError = true;
		}
		else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$err_email = "Invalid email address";
			$hasError = true;
		}
		else{
			$email=htmlspecialchars($_POST["email"]);
		}
		
		//Country
		if (empty($_POST["country"])) {
			$err_country = "Select a Country";
			$hasError = true;
		}
		else {
			$country = $_POST["country"];
		}
		
		//Gender
		if(!isset($_POST["gender"])){
			$err_gender="Please select a gender";
			$hasError = true;
		}
		else{
			$gender = $_POST["gender"];
		}
		
		//Birth day
		if (empty($_POST["day"])) {
			$bdy = $bdy . "Day";
		}
		if (empty($_POST["month"])) {
			if (strlen($bdy) > 1) {
			$bdy .= ", month";
   	  	}
   	  	else $bdy .= "Month";
		}
		if (empty($_POST["year"])) {
			if (strlen($bdy) > 1) {
			$bdy .= " and year";
   	  	}
   	  	else $bdy = "Year";
		}
		if (strlen($bdy) > 1) {
			if (strlen($bdy) <= 5) $bdy .= " is required";
			else $bdy .= " are required";
		}
		
		//Condition
		if(!isset($_POST["condition"])){
			$condition = "Please accept the terms and conditions";
			$hasError = true;
		}
		
		//Profession
		if (empty($_POST["profession"])) {
			$err_profession = "Select a Profession";
			$hasError = true;
		}
		else {
			$profession = $_POST["profession"];
		}
		
		if(!$hasError  && isset($_POST["register"])){
			
			$pass = md5($_POST["pass"]);
			$qq = "INSERT INTO student VALUES ('','".$fname."','".$uname."','".$pass."','".$email."','".$gender."','".$profession."','user')";
			$student = get($qq);
			//mysqli_query($conn, $qq);
			
			header("Location: login.php");
			
		}
	}
	
?>