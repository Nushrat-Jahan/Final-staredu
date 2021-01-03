<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$assign_id = $_GET['assign_id'];
$totalMarks = $_GET['total_marks'];
$stud_id = $_GET['s_id'];

//echo $assign_id."<br>";
//echo $totalMarks."<br>";
//echo $stud_id."<br>";

include '../controllers/courseControllers.php';
//$array = showStudentAssignment($assign_id);

//echo $totalMarks;
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../design.css"/>
    <style>
        body{
            background-color: ThreeDLightShadow;
        }
    </style>

    <script>
        function assignmentMarksValid(){
            alert('sedc');
            var studMarks = document.getElementById('updateStudentMarks').value;
            //alert('sedc');

            if(studMarks == ""){
                //alert("hello");
                document.getElementById('empty_marks').innerHTML = "Marks must be Filled";
                return false;
            }
            else {
                for(x = 0; x < studMarks.length; x++){
                    if(studMarks.charAt(x) >= 'a' && studMarks.charAt(x) <= 'z'){
                        document.getElementById('empty_marks').innerHTML = "Only Give Number";
                        return false;
                    }
                }
                for(x = 0; x < studMarks.length; x++){
                    if(studMarks.charAt(x) >= 'A' && studMarks.charAt(x) <= 'Z'){
                        document.getElementById('empty_marks').innerHTML = "Only Give Number";
                        return false;
                    }
                }
            }
            return true;
        }
    </script>
</head>
<body>
<form action="" method="post" onsubmit="return assignmentMarksValid()">
    <table align="center">
        <tr>
            <td>
                Give Marks:
                <input type="text" name="updateStudentMarks" id="updateStudentMarks" placeholder="update marks here"> <br>
                <span id="empty_marks"> </span>
            </td>
            <td>
                <input type="submit" name="btnUpdateStudentMarks" value="DONE">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
