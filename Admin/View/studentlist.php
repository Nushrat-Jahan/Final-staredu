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
				
				$query = "SELECT id,fullname,email,gender,profession FROM student";
				$results = get($query);
				
				//$stu = simplexml_load_file("student.xml");
			?>
			<h1 align="center">List of Students</h1>
			<table border='1' align = "center">
				<tr>
					<td><h2>Unique ID</h2></td>
					<td><h2>Name</h2></td>
					<td><h2>Email</h2></td>
					<td><h2>Gender</h2></td>
					<td><h2>Profession</h2></td>
				</tr>
				<tr>
					<?php
						
						if(count($results)>0){
							foreach($results as $student){
								echo "<tr>";
									echo "<td>".$student["id"]."</td>";
									echo "<td>".$student["fullname"]."</td>";
									echo "<td>".$student["email"]."</td>";
									echo "<td>".$student["gender"]."</td>";
									echo "<td>".$student["profession"]."</td>";
								echo "</tr>";
							}
						}
						else{
							echo "<tr>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
							echo "</tr>";
						}
						
						/*$count = 0;
						foreach ($stu as $i) {
                      	$count++;
                        echo "<tr>
                                <td align = >   $i->uniqueid   </td>
                                <td>   $i->name</td>
								<td>   $i->coursecomp</td>
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