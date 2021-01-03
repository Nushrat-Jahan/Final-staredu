<?php include_once "../controller/CourseController.php" ;
	$student = $_COOKIE["username"];
    $id = getStudentId($student);
    $id = $id[0]["id"];
    $result = InProgress($id);
?>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="css/inprogress.css"> 
	</head>
	<body>
		<form action="" method="post">
				<h1 align="center">Courses in progress</h1>
			<table align="center" border='1'>
				<tr>
					<td><h2>Course Id</h2></td>
					<td><h2>Course Name</h2></td>
					<td><h2>Course State</h2></td>
					<td><h2>Delete course</h2></td>
				</tr>
				<?php  
					if(count($result)>0)
					{	foreach($result as $b){
							echo "<tr>";
							echo "<td>".$b["c_id"]."</td>";
							echo "<td>".$b["c_name"]."</td>";
							echo "<td>".$b["c_state"]."</td>";
							echo "<td><a href='deleteincourse.php?cname=".$b["c_name"]."'><img src='resources/drop.png' width=30px height=30px></a></td>";
							echo "</tr>";
					}}
					?>
			</table>
		</form>
	</body>
</html>