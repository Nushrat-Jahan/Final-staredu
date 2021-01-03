<?php
	
	include '../controller/CourseController.php';
	$result = GetCourse($_GET["cname"]);
    $student = $_COOKIE["username"];
    $id = getStudentId($student);
    $id = $id[0]["id"];
	$result = $result[0];
	if(CheckCourse($_GET["cname"])==true)
	{
		echo "Already enrolled";
		//header("Location: enrollcourses.php");
	}
	else
	{
		
		$c_id = $result["course_id"];
		$c_name = $result["course_name"];
		$c_status = "In progress";
		$query = "INSERT INTO student_course VALUES (".$id.",".$c_id.",'".$c_name."','".$c_status."','','','')";
		$enrolledcourse = execute($query);
		header("Location: enrolled.php");
	}
	
?>