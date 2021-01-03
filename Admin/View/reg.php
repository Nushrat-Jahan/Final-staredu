<?php include_once "../Controller/reg_val.php" ;
?>

<html>
	
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	
	<body>
		
		<h1>&nbsp; &nbsp;Staredu</h1>
		<h5>&nbsp; &nbsp; &nbsp; &nbsp;Upskill your dream today</h5>
		
		<form action="" onsubmit="return validate()" method = "post" autocomplete = "off">
			
			<table align = "center">
			
				<tr><h1 align = "center">Registration</h1></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td>Name:</td>
					<td><input type="text" value="<?php echo $fname?>" name="fname" style = "height:40px">
					<span id="err_fname"></span>
					</td>
					<td><span style="color:red;">*<?php echo $err_fname;?></span>
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" value="<?php echo $uname?>" name="uname" style = "height:40px">
					<span id="err_uname"></span>
					</td>
					<td><span style="color:red;">*<?php echo $err_uname;?></span>
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" value="<?php echo $pass?>" name="pass" style = "height:40px">
					<span id="err_pass"></span>
					</td>
					<td><span style="color:red;">*<?php echo $err_pass;?></span>
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" value="<?php echo $email?>" name="email" style = "height:40px">
					<span id="err_email"></span>
					</td>
					<td><span style="color:red;">*<?php echo $err_email;?></span>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="submit" name="register" value="Register" style = "background-color:gray;height:40px;width:177px">
					</td>
				</tr>
			
			</table>
			
		</form>
		
		<h4 align = "right"><a href = "login.php">Go Back</a></h4>
		
		<script src = "../JS/reg_val.js"></script>
		
	</body>
	
</html>