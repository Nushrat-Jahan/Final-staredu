<?php
$l_id = $_GET['lec_id'];
$course_id = $_GET['course_id'];
include_once '../controllers/lectureControllers.php';
deleteLecture($l_id, $course_id);
?>