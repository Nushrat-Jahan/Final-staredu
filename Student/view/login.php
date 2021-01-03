<?php include_once "../controller/valid_login.php" ;?>
<html>
	<head>
		<title>
			Login
		</title>
	    <link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		
			<form action="" method="post"  onsubmit="return validate()">
			<div align="center">
				<h1 align="center">Get Started</h1>
				<table>
					<tr></tr>
					<tr>
						<td style="color:white;"><h2>Username</h2></td>
					</tr>
					<tr>
						<td><input type="text" value="<?php echo $uname?>" name="uname" id="uname" placeholder="Enter Username">
						<span id="err_uname"></span></td>
						<td><span style="color:red;">*<?php echo $err_uname;?></span>
						</td>
					</tr>
					<tr>
						<td style="color:white;"><h2>Password</h2></td>
					<tr>
					</tr>
						<td><input type="password" value="<?php echo $pass?>" name="pass" id="pass" placeholder="Enter Password">
						<span id="err_pass"></span></td>
						<td><span style="color:red;">*<?php echo $err_pass;?></span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="login" value="Login">
						</td>
					</tr>
					<tr>
    				<td>
    					<a href="registration.php">Not registered yet?</a>
    				</td>
    			</tr>
				</table>
			</div>
			</form>
		<script src="js/valid_login.js"></script>
	</body>
</html>
