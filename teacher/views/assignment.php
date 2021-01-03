<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$t_id = $_GET['id'];
include_once '../controllers/courseControllers.php';
?>

<html>
<head>
    <style>
        body{
            background-color: ThreeDLightShadow;
        }
    </style>
<link rel="stylesheet" type="text/css" href="../design.css"/>
</head>
<body>
<!--
<form action="" method="post">
    <input type="submit" name="test1" value="test1">
</form>
-->
    <table align="center">
        <tr>
            <td>
                <h2>Give Assignment</h2><br>
            <form action="" enctype="multipart/form-data" method="post">
                <select name="courseList">
                    <option disabled selected>Course</option>
                    <!--
                    <option value="Python">Python</option>
                    <option value="Database">Database</option>
                    <option value="Java">Java</option>
                    <option value="PHP">PHP</option>
                    -->
                    <?php
                        include_once '../models/database.php';
                        $array = new DataBase();
                        $array->dbCon();
                        $result = $array->allCourses($t_id);
                        if(!empty($result)) {
                            foreach ($result as $data) {
                                echo "<option value='." . $data['c_id'] . ".'>" . $data['c_name'] . "</option>";
                            }
                        }
                    ?>
                </select> <br><br>
                Enter Marks for Assigment <input type="text" name="assignmentMarks" placeholder="Enter the Marks">
                <input type="file" name="file"><br/><br>
                <!--<input type="submit" name="markAssign" value="Mark Assignment!">-->
                <input type="submit" name="addAssignment" value="Give Assignment"> <br>
                <?php echo $file_format; ?>
            </form>
            </td>
        </tr>
    </table>
</body>
</html>