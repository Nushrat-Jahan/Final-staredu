<?php
//Set Session
//session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

include_once '../models/dataBase.php';
$c_id = $_GET['course_id'];
//$text = $_GET['text'];
/*$array = new DataBase();
$array->dbCon();
$result = $array->searchBookList($text);*/

include_once '../controllers/student_controllers.php';

$result = showStudentList($c_id);
//echo $c_id;
echo "<table border='3'>";
echo "<th>ID</th>
         <th>Name</th>
         <th>Result</th>
         <th>State</th>";
/*if(!empty($result)){
    foreach ($result as $data) {
        echo "<tbody>";
        echo "<td>" . "<a href='Book_detail.php?book_id=" . $data["id"]. "'>". $data['id'] . "</a>". "</td>".
            "<td>" . "<a href='Book_detail.php?book_id=" . $data['id'] ."'>" .$data['name'].  "</a>" . "</td>".
            "<td>" . "<a href='Book_detail.php?book_id=" . $data['id'] ."'>" .$data['author'].  "</a>" . "</td>".
            "<td>" . "<a href='Book_detail.php?book_id=" . $data['id'] ."'>" .$data['edition'].  "</a>" . "</td>".
            "<td>" . "<img src='{$data['bookimage']}' height=100 width=100" .$data['bookimage'].  "</a>" . "</td>".

            "</tbody>".
            "</td>";
    }
}*/

if(!empty($result)){
    foreach ($result as $data) {
        echo "<tbody>";
        echo "<td>" . "<a href='student_Details.php?s_id=" . $data["id"]. "'>". $data['id'] . "</a>". "</td>".
            "<td>" . "<a href='student_Details.php?s_id=" . $data['id'] ."'>" .$data['fullname'].  "</a>" . "</td>".
            "<td>". $data['result']. "</td>".
            "<td>". $data['c_state']. "</td>".
            "<td>" . "<a id='linkButton' href='giveCertificate.php?s_id=" . $data['id'] ." &course_id=". $data['c_id'] ."'>" ."Give Certificate".  "</a>" . "</td>".
            "<td>" . "<a id='linkButton' href='student_Details.php?s_id=" . $data['id'] ."'>" ."Details".  "</a>" . "</td>".
            "<td>" . "<a id='linkButton' href='studentReviewRating.php?s_id=" . $data['id'] ." &course_id=". $data['c_id']."'>" ."Review & Rating".  "</a>" . "</td>".


            "</tbody>".
            "</td>";
    }
}
else{
    echo "NO DATA FOUND";
}
echo "</table>";
?>