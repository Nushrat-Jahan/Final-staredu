<?php

include_once '../models/database.php';
//working on teacher sign in
/*if(!isset($_POST['teacherSignIn'])){
    header("Location: home.php");
    echo "hiofsd";
}*/

$field = "";
$notFound = "";
if(isset($_POST['teacherSignIn'])) {
    //echo "hello";
    if(empty($_POST['userEmail']) || empty($_POST['userPassword'])){
        $field = "Fields cannot be empty";
    }
    else {
        //$field = "Password did not match with the user email";

        //$xmlLoad = simplexml_load_file("teacher.xml");

        $name = $_POST['userEmail'];
        $pass = $_POST['userPassword'];

        //_____________Now decryption of m5 password_____________//
        $decPass = md5($pass);

        /*foreach ($xmlLoad as $xmlRoot) {
            if ($name == $xmlRoot->email && $pass == $xmlRoot->password){
                echo "Logged in";

                setcookie('userEmail', $name, time()+20);
                header("Location: teacherHome.php");
                break;
            }
        }*/
        $db = new DataBase();
        $db->dbCon();
        //For Normal Password...
        //$sig = $db->searchTeachers($name, $pass);

        //for Decrypted Password
        $sig = $db->searchTeachers($name, $decPass);
        if ($sig == 1) {
            //Set Session
            session_start();
            $_SESSION['userEmail'] = $name;

            //Set Cookie
            setcookie('userEmail', $name, time() + 1000);
            header('Location: ../views/teacherHome.php?email=' . $name);
        } else {
            //header("Location: ../views/home.php");
            $notFound = "password not matched with email";
            //echo "<script type='text/javascript'>notFound();</script>";
            /*echo '<script type="text/javascript">',
            'notFound();',
            '</script>'
            ;*/
            /*echo "<script>
                    
                    //document.getElementById('checkPass').innerHTML = 'Password not matched with email';
                    var xhttp = new XMLHttpRequest();
                    //alert(text);
                    xhttp.onreadystatechange = function () {
                
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById('checkPass').innerHTML = 'ilafdcd';
                            alert('oidwad');
                            
                        }
                    };
                    xhttp.open('GET', '../views/check.php?', true);
                    xhttp.send();
                    alert('eaf');
                </script>";*/
            echo "<script>
                    getElement('checkPass').innerHTML = 'sdad';
                   </script>";
        }
    }
}

$err_tName = "";
$tName = "";
$err_tEmail = "";
$tEmail = "";
$err_tPass = "";
$tPassword = "";
$tEncPass = "";
$has_err = false;

if(isset($_POST['teacherRegistration'])){
    //echo 'efwa';

    if (empty($_POST['teacherName'])) {
        $err_tName = "Name cannot be empty!";
        $has_err = true;
    }
    else {
        if (strlen($_POST['teacherName']) < 6) {
            $err_tName = "Name cannot be less than 6 letter";
            $has_err = true;
        } else {
            $tName = htmlspecialchars($_POST['teacherName']);
        }
    }

    if (empty($_POST['teacherEmail'])) {
        $err_tEmail = "Email cannot be empty!";
        $has_err = true;
    }
    else if (!empty($_POST['teacherEmail'])){
        if(strpos($_POST['teacherEmail'], ".") && strpos($_POST['teacherEmail'], "@")){
            if(strpos($_POST['teacherEmail'], ".") > strpos($_POST['teacherEmail'], "@")){
                $tEmail = htmlspecialchars($_POST['teacherEmail']);
            }
            else{
                $err_tEmail = "@ must be before (.)";
                $has_err = true;
            }
        }
        else{
            $err_tEmail = "@ and (.) must be included";
            $has_err = true;
        }
    }

    if (empty($_POST['teacherPass'])) {
        $err_tPass= "Password cannot be empty!";
        $has_err = true;
    }
    if (!empty($_POST['teacherPass'])){
        if(strlen($_POST['teacherPass']) < 6) {
            $err_tPass= "Password cannot be less than 6 letter";
            $has_err = true;
        }
        if(!strpos($_POST['teacherPass'], "!") && !strpos($_POST['teacherPass'], "?")) {
            $err_tPass= "Password must have a special character";
            $has_err = true;
        }
        if(!strpos($_POST['teacherPass'], "1") && !strpos($_POST['teacherPass'], "2") && !strpos($_POST['teacherPass'], "3") && !strpos($_POST['teacherPass'], "4")
            && !strpos($_POST['teacherPass'], "5") && !strpos($_POST['teacherPass'], "6") && !strpos($_POST['teacherPass'], "7") && !strpos($_POST['teacherPass'], "8")
            && !strpos($_POST['teacherPass'], "9") && !strpos($_POST['teacherPass'], "0")){
            $err_tPass= "Password must have a number";
            $has_err = true;
        }
        if(strtoupper($_POST['teacherPass']) == $_POST['teacherPass']){
            $err_tPass= "Password must have a Lower character";
            $has_err = true;
        }
        if(strtolower($_POST['teacherPass']) == $_POST['teacherPass']){
            $err_tPass= "Password must have a Upper character";
            $has_err = true;
        }
        else{
            $tPassword = htmlspecialchars($_POST['teacherPass']);
            $tEncPass = md5($tPassword);
        }
    }
    if(!$has_err){
        //echo 'hurrah';
        $db = new DataBase();
        $db->dbCon();
        $sig = $db->insertTeacher($tName, $tEmail, $tEncPass);
        echo "<h3>"."Sign Up Successful..."."</h3>";
        //header("Location: ../views/home.php");
    }
}

function checkEmail(){

    $email = $_POST['teacherEmail'];
    $db = new DataBase();
    $db->dbCon();
    $sig = $db->searchEmail($email);
    return $sig;
}

function skip($test){
    //echo $_POST['teacherEmail'];
    return $test;
}

$textBox = "";
if(isset($_POST['insertNotification'])){
    //change made
    /*if(!isset($_POST['courseList'])){
        $textBox = "Choose course!";
    }*/

    if(empty($_POST['details']) || empty($_POST['heading']) || !isset($_POST['courseList'])){
        $textBox = "Fields cannot be empty and Course Must be Selected...";
        echo $textBox;
    }
    else{
        $details = $_POST['details'];
        $heading = $_POST['heading'];
        $c_id = $_POST['courseList'];

        $db = new DataBase();
        $db->dbCon();
        $sig = $db->insertNotice($heading, $details, $c_id, $t_id);
    }
}

function getID($t_id){
    $db = new DataBase();
    $db->dbCon();
    $data = $db->getTeacherID($t_id);
    $id = $data['t_id'];
    return $id;
}
?>
