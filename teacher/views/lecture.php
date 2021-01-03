<?php
//Set Session
session_start();

//echo 'haha';
//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

$c_id = $_GET['course_id'];

include_once '../controllers/lectureControllers.php';
include_once '../controllers/student_controllers.php';
//include_once '../controllers/courseControllers.php';
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../design.css"/>
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
            background-color: ThreeDLightShadow;
        }
    </style>
</head>
<body onload="something2()">


<script type="text/javascript">
    function something(text, cid) {
        //alert(cid);
        var xhttp = new XMLHttpRequest();
        //alert(text);
        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lec_List").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "lectureList.php?text="+ text+"&course_id="+cid, true);
        xhttp.send();
        //alert('value: ' +text.value);
    }
    function any(){
        //alert('fs');
        var cid = <?php echo $c_id; ?>;
        
        var v = document.getElementById('searchLectureText').value;
        //alert(v);
        something(v, cid);
    }
    //document.write(x);

    function something2() {
        //alert('sfs');
        var courseId = <?php echo $c_id; ?>;
        var text = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lec_List").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "lectureList.php?text=&course_id="+ courseId, true);
        xhttp.send();
        //alert("fef");
    }

</script>
    <table align="left">
        <form action="" method="post">
        <tr>
            <td>
                <input type="submit" name="students" value="Student List"> <br>
                <input type="submit" name="markAssignment" value="Mark Assignment"> <br>
                <!-- JSON LINK FOR LECTURE LIST -->
                <a href='lecJSON.php?course_id=<?php echo $c_id?>'> JSON Lectures</a>
            </td>
        </tr>
        </form>
    </table>

    <table align="center">
        <tr>
            <td>

                <input type="text" name="searchLecture" id="searchLectureText" onkeyup="any()" placeholder="Search Lecture" size="100"><br>
                <form action="" method="post">
                    <input type="submit" name="addLecture" value="Add Lecture">
                </form>
                    <?php
                    //include_once 'lectureList.php';
                    ?>

                    <div id="lec_List">

                    </div>

            </td>
        </tr>
        <!-- (REMOVED...)
        <tr>
            <td>
            <video height="250" width="300" controls>
                <source src="../files/DSC_1738MP4_upload_version.mp4" type="video/mp4">

            </video>
            </td>
        </tr>
        -->
    </table>
</body>
</html>