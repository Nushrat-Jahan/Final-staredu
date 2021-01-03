<?php
//Set Session
session_start();

    include 'homePage.php';
$t_id = $_GET['email'];
include_once '../controllers/teacherControllers.php';
$id = getID($t_id);
    //include 'cookie.php';
    include_once '../controllers/cookie.php';
    //include_once 'teacher/'
if(isset($_POST['courses'])){
    header("Location: course.php?id=".$id);
}
if(isset($_POST['notification'])){
    header("Location: notification.php?id=".$id);
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../design.css"/>
    </head>
    <body>
        <table align="left" valign="bottom">
            <tr>
                <td>
                    <form action="" method="post">
                        <br>
                        <input type="submit" name="notification" value="New Notification">
                    </form>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <form action="" method="post">
                        <br>
                        <input type="submit" name="courses" value="Courses">
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>