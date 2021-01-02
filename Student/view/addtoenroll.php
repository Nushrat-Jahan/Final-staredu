<?php
	
	include '../controller/CourseController.php';
	include '../controller/valid_studentprofile.php';
	$result = GetCourse($_GET["cname"]);
	$result = $result[0];
	if(CheckCourse($_GET["cname"])==true)
	{
		echo "Already enrolled";
		hearder("Location: enrollcourses.php");
	}
	else
	{
		$s_id = $student["id"];
		$c_id = $result["course_id"];
		$c_name = $result["course_name"];
		$c_status = "In progress";
		$query = "INSERT INTO student_course VALUES ('".$s_id."','".$c_id."','".$c_name."','".$c_state."','-')";
		$enrolledcourse = execute($query);
		header("Location: enrolled.php");
	}
	
	
?>