<?php
   require_once '../controller/CourseController.php'; 
   $cname = $_GET["cname"];
   deleteCourse($cname);
   header("Location: inprogress.php");
?>