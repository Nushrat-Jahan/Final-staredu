<?php require_once "../Model/dbconnect.php";?>

<html>
	
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	
	<head>
		<style>
			table, td, th {  
  			border: 1px solid #ddd;
  			text-align: center;
			}

			table {
  			border-collapse: collapse;
  			width: 100%;
			}

			th, td, h1{
  			padding: 15px;

			}
		</style>
	</head>
	
	<body>
		
		<h1>&nbsp; &nbsp;Staredu</h1>
		<h5>&nbsp; &nbsp; &nbsp; &nbsp;Upskill your dream today</h5>
		
		<form action="" method="post">
			
			<?php 
				
				$query = "SELECT * FROM course";
				$results = get($query);
				
				//$course = simplexml_load_file("course.xml");
			?>
			<h1 align="center">List of Courses</h1>
			<table border='1' align = "center">
				<tr>
					<td><h2>Unique ID</h2></td>
					<td><h2>Name</h2></td>
				</tr>
				<tr>
					<?php
						
						if(count($results)>0){
							foreach($results as $course){
								echo "<tr>";
									echo "<td>".$course["course_id"]."</td>";
									echo "<td>".$course["course_name"]."</td>";
								echo "</tr>";
							}
						}
						else{
							echo "<tr>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
							echo "</tr>";
						}
						
						/*$count = 0;
						foreach ($course as $i) {
                      	$count++;
                        echo "<tr>
                                <td align = >   $i->uniqueid   </td>
                                <td>   $i->name</td>
								<td>   $i->numteach</td>
								<td>   $i->valid</td>
							</tr>";
						}*/
					?>
				</tr>
			</table>
		</form>
		<h4 align = "right"><a href = "adminhome.php">Go Back</a></h4>
	</body>
	
</html>