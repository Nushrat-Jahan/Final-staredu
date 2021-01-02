<?php include_once "../controller/valid_editprofile.php" ;?>
<html>
<head></head>
<body>
	<h1>Edit user</h1>
	<form action="" method="post" > 
		Fullname : <input type="text" name="edit_fullname" value="<?php echo $student["fullname"];?>"> <br>
		Username : <input type="text" name="edit_username" value="<?php echo $student["username"];?>"> <br>
		Email : <input type="text" name="edit_email" value="<?php echo $student["email"];?>"> <br>
		Gender : <input type="text" name="edit_gender" value="<?php echo $student["gender"];?>"> <br>
		<input type="submit" value="Change" name="change">
		<input type="submit" value="Go back" name="go_back">
	</form>
</body>
</html>