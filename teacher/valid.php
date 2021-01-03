<?php
    $field = "";
    if(isset($_POST['teacherSignIn'])) {
        //echo "hello";
        if(empty($_POST['userEmail']) || empty($_POST['userPassword'])){
            $field = "Fields cannot be empty";
        }
        else{
            $field = "Password did not match with the user email";
        }
        $xmlLoad = simplexml_load_file("teacher.xml");

        $name = $_POST['userEmail'];
        $pass = $_POST['userPassword'];
        foreach ($xmlLoad as $xmlRoot) {
            if ($name == $xmlRoot->email && $pass == $xmlRoot->password){
                echo "Logged in";

                setcookie('userEmail', $name, time()+20);
                header("Location: teacherHome.php");
                break;
            }
        }
    }
?>