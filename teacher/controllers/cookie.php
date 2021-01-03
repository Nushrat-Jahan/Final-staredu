<?php
//echo 'hello cookie';
    if(!isset($_COOKIE['userEmail'])){
        header("Location: ../views/home.php");
    }
    /*if(isset($_POST['teacherSignIn'])){
        //header("Location: home.php");
        echo "hiofsd";
    }*/
?>