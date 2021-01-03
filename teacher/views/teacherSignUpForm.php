<?php
include_once '../models/database.php';

$t_email = $_GET['tEmail'];

$db = new DataBase();
$db->dbCon();
$sig = $db->searchEmail($t_email);
if($sig == 1){
    echo "Exists";
}
else{
    echo "";
}

echo "<table align='center'>
    <tr>
        <td>
            <strong>Enter Name</strong>
        </td>
        <td>";
echo "<input type='text' name='teacherName' id='teacherName' placeholder='Enter Name' size='35'> <span id='err_teacherName'> <?php echo '';?> </span>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Enter Email</strong>
        </td>
        <td>";
echo "<input type='text' name='teacherEmail' id='teacherEmail' placeholder='Enter Email Address' size='35'> <span id='err_teacherEmail'> </span>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Enter Password</strong>
        </td>
        <td>";
echo "<input type='text' name='teacherPass' id='teacherPass' placeholder='Enter Password' size='35'> <span id='err_teacherPass'> </span>

        </td>
    </tr>
    <tr>
    <td></td>
    <td>
    <input type='submit' name='teacherRegistration' value='Sign Up'>
</td>
</tr>";
?>