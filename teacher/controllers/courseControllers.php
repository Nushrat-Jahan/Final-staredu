<?php
include_once '../models/database.php';
    if (isset($_POST['courses'])) {
        echo 'fcwafw';
        $db = new DataBase();
        $db->dbCon();
        $result = $db->allCourses($t_id);
    }
    if(isset($_POST['giveAssignment'])){
        header("Location: ../views/assignment.php?id=".$t_id);
    }

$has_err = false;
if(isset($_POST['test1'])){
    echo 'gh6r5';
}

//Assignment
$c_id = "";
$file_format = "";
$file_error = false;
if(isset($_POST['addAssignment'])){
    echo 'awdfe';
    $filepath = $_FILES["file"]["name"];
    $assignmentMarks = $_POST['assignmentMarks'];

    if(!isset($_POST['courseList'])){
        $file_format = "Course Not Selected!! Select One!";
        $file_error = true;
    }
    else{
        $c_id = $_POST['courseList'];
    }
    if(empty($filepath)){
        $file_format = "File Not Selected!! Select One!";
        $file_error = true;
    }
    if(empty($_POST['assignmentMarks'])){
        $file_format = "Marks must be Assigned!";
        $file_error = true;
    }

    else if(strripos($filepath, ".pdf")) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
            //echo "<img src=" . $filepath . " height=200 width=300 />";
            $file_format = "Successfully sent";
        } else {
            //$has_err = true;
            echo "Error !!";
        }
    }
    else{
        $file_format = "Select A PDF File. Only PDF format is allowed for assignment!";
        $file_error = true;
    }
    if(!$file_error) {
        $db = new DataBase();
        $db->dbCon();
        $db->insertAssignment($filepath, $assignmentMarks, $c_id, $t_id);
    }
}

/*if(isset($_POST['addCourses'])){
    header("Location: ../addCourse.php?id=".$t_id);
}*/
//include_once '../models/database.php';

$has_err = false;
$err_course = "";

    if (isset($_POST['submit1'])) {
        $course = $_POST['courseName'];
        if (empty($course)) {
            $err_course = "Course Name Must be filled";
            $has_err = true;
        }
        $filepath = $_FILES["file"]["name"];
        //echo print_r($filepath);
        //echo "showing path".$filepath;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) {
            echo "<img src=" . $filepath . " height=200 width=300 />";
        } else {
            //$has_err = true;
            echo "Error !!";
        }
        if (!$has_err) {
            $db = new DataBase();
            $db->dbCon();
            $db->addCourse($course, $filepath, $t_id);
        }
    }

    function giveAssignmentMarks($course_id){
        $db = new DataBase();
        $db->dbCon();
        $array = $db->studentCourseAssignments($course_id);
        return $array;
    }

    function showStudentAssignment($course_id){
        $db = new DataBase();
        $db->dbCon();
        $array = $db->studentUploadedAssignment($course_id);
        foreach ($array as $output){}
        return $array;
    }

    //not needed this post statement...
    if(isset($_POST['giveMarksOnAssignment'])){
        $db = new DataBase();
        $db->dbCon();
        $db->giveAssignmentMarks($_POST['stud_id'], $_POST['marksForAssignment'] , $_POST['total_marks_for_assignment'], $_POST['assignment_id']);
        //header("Location: ../views/checkAssignment.php?assignment_id=".$assign_id."&marks=".$totalMarks);
    }

    if(isset($_POST['btnUpdateStudentMarks'])){
        $db = new DataBase();
        $db->dbCon();
        $db->updateAssignmentMarks($stud_id, $_POST['updateStudentMarks'] , $totalMarks, $assign_id);
        header("Location: ../views/checkAssignment.php?assignment_id=".$assign_id."&marks=".$totalMarks);
    }

    function trendingCourseHomePage(){
        $db = new DataBase();
        $db->dbCon();
        $data = $db->trendCourse();
        if(!empty($data)){
            foreach ($data as $variable){}
            $db = new DataBase();
            $db->dbCon();
            $x = $db->trendCourseDetails($variable['c_id']);
            return $x;
        }
        else{
            $data = "No Trending Course Found";
            return $data;
        }
    }

?>
