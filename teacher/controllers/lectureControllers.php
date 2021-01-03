<?php
include_once '../models/database.php';

if(isset($_POST['addLecture'])){
    header("Location: addLecture.php?course_id=".$c_id);
}

$has_err = false;
if (isset($_POST['uploadLecture'])) {
    $lec_name = $_POST['lectureName'];
    if (empty($lec_name)) {
        $err_course = "Lecture Name Must be filled";
        $has_err = true;
    }
    $filepath = $_FILES["file"]["name"];
    //echo print_r($filepath);
    //echo "showing path".$filepath;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
        //echo "<img src=" . $filepath . " height=200 width=300 />";
    } else {
        //$has_err = true;
        echo "Error !!";
    }
    if (!$has_err) {
        $db = new DataBase();
        $db->dbCon();
        $db->addLecture($lec_name, $c_id, $filepath);
    }
}

function deleteLecture($l_id, $c_id){
    $lec_id = $l_id;
    $db = new DataBase();
    $db->dbCon();
    $db->deleteLecture($lec_id);
    header('Location: ../views/lecture.php?course_id='.$c_id);
}
if(isset($_POST['markAssignment'])){
    header("Location: ../views/assignmentList.php?course_id=".$c_id);
}
?>