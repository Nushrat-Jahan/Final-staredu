<?php
//Set Session
session_start();

//working on the sign in check with COOKIE....
include_once '../controllers/cookie.php';

//include '../controllers/booksController.php';
include_once '../models/dataBase.php';
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../design.css"/>
    <style>
        table, th, td {
            border-left: none;
            border-right: none;
        }

        #linkButton:link, #linkButton:visited {
            background-color: #3e603e;
            color: #482222;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        #linkButton:hover, #linkButton:active {
            background-color: #6265b0;
        }
        body{
            background-color: ThreeDLightShadow;
        }
    </style>
</head>
<!--
<body onload="something2()">
-->
<body>
<div align="center">
<!--
    <input type="text" size="100" name="textSearch" placeholder="search here" id="textSearch" onkeyup="liveSearch()">
    -->

</div>

<!--
<script src="liveSearch.js"></script>
-->

<div id="studentList">

</div>

<br><br><br>
<div align="center" id="some">
    <?php
        include_once 'studentList.php';
    ?>
</div>

</body>