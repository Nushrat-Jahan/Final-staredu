<?php
    
    require_once "../Model/dbconnect.php";
	
	$id="";
	$err_id="";
	$fname="";
	$err_fname="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$email="";
	$err_email="";
	$hasError=false;
	
	$conn = mysqli_connect($servername,$username,$password,$db_name);
	
   
    if(isset($_POST["register"])){
		if(empty($_POST["fname"])){
			$err_fname="Name Required";
			$hasError =true;	
		}
		else{
			$fname = htmlspecialchars($_POST["fname"]);
		}
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError =true;	
		}
		else{
			$uname = htmlspecialchars($_POST["uname"]);
		}

		if(empty($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		else if (strlen($_POST["pass"]) < 8) {
        $err_pass = "Must be 8 characters";
   	 	$hasError = true;
		}
		else{
			$pass = htmlspecialchars($_POST["pass"]);
			$pass = md5($pass);
		}
		if(empty($_POST["email"])){
			$err_email = "Email Required";
			$hasError = true;
		}
		elseif(!strpos($_POST["email"],"@")){
			$err_email="Invalid Email";
			$hasError = true;
		}
		else{
			$email = htmlspecialchars($_POST["email"]);
		}
		
		if(!$hasError){
			
			$query = "INSERT INTO admins VALUES('','".$fname."','".$uname."','".$pass."','".$email."')";
			$results = get($query);
			

			header("Location: ../View/login.php");
		}
		
		/*if(!$hasError && isset($_POST["login"])){
			$file = simplexml_load_file("admin.xml");
			$file = $file->admin;
			$is_done = false;
			foreach ($file as $i)
			{
				if(($i->username==$_POST["uname"]) && ($i->password== $_POST["pass"]))
				{
					$is_done = true;
					session_start();
					$_SESSION["uname"] = $uname;
				}
			}
			
			if($is_done )
			{
				echo "This is successful<br>";
				header("Location: ../HTML/adminhome.php");
			}
			else
			{
				echo "Invalid Username/Password";
			}
			
		}*/
	}
?>