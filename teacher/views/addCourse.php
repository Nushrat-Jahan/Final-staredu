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
                        <input type="text" name="courseName" placeholder="Enter Course Name" size="35"><br>
                        <strong>Post a photo for the course as a thumbnail</strong><br><br>
                        <input type="file" name="file"><br/>
                        <input type="submit" value="Done" name="submit1"> <br/>
                    </form>
                    <?php 
                    /*if(isset($_POST['submit1'])){
                        echo "<strong>Course added Successfully</strong>";
                    }*/

                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>