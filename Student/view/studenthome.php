<html>
	<head>
		<title>Student</title>
		<link rel="stylesheet" type="text/css" href="css/studenthome.css">
	</head>
<body>
	<fieldset>
		<div class="bg-image"></div>
		<div class="bg-text">
		<form action="" method="post">
			<?php include_once "../controller/valid_login.php"; 
				$un = $_GET['u'];
				//$query = "SELECT * FROM student ";
				$student = getStudent($un);
				if(count($student)>0){
					foreach($student as $user){
						echo "<h1>Welcome ".$user["username"]."</h1>";
						echo "<a href='studenthome.php?id=".$user["id"]."' class='button'>Home</a>";
						echo "<a href='studentprofile.php?id=".$user["id"]."' class='button'>Profile</a>";
						echo "<a href='enrollcourses.php?id=".$user["id"]."' class='button'>Enroll Courses</a>";
						echo "<a href='enrolled.php?id=".$user["id"]."' class='button'>Enrolled Courses</a>";
						echo "<a href='completed.php?id=".$user["id"]."' class='button'>Completed</a>";
						echo "<a href='inprogress.php?id=".$user["id"]."' class='button'>In Progress</a>";
						echo "<a href='library.php?id=".$user["id"]."' class='button'>Library</a>";
						echo "<a href='files.php?id=".$user["id"]."' class='button'>Files</a>";
				}}
			?>
		</form>			
		</div>
	</fieldset>
</body>
</html>