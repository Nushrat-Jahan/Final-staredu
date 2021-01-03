<?php
    //include 'valid.php';
    /*the above include was used when checking from the xml file. not used for the final.
    we will be using the database to varify.*/
    include_once '../controllers/teacherControllers.php';
    include_once '../controllers/courseControllers.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color: #c1b1b1;
        }
        table{
            background-color: lightskyblue;
        }
    </style>
<link rel="stylesheet" type="text/css" href="../design.css"/>
</head>
<body>
<table align="left">
    <tr>
        <td>
            WELCOME!!!
        </td>
        <td></td>
    </tr>
</table>
    <table align="center" border="5" cellspacing="10">
        <?php
        echo "<tr>
            <td>
                <h1>Trending Course in StarEdu</h1>
            </td>
            </tr>";
        ?>



        <?php
        echo "<tr>
                <td>";
            $pic = trendingCourseHomePage();
            foreach ($pic as $trendInfo){}
            echo "<img src='{$trendInfo['thumbnail']}' height=200 width=300>" . "<br>";
            echo "<strong>" . $trendInfo['c_name'] . "</strong>";
            echo "</td>
                </tr>";
        ?>
        </tr>
        <tr>
            <td>Create Account To get MORE!!</td>
        </tr>
    </table>
    <table align="center">
        <tr>
            <td>
            <form action="" method="post">
                <br><input type="submit" name="" value="Sign Up as Student!">
             </form>
            </td>
            <td>
                <form action="teacherSignUp.php" method="post">
                    <br><input type="submit" name="teacherSignUp" value="Sign Up as Teacher!">
                </form>
            </td>
            <td>
                <form action="">
                    <br><input type="submit" name="" value="Sign IN As Student!">
                </form>
            </td>
        </tr>
    </table>
    <br><br>
    <hr>
    <table align="center">
        <tr>
            <td>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" onsubmit="return loginValidate()">
                <input type="text" name="userEmail" id="userEmail" placeholder="Enter Email Adress" size="35"> <span id="err_teacherEmail"> </span>
                <br>
                <input type="password" name="userPassword" id="userPassword" placeholder="Enter Password" size="35"> <span id="err_teacherPassword"> </span>
                <br><br>
                <input type="submit" name="teacherSignIn" value="Sign IN as Teacher!">
                <span id="checkPass"> </span>
             </form>
             <?php echo "<strong>$notFound</strong>"; ?>
            </td>
        </tr>
    </table>

    <script src="js/loginValidation.js">

    </script>
</body>
</html>