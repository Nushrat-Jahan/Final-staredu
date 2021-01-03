<?php
$stud_id = $_GET['s_id'];
$c_id = $_GET['course_id'];
echo $c_id;
include_once '../controllers/student_controllers.php';
giveCertificate($stud_id, $c_id);

?>