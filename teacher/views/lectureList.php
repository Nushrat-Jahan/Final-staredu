<?php
include_once '../models/database.php';
$course_id = $_GET['course_id'];
$text = $_GET['text'];
//echo $course_id;
$db = new DataBase();
$db->dbCon();
//$result = $db->allLectures($course_id);
$result = $db->searchLectureList($text, $course_id);
if (!empty($result)) {
    foreach ($result as $data) {
        echo "<table align='center'>
            <tr>
                <td>";
                    //______Check for the file type_______
                    if(strripos($data['lec_file'], ".png") || strripos($data['lec_file'], ".jpg")){
                        //echo 'image';
                        echo "<img src='{$data['lec_file']}' height=200 width=300>" . "<br>";
                        echo "<strong>" . $data['lec_name'] . "</strong>";
                        echo "<hr><br><br>";
                    }
                    else if(strripos($data['lec_file'], ".mp4") || strripos($data['lec_file'], ".ogg")){
                        echo "<video height='200' width='300' controls>";
                        echo      "<source src='{$data["lec_file"]}' type='video/mp4'>
                                    <source src='{$data["lec_file"]}' type='video/ogg'>
                                    Sorry, your browser doesn't support the video element. 
                              </video>" . "<br>";
                        echo "<strong>" . $data['lec_name'] . "</strong>";
                        echo "<hr><br><br>";
                    }
                    else{
                        echo "<strong>" . $data['lec_name'] . "</strong>". "<br>";
                        echo "<a href='{$data['lec_file']}'> DOWNLOAD!!! </a>";
                        echo "<hr><br><br>";
                    }
        echo    "</td>";

        echo "<td>
                 <a href='deleteLecture.php?lec_id=" . $data['lec_id'] ." &course_id=".$data['c_id']."' name='." . $data['lec_id'] . ".'>Delete</a>
                </td>
                </tr>
              </table>";
        //echo "<a href='lecture.php?course_id=".$data['c_id']."'>"."<img src='{$data['thumbnail']}' height=200 width=300>".$data['c_name']. "</a>";

        //echo $data['c_name'];

    }
    /*if(!empty($result)){
        echo json_encode($result, JSON_PRETTY_PRINT);
    }*/
}
else{
    echo "<h1>No Lecture!!!</h1>";
}
?>