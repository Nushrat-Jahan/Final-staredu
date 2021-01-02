<?php include_once "../controller/CourseController.php" ;
		$course = getAllCourses();
?>
<html>
	<head>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/enrollcourses.css"> 

	</head>
	<body>
		<form action="" method="post">
			<h1 align="center">Enroll Courses</h1>
			<input type="text" class="form-control" onfocus="liveSearch(this)" onkeyup="liveSearch(this)" placeholder="Search.....">
			<div id="searched"></div>
			<script>
				function liveSearch(textBox) {
            		var xhr = new XMLHttpRequest();
            		xhr.onreadystatechange = function() {
               		if (this.readyState == 4 && this.status == 200) {
                		  document.getElementById("searched").innerHTML = this.responseText;
               		}
            		}
            		xhr.open("GET", "search_course.php?name="+textBox.value, true);
            		xhr.send();
        		}
			</script>
		</form>
	</body>
</html>
