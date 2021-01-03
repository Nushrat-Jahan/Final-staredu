<?php
	require_once '../model/db_connection.php';
		
	function getAllCourses(){
		$query = "SELECT * FROM course";
		$result = get($query);
		return $result;
	}
	function getStudentId($uname) {
		$result = get("select id from student where username = '$uname'");
		return $result;
	}
	function searchCourse($name){
		$query =  "Select course_id,course_name from course where course_name like '%$name%'";
		$result = get($query);
		return $result;
	}

	function GetCourse($name){
		$query =  "Select * from course where course_name = '$name'";
		$result = get($query);
		return $result;
	}

	function CheckCourse($course){
		$student = $_COOKIE["username"];
		$id = getStudentId($student);
        $id = $id[0]["id"];
		$query =  "Select c_name from student_course where c_name='$course' and s_id=".$id;
		$result = get($query);
		if(count($result) > 0) return true;
		return false;
	}

	function EnrolledCourse($studentid){
		$query =  "Select * from student_course where s_id=$studentid";
		$result = get($query);
		return $result;
	}

	function InProgress($studentid){
		$query =  "Select * from student_course where s_id=$studentid and c_state='In progress'";
		$result = get($query);
		return $result;
	}

	function Completed($studentid){
		$query =  "Select * from student_course where s_id=$studentid and c_state='Completed'";
		$result = get($query);
		return $result;
	}

	function CourseData($courseid){
		$query =  "Select * from student_course where c_id=$courseid";
		$result = get($query);
		return $result;
	}
	
	function deleteCourse($course) {
		$student = $_COOKIE["username"];
		$id = getStudentId($student);
        $id = $id[0]["id"];
      	$query = "Delete from student_course where c_name='$course' and s_id = ".$id;
	  	$result = execute($query);
	  	echo $result;
	  	return $result;
    }
?>