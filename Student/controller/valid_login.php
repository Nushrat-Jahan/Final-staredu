<?php
  
	include_once "../model/db_connection.php";
	
    $uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$hasError=false;
   if(isset($_POST["login"])){
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError =true;	
		}

		if(empty ($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		if(!$hasError && isset($_POST["login"])){
			
			if(authenticate($_POST["uname"],$_POST["pass"])){
				setcookie("username", $_POST["uname"], time() + 600);
				header('Location: studenthome.php?u='.$_POST["uname"]);
			}
			else{
				echo "Username password invalid";
			}
			
		}
	}

	function authenticate($username,$password){
		$password = md5($password);
		$query = "SELECT username from student WHERE username='$username' and password='$password'";
		$user=get($query);
		return $user;
	}

	function getStudent($username){
		$query = "SELECT * FROM student WHERE username='$username'";
		$result = get($query);
		return $result;
	}

	function getUser($username){
		$query = "SELECT username FROM student WHERE username='$username'";
		$result = get($query);
		if(count($result)>0) return true;
		return false;
	}
?>
