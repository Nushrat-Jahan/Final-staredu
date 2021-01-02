<?php include_once "../controller/CourseController.php" ;
	  $result = EnrolledCourse($_GET["id"]);
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="css/enrollcourses.css"> 
	</head>
	<body>
		<form action="" method="post">
				<h1 align="center">Your Enrolled Courses</h1>
			<table align="center" border='1'>
				<tr>
					<td><h2>Course Id</h2></td>
					<td><h2>Course Name</h2></td>
					<td><h2>Course State</h2></td>
				</tr>
				<?php  
					if(count($result)>0)
					{	foreach($result as $b){
							echo "<tr>";
							echo "<td>".$b["c_id"]."</td>";
							echo "<td>".$b["c_name"]."</td>";
							echo "<td>".$b["c_state"]."</td>";
							echo "</tr>";
					}}
					?>
			</table>
		</form>
	</body>
</html>