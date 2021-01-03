<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$s_id = $_GET['s_id'];
//echo $s_id;
include_once '../models/database.php';
include_once '../controllers/student_controllers.php';

$result = StudentDetails($s_id);
echo "<div align='center'>";
if(!empty($result)){
    echo $result['id'];
    //echo $result['description'];
    echo "<br>"."<br>";
    echo "Student ID: ".$result['id']."<br>";
    echo "Student Full Name: ".$result['fullname']."<br>";
    echo "Student User Name: ".$result['username']."<br>";
    echo "Student Email: ".$result['email']."<br>";
    echo "Student User Name: ".$result['gender']."<br>";
    echo "Student Email: ".$result['profession']."<br>";
}
echo "</div>"
?>

<html>
<head>
    <style>
        body{
            background-color: ThreeDLightShadow;
        }
    </style>
</head>
<body>


</body>
</html>
