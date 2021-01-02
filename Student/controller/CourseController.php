<?php
	require_once '../model/db_connection.php';
	function getAllCourses(){
		$query = "SELECT * FROM course";
		$result = get($query);
		return $result;
	}
	
	function searchCourse($name){
		$query =  "Select course_id,course_name from course where course_name like '%$name%'";
		$result = get($query);
		return $result;
	}

	function GetCourse($name){
		$query =  "Select course_id,course_name from course where course_name=$name";
		$result = get($query);
		return $result;
	}

	function CheckCourse($id){
		$query =  "Select c_name from student_course where s_id=$id";
		$result = get($query);
		if(count($result) > 0) return true;
		return false;
	}

	function EnrolledCourse($studentid){
		$query =  "Select * from student_course where s_id=$studentid";
		$result = get($query);
		return $result;
	}
	
?>