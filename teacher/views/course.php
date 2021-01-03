<?php
//Set Session
session_start();

    /*if(!isset($_COOKIE['userEmail'])){
        header("Location: views/home.php");
    }*/

include_once '../controllers/cookie.php';

    /*if(!isset($_POST['teacherSignIn'])){
        //header("Location: home.php");
        echo "hiofsd";
    }*/

    $t_id = $_GET['id'];
    //echo $t_id;
    if(isset($_POST['addCourses'])){
        header("Location: addCourse.php?id=".$t_id);
    }
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
    <body onload="beginning()">

    <script type="text/javascript">
        function afterSearchCourse(text, tid) {
            //alert(tid);
            var xhttp = new XMLHttpRequest();
            //alert(text);
            xhttp.onreadystatechange = function () {

                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("course_List").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "courseList.php?text="+ text+"&id="+tid, true);
            xhttp.send();
            //alert('value: ' +text.value);
        }
        function searchCourse(){
            //alert('fs');
            var tid = <?php echo $t_id; ?>;

            var v = document.getElementById('searchCourseText').value;
            //alert(v);
            afterSearchCourse(v, tid);
        }

        function beginning() {
            //alert('sfs');
            var tid = <?php echo $t_id; ?>;
            var text = "";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("course_List").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "courseList.php?text=&id="+ tid, true);
            xhttp.send();
        }

    </script>

        <table align="left">
            <tr>
                <td>
                    <form action="" method="post">
                        <input type="submit" name="addCourses" value="Add Courses">
                    </form>
                    <!--
                    <form action="../rating.php" method="post">
                        <input type="submit" name="courseRating" value="Course Review & Rating">
                    </form>
                    -->
                    <form action="" method="post">
                        <input type="submit" name="giveAssignment" value="Give Assignment">
                    </form>
                </td>
            </tr>
        </table>
    <div align="center">
        <input type="text" name="searchCourse" id="searchCourseText" onkeyup="searchCourse()" placeholder="Search Course" size="100"><br>

    </div>
        <form action="">
        <table align="center">
            <tr>
                <td>
                    <h1>
                    </h1>
                </td>
            </tr>
            <!-- (REMOVED)
            <tr>
                <td>
                    <h1>
                        <a href="lectureList.php"><img src="../files/ER_diagram.png" width="300" height="200">Python</a>
                    </h1>
                </td>
            </tr>
            -->
            <tr>
                <td>
                    <h1>
                        <?php
                        //include_once 'courseList.php';
                        //courseList($t_id);
                        ?>
                    </h1>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="course_List">

                    </div>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>