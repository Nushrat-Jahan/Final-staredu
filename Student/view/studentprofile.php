<?php include_once "../controller/valid_studentprofile.php" ;?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/studentprofile.css">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data"> 
	
		<div class="card" >
			<h1><?php echo $student["fullname"];?>'s Profile</h1>
			<p class="title">Full name : <?php echo $student["fullname"];?></p>
			<p class="title">User name : <?php echo $student["username"];?></p>
			<p class="title">Email : <?php echo $student["email"];?></p>
			<p class="title">Gender : <?php echo $student["gender"];?></p>
			<p class="title">Profession : <?php echo $student["profession"];?></p>
			<p><?php echo "<a href='studenthome.php?id=".$student["id"]."' class='button'>Go back</a>";?></p>
			<?php echo "<a href='editprofile.php?id=".$student["id"]."' class='button'>Edit Profile</a>";?>
			</div>
			
</form>
			
		
	
</body>
</html>