<?php
include_once '../models/database.php';
$course_id = $_GET['course_id'];
$text = "";
//echo $course_id;
$db = new DataBase();
$db->dbCon();
//$result = $db->allLectures($course_id);
$result = $db->searchLectureList($text, $course_id);
if (!empty($result)) {
    echo json_encode($result, JSON_PRETTY_PRINT);
}
?>