<?php include_once "../controller/CourseController.php" ;
	  include_once "../controller/valid_viewcourse.php";
		$c_id = $_GET["id"];
        $result = CourseData($c_id);
        $result = $result[0];
		?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/studentprofile.css">
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data"> 
	
		<div class="card" >
			<h1><?php echo $result["c_name"];?>'s Info</h1>
			<p class="title">Course id : <?php echo $result["c_id"];?></p>
			<p class="title">Course name : <?php echo $result["c_name"];?></p>
			<p class="title">Course state : <?php echo $result["c_state"];?></p>
			<p class="title">Course result: <?php echo $result["result"];?></p>
			<p class="title">Course rating : <input type="text" value="<?php echo $result["s_rating"]?>" name="crating" ></p>
			<p class="title">Course review : <input type="text" value="<?php echo $result["s_review"]?>" name="sreview" ></p>
			<p><?php echo "<a href='enrolled.php?id=".$result["s_id"]."' class='button'>Go back</a>";?></p>
			<?php echo '<input type="submit" name="change" value="Change" class="button">';?>
			</div>
			
</form>
</body>
</html>