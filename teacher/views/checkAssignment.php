<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$assign_id = $_GET['assignment_id'];
$totalMarks = $_GET['marks'];

include '../controllers/courseControllers.php';
$array = showStudentAssignment($assign_id);

//echo $totalMarks;
?>

<html>
<head>
    <style>
        a:link, a:visited {
            background-color: #30979b;
            color: #c1b1b1;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        a:hover, a:active {
            background-color: #d02d18;
        }

        table{
            border-collapse: collapse;

        }

        tr {
            background-color: #000000;
            color: #ffffff;
            text-align: center;
        }
         body{
             background-color: ThreeDLightShadow;
         }

    </style>
    <link rel="stylesheet" type="text/css" href="../design.css"/>

</head>
<body>
<form action="" method="post">
    <?php
    echo "<table align='center' border='5'>";
    echo "<tr>
            <td>Student ID</td>
            <td>Student File</td>
            <td>Student Marks</td>
            <td>Total Marks</td>
            <td></td>
            </tr>";
    foreach ($array as $studentData){
        //print_r($studentData);
        echo "<tr>
                    <td>";
        echo        $studentData['s_id'];
        $stud_ID = $studentData['s_id'];
        echo "<input type='hidden' name='stud_id' value='$stud_ID'>";
        echo "</td>";
        echo "<td>";
        echo        $studentData['assignment_file']."<br>";
        echo "<a href='{$studentData['assignment_file']}' download> DOWNLOAD!!! </a>";
        echo "</td>";

        echo "<td>";
        //echo    $totalMarks."<br>";
        if($studentData['assignment_student_marks'] == null){
            echo "Marks not Given";
        }
        else{
            echo $studentData['assignment_student_marks']."<br>";
        }
        //echo "<input type='text' name='marksForAssignment' id='giveMarksOnAssignment' placeholder='Marks For Assignment'>"."<br>";
        //echo "<span id='empty_marks'></span>";
        echo "</td>";

        echo "<td>";
        echo    $totalMarks;
        $total_marks = $totalMarks;
        echo "<input type='hidden' name='total_marks_for_assignment' value='$total_marks'>";

        echo "<input type='hidden' name='assignment_id' value='$assign_id'>";
        echo "</td>";

        //echo "<td>";
        //echo    "<input type='submit' name='giveMarksOnAssignment' value='DONE'>";
        //echo "</td>";
        echo "<td>";

        echo "</td>";

        echo "<td>
                 <a href='markAssignment.php?s_id=" . $studentData['s_id'] ." &assign_id=".$assign_id." &total_marks=".$totalMarks."'>Update Marks</a>
                </td>";

        echo "</tr>";
    }
    echo "</table>";
    ?>
</form>
</body>
</html>