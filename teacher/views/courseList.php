<?php
include_once '../models/database.php';
//function courseList($t_id){

    $t_id = $_GET['id'];
    $text = $_GET['text'];

    $db = new DataBase();
    $db->dbCon();
    //$result = $db->allCourses($t_id);
    $result = $db->searchCourseList($text, $t_id);
    if (!empty($result)) {
        foreach ($result as $data) {
            echo "<table align='center'>
                <tr>
                    <td>
                    <h1>";
            echo "<a href='lecture.php?course_id=".$data['c_id']."'>"."<img src='{$data['thumbnail']}' height=200 width=300>".$data['c_name']. "</a>";

            echo  "</h1>
                   </td>
                </tr>";
            //echo "<img src='{$data['thumbnail']}' height=100 width=100" .$data['c_name']. "</a>";
            //echo $data['c_name'];
        }
    }
    else{
        echo "<h1>NO COURSES!</h1>";
    }
//}
?>
