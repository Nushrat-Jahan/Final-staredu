<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$t_id = $_GET['id'];
include_once '../controllers/teacherControllers.php';
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
                <form action="" method="post">
                    <select name="courseList" id="">
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
                    </select>
                    <input type="text" name="heading" placeholder="enter Heading" size="35">
                    <br>
                    <textarea name="details" id="" cols="80" rows="10" placeholder="enter details"></textarea>
                    <input type="submit" name="insertNotification" value="Submit Notification">
                </form>
                <?php 
                    if(isset($_POST['detailSubmit'])){
                        echo "<strong>Notification sent Successfully</strong>";
                    }

                ?>
            </td>
        </tr>

    </table>

    </body>

</html>