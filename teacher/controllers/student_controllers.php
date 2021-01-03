<?php
include_once '../models/database.php';

if(isset($_POST['students'])){
    header("Location: ../views/student.php?course_id=".$c_id);
}

/*if(isset($_POST['studentDetails'])){
    header("Location: ../views/student_Details.php?s_id=?".$result['']);
}*/

function showStudentList($c_id){
    $db = new DataBase();
    $db->dbCon();
    $array = $db->showStudent($c_id);
    return $array;
}

function StudentDetails($s_id){
    $db = new DataBase();
    $db->dbCon();
    $fetched = $db->studDetails($s_id);
    foreach ($fetched as $rows) {
        //echo $rows['email'];
    }
    return $rows;
    //return $array;
}

function giveCertificate($stud_id, $c_id){
    $db = new DataBase();
    $db->dbCon();
    $db->giveStudentCertificate($stud_id);

    header('Location: ../views/student.php?course_id='.$c_id);
    //header('Location: ../views/lecture.php?course_id='.$c_id);
}

?>
