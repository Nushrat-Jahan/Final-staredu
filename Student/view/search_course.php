<html>

	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/enrollcourses.css"> 
		<style>
		 .button1 {
        background-color: #4CAF50;
        border: none;
        border-radius: 50px;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }
       a:hover{
      opacity: 0.7;
      }
  </style>
	</head>

<?php
	include '../controller/CourseController.php';
	$result = searchCourse($_GET["name"]);
	$course = getAllCourses();
	echo " 
	   	<table class='table table-striped'>
			<thead>
				<th>Course ID</th>
				<th>Course Name</th>
				<th>Enroll </th>
			</thead>
		<tbody>
	    ";
	    if($_GET["name"]=="")
	    {
	    	foreach($course as $b){
					echo "<tr>";
						echo "<td>".$b["course_id"]."</td>";
						echo "<td>".$b["course_name"]."</td>";
						echo "<td><a href='addtoenroll.php?cname='".$b["course_name"]."'><button class='button1'>Enroll Now</button></a></td>";
					echo "</tr>";
					}
	    }
	if(count($result)>0)
	{
		
		foreach($result as $b){
					echo "<tr>";
						echo "<td>".$b["course_id"]."</td>";
						echo "<td>".$b["course_name"]."</td>";
						echo "<td><a href='addtoenroll.php?cname='".$b["course_name"]."'><button class='button1'>Enroll Now</button></a></td>";
					echo "</tr>";
					
				}
	}
	 echo "</tbody></table>";
?>
