<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$s_id = $_GET['s_id'];
$c_id = $_GET['course_id'];

include_once '../controllers/student_controllers.php';
include_once '../models/database.php';
$db = new DataBase();
$db->dbCon();
$result = $db->showStudentReviewRating($s_id, $c_id);
foreach ($result as $data)
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
<div align="center">
    <h3>
    <?php
    $rate = "";
        echo "Review: ".$data['s_review']."<br>";
        if($data['s_rating'] > 0){
            $rate = $data['s_rating'];
        }
        echo "Rating: ".$rate;
    ?>
    </h3>
</div>
</body>
</html>
