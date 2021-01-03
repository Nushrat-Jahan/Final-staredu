
<?php include_once "../Controller/validation.php" ;
?>

<html>
	
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	
	
	<body>
		<h1>&nbsp; &nbsp;Staredu</h1>
		<h5>&nbsp; &nbsp; &nbsp; &nbsp;Upskill your dream today</h5>
		
		<form action="" onsubmit="return validate()" method = "post" autocomplete = "off">
			<table align = "center">
				<tr><h1 align = "center">Please Login</h1></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td><h2>Username</h2></td>
					<td></td>
				</tr>
				<tr>
					<td><input type = "text" value="<?php echo $uname ?>" name="uname" placeholder = "Enter Username" style = "height:40px">
					<span id="err_uname"></span>
					</td>
					<td><span><?php echo $err_uname;?></span></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td><h2>Password</h2></td>
					<td></td>
				</tr>
				<tr>
					<td><input type = "password" value="<?php echo $pass ?>" name="pass" placeholder = "Enter Password" style = "height:40px">
					<span id="err_pass"></span>
					</td>
					<td><span><?php echo $err_pass;?></span></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td align = "center"><input type = "submit" name = "login" value = "Login" style = "background-color:gray;height:40px;width:177px"></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td><a href = "forgot pass.html">Forgot Password?</a></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td><a href = "reg.php">Not Registered?</a></td>
				</tr>
			</table>
		</form>
		
		<script src="JS/log_val.js"></script>
		
	</body>
</html>