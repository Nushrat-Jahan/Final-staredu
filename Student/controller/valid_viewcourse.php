<?php 
		require_once '../model/db_connection.php';
		$c_id = $_GET["id"];
        $result = CourseData($c_id);
        $result = $result[0];
	if(isset($_POST["change"])){
		
		$crating="";
		$sreview="";
		
		if(empty($_POST["crating"])){
			$crating = $result["s_rating"];
		}
		else 
		{
			$crating = htmlspecialchars($_POST["crating"]);
		}
		if(empty($_POST["sreview"])){
			$sreview = $result["s_review"];	
		}
		else{
			$sreview = htmlspecialchars($_POST["sreview"]);
		}
	
		$query = "update student_course set s_rating='$crating', s_review='$sreview' where c_id=$c_id";
		execute($query);
		//echo "User state changed";
		//header ("Location: studentprofile.php?id=".$student["id"]."");
	}

	?>