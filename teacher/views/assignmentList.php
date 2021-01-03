<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$course_id = $_GET['course_id'];
include_once '../controllers/courseControllers.php';
$result = giveAssignmentMarks($course_id);
//$array = showStudentAssignment($course_id);
//print_r($array, true);

//foreach ($result as $data){}
?>

<html lang="en">
<head>
    <style>
        a:link, a:visited {
            background-color: #f44336;
            color: #000000;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        a:hover, a:active {
            background-color: #033c11;
        }

        body{
            background-color: #a9aab8;
        }

        tr {
            background-color: #d68686;
            color: #130101;
            text-align: center;
        }
    </style>

</head>
<body>
<form action="" method="post">


    <?php
    foreach ($result as $data) {
        echo "<table align='center' cellpadding='5' cellspacing='5'>
        <tr>
        <td>
            Assignment File
        </td>
        <td>Total Marks</td>
        <td></td>
    </tr>";
        echo "<tr>
              <td>";
        echo $data['assign_file'];
        if((strripos($data['assign_file'], ".png")) || strripos($data['assign_file'], ".png")) {
            echo "<img src='{$data['assign_file']}' height=200 width=300>" . "<hr>". "<br>";
        }
        else{
            echo "<strong>" . $data['assign_file'] . "</strong>". "<br>";
            echo "<a href='{$data['assign_file']}' download> DOWNLOAD!!! </a>";
            echo "<hr><br><br>";
        }
        echo "</td>
            <td>";
        echo $data['marks'];
        echo "</td>
                <td>
                <a href='checkAssignment.php?assignment_id=" . $data['assign_id'] ."&marks=".$data['marks']."'>Check Assignment</a>
                </td>
               
                ";

            echo    "</td>
            </tr>";

        echo "<hr>"."<hr>"."<br>";
        echo "</table>";
    }

    ?>

</form>
</body>
</html>