<?php

include_once "valid_cookie.php";
	
$cid="";
$err_cid="";
$cname="";
$err_cname="";
$has_error=false;
if(isset($_POST["add"]))
{
	//Course id
	if(empty($_POST["cid"])){
			$err_cid="<sub>Please write down course id<sub>";
			$has_error =true;	
		}
	else{
			$cid = htmlspecialchars($_POST["cid"]);
		}
	
	//Course name
	if(empty($_POST["cname"])){
			$err_cname="<sub>Please write down course name<sub>";
			$has_error =true;	
		}
	else{
			$cname = htmlspecialchars($_POST["cname"]);
		}
	
	if(!$has_error && isset($_POST["add"])){
			$courses = simplexml_load_file("courses.xml");
			
			$course = $courses->addChild("course");
			$course->addChild("courseid",$cid);
			$course->addChild("coursename",$cname);
		
			//echo "<pre>";
			//print_r($courses);
			//echo "</pre>";
			
			$xml = new DOMDocument("1.0");
			$xml->preserveWhiteSpace=false;
			$xml->formatOutput= true;
			$xml->loadXML($courses->asXML());
			
			
			$file = fopen("courses.xml","w");
			fwrite($file,$xml->saveXML());
			
			header("Location: enrollcourses.php");
			echo "Successfully added";
	
			
		}
}

?>