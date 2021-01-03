<?php 

session_start();

require_once "../Model/dbconnect.php";

?>

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
				
				$query = "SELECT t_id,t_name,t_mail FROM teacher";
				$results = get($query);
				
				//$teach = simplexml_load_file("teacher.xml");
			?>
			<h1 align="center">List of Teachers</h1>
			<table border='1' align = "center">
				<tr>
					<td><h2>Unique ID</h2></td>
					<td><h2>Name</h2></td>
					<td><h2>Email</h2></td>
					<td><h2>Action</h2></td>
				</tr>
				<tr>
					<?php
						
						if(count($results)>0){
							foreach($results as $teacher){
								echo "<tr>";
									echo "<td>".$teacher["t_id"]."</td>";
									echo "<td>".$teacher["t_name"]."</td>";
									echo "<td>".$teacher["t_mail"]."</td>";
									echo "<td><a href='../Controller/teachercont.php?id=".$teacher["t_id"]."' class='button' style = 'background-color:gray;height:40px;width:177px'>Delete</a></td>";
								echo "</tr>";
							}
						}
						else{
							echo "<tr>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
								echo "<td>No Data Found</td>";
							echo "</tr>";
						}
						
						/*$count = 0;
						foreach ($teach as $i) {
                      	$count++;
                        echo "<tr>
                                <td align = >   $i->uniqueid   </td>
                                <td>   $i->name</td>
								<td>   $i->course</td>
								<td>   $i->university</td>
							</tr>";
						}*/
					?>
				</tr>
			</table>
		</form>
		<h4 align = "right"><a href = "adminhome.php">Go Back</a></h4>
	</body>
	
</html>