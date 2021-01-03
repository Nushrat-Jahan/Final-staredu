<?php
    
	require_once "../Model/dbconnect.php";
	
    $uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$hasError=false;
	
	$query = "SELECT uname,pass FROM admins";
	$results = get($query);
   
    if(isset($_POST["login"])){
		if(empty($_POST["uname"])){
			$err_uname="Username Required";
			$hasError =true;	
		}else{
			$uname = htmlspecialchars($_POST["uname"]);
		}

		if(empty ($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}else{
			$pass = htmlspecialchars($_POST["pass"]);
			$pass = md5($pass);
		}
		if(!$hasError && isset($_POST["login"])){
			if(count($results)>0){
				foreach($results as $admin){
					if($uname == $admin["uname"] && $pass = $admin["pass"]){
						
						session_start();
						$_SESSION["uname"] = $uname;
						$_SESSION["pass"] = $pass;
						
						setcookie("uname", $_POST["uname"], time() + 1000);
						
						header("Location: ../View/adminhome.php");
					}else
					{
						echo "Invalid";
					}
				}
			}
			
			/*$file = simplexml_load_file("admin.xml");
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
			}*/
			
		}
	}
?>