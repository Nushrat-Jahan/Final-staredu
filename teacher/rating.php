
<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css"/>
</head>
<body>
    <table align="center">
        <tr>
            <td>
            <form action="views/studentList.php" method="post">
                <select name="CourseList">
                    <option value="Python">Python</option>
                    <option value="Database">Database</option>
                    <option value="Java">Java</option>
                    <option value="PHP">PHP</option>
                </select>
                <?php
                    if(isset($_POST['certificate'])){
                        echo '<input type="submit" name="giveCertificate" value="GO!">';
                    }
                    else if(isset($_POST['courseRating'])){
                        echo '<input type="submit" name="seeRating" value="See Rating">';
                    }

                ?>
            </form>
            </td>
        </tr>
    </table>
</body>
</html>