<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$c_id = $_GET['course_id'];
include_once '../controllers/lectureControllers.php';

?>

<html>
<head>
    <style>

        input[type=button], input[type=submit], input[type=reset] {
            background-color: #4CAF50;
            border: none;
            border-radius: 12px;
            color: white;
            padding: 15px 25px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

        div{
            background-color: grey;
        }

        body{
            background-color: ThreeDLightShadow;
        }

    </style>
</head>
<body>
<table align="center">

    <tr>
        <td>
            <form action="" enctype="multipart/form-data" method="post">
                <input type="text" name="lectureName" placeholder="Enter Lecture Name" size="35"><br>
                <strong>Post a file (video, image, pdf etc) for the Lecture</strong><br><br>
                <input type="file" name="file"><br/>
                <input type="submit" value="UPLOAD LECTURE" name="uploadLecture"> <br/>
            </form>
            <?php
            if(isset($_POST['submit1'])){
                echo "<strong>Lecture added Successfully</strong>";
            }

            ?>
        </td>
    </tr>
</table>
</body>
</html>