<?php
class DataBase
{
    private $serverName = "localhost: 3345";
    private $user = "root";
    private $dbpassword = "";
    private $dbName = "Staredus";

    private $con;

    function dbCon()
    {
        $this->con = mysqli_connect($this->serverName, $this->user, $this->dbpassword, $this->dbName);

        if (!$this->con) {
            die("not connected");
        } else {
            //echo "Connected<br> Now Showing data <br><br/>";
        }
    }

    function trendCourse(){
        /*$query = "SELECT c_id, COUNT(c_id)
                    FROM student_course
                    WHERE c_state = 'In Progress'
                    GROUP by c_id
                    ORDER by COUNT(c_id)
                    DESC LIMIT 1";*/

        $query = "SELECT c_id, COUNT(c_id)
                    FROM student_course
                    WHERE c_state = 'In Progress'
                    AND result <> 'Passed'
                    GROUP by c_id
                    ORDER by COUNT(c_id)
                    DESC LIMIT 1";

        $result = mysqli_query($this->con, $query);

        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
                //$data['t_name'];
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function trendCourseDetails($c_id){
        $query = "SELECT * FROM courses where c_id = '$c_id';";

        $result = mysqli_query($this->con, $query);

        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
                //$data['t_name'];
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function insertTeacher($t_name, $t_mail, $t_pass)
    {
        $sqlQuery = "INSERT INTO teacher (t_name, t_mail, t_pass)
                    VALUES ('$t_name', '$t_mail', '$t_pass')";

        mysqli_query($this->con, $sqlQuery);
    }

    function searchTeachers($t_email, $t_pass)
    {
        $sqlQuery = "SELECT * FROM teacher WHERE t_mail = '$t_email' AND t_pass = '$t_pass';";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            return 1;
        } else {
            //return  "not found";
        }
    }

    function searchEmail($t_email){
        $sqlQuery = "SELECT * FROM teacher WHERE t_mail = '$t_email';";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function getTeacherID($email){
        $query = "SELECT t_id from teacher where t_mail = '$email'";
        $result = mysqli_query($this->con, $query);
        $row = mysqli_num_rows($result);

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $row = $rowArray;
            }
            return $row;
        }
    }

    function allCourses($t_id){
        $sqlQuery = "select * from courses WHERE t_id = '$t_id'";
        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function addCourse($c_name, $filepath, $t_id)
    {
        $sqlQuery = "INSERT INTO courses(c_name, thumbnail, t_id) VALUES ('$c_name', '$filepath', '$t_id');";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function courseName(){
        $sqlQuery = "SELECT * FROM courses
                    ";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);
        $data = [];
        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data = $rowArray;
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function insertNotice($heading, $details, $c_id, $t_id)
    {
        $sqlQuery = "INSERT INTO notice (heading, details, c_id, t_id)
                    VALUES ('$heading', '$details', '$c_id', '$t_id')";

        mysqli_query($this->con, $sqlQuery);
    }

    function insertAssignment($file, $marks, $c_id, $t_id)
    {
        $sqlQuery = "INSERT INTO assignments (assign_file, marks, c_id, t_id)
                    VALUES ('$file', '$marks', '$c_id', '$t_id')";

        mysqli_query($this->con, $sqlQuery);
    }

    function addLecture($lec_name, $c_id, $filepath)
    {
        $sqlQuery = "INSERT INTO lecture(lec_name, c_id, lec_file) VALUES ('$lec_name', '$c_id', '$filepath');";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function allLectures($c_id){
        $sqlQuery = "select * from lecture WHERE c_id = '$c_id'";
        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function deleteLecture($lec_id)
    {
        $sqlQuery = "DELETE FROM lecture
                    WHERE lec_id = '$lec_id'";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function searchLectureList($text, $c_id){
        $sqlQuery = "select * from lecture where lec_name LIKE '%$text%'
                       and c_id = '$c_id' ";
        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = []; //empty array

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else {
            return $data;
        }
    }

    function searchCourseList($text, $t_id){
        $sqlQuery = "select * from courses where c_name LIKE '%$text%'
                       and t_id = '$t_id' ";
        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = []; //empty array

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else {
            return $data;
        }
    }

    function showStudent($id){
        $sqlQuery = "SELECT id, fullname, c_state, result, s_rating, s_review, c_id
                        FROM student, student_course
                        WHERE id = s_id
                        and c_id = '$id'";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = []; //empty array

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
            }
            return $data;
        }
        else {
            return $data;
        }

    }

    function studDetails($id)
    {
        $sqlQuery = "SELECT * FROM student where  id = '$id';";

        $result = mysqli_query($this->con, $sqlQuery);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
                //$data['t_name'];
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function giveStudentCertificate($s_id){
        $sqlQuery = "UPDATE student_course
                    SET 
                    result = 'Passed'
                    where s_id = '$s_id';";

        $result = mysqli_query($this->con, $sqlQuery);
    }

    function showStudentReviewRating($s_id, $c_id){
        $query = "SELECT s_rating, s_review
                    FROM student_course
                    WHERE s_id = '$s_id'
                    AND c_id = '$c_id';";

        $result = mysqli_query($this->con, $query);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
                //$data['t_name'];
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function studentCourseAssignments($c_id){
        $query = "SELECT assign_id, assign_file, marks FROM assignments where c_id = '$c_id'";

        $result = mysqli_query($this->con, $query);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
                //$data['t_name'];
            }
            return $data;
        }
        else{
            return $data;
        }
    }
    function studentUploadedAssignment($c_id){
        $query = "SELECT * FROM student_assignment where c_id = '$c_id'";

        $result = mysqli_query($this->con, $query);
        $row = mysqli_num_rows($result);

        $data = [];

        if($row > 0){
            while ($rowArray = mysqli_fetch_assoc($result)){
                $data[] = $rowArray;
                //$data['t_name'];
            }
            return $data;
        }
        else{
            return $data;
        }
    }

    function giveAssignmentMarks($s_id, $assignment_student_marks, $total_marks, $assign_id){
        $query = "UPDATE student_assignment  
                   set assignment_student_marks = '$assignment_student_marks',
                   total_marks = '$total_marks'
                   where s_id = '$s_id'
                   and assign_id = '$assign_id';";

        $result = mysqli_query($this->con, $query);

    }

    function updateAssignmentMarks($s_id, $assignment_student_marks, $total_marks, $assign_id){
        $query = "UPDATE student_assignment  
                   set assignment_student_marks = '$assignment_student_marks',
                   total_marks = '$total_marks'
                   where s_id = '$s_id'
                   and assign_id = '$assign_id';";

        $result = mysqli_query($this->con, $query);

    }
}
?>