<?php include_once "../controller/valid_studentprofile.php" ;?>
<html>
	<head>
		<title>Student</title>
		<link rel="stylesheet" type="text/css" href="css/files.css">
	</head>
<body>
	<fieldset>
		<div class="bg-image"></div>
		<div class="bg-text">
		<form>
			<?php
			echo "<h1>Welcome ".$student["username"]."</h1>";
			echo "<a href='studenthome.php?id=".$student["id"]."' class='button'>Home</a>";
			echo "<a href='downloadfile.php?id=".$student["id"]."' class='button'>Download file</a>";
			echo "<a href='assignment.php?id=".$student["id"]."' class='button'>Assignment</a>";
			echo "<a href='certificate.php?id=".$student["id"]."' class='button'>Certificate</a>";
			?>
		</form>
		</div>
	</fieldset>
</body>
</html>