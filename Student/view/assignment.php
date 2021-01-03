<h1>It is assignment page</h1>
<?php
	include_once "../controller/valid_studentprofile.php" ;
	if(isset($_POST["change"])){
		
		$fileType = strtolower(pathinfo(basename($_FILES["upfile"]["name"]),PATHINFO_EXTENSION));
		$target_file = "storage/upfile/" .$id.".$fileType";
		move_uploaded_file($_FILES["upfile"]["tmp_name"],$target_file);
		$query = "insert into assignment values('".$id."','".$target_file."')";
		$user = execute($query);
		
	}
?>
<form action="" method="post" enctype="multipart/form-data"> 
	Username : <input type="text" name="edit_username" value="<?php echo $student["username"];?>"> <br>
	Upload file: <input type="file" name="upfile">
	<input type="submit" value="Change" name="change">
</form>