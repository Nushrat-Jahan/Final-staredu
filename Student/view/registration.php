<?php include_once "../controller/valid_registration.php" ;?>
<html>
	<head>
		<title>Registration</title>
	</head>
	<body>
		<div align="center">
		<form action="" method="post" style="width: 700px;" align="center">
			<fieldset style="background-color: lightgray;" >
				<table align="center">
					<h1 align="center">Welcome to Registration</h1>
						<tr><td><p style="color:green;">* Fields are required</p></td></tr>
					<tr>
						<td>Full name:</td>
						<td><input type="text" id="fname" value="<?php echo $fname?>" name="fname" onfocusout="checkUser(this)" ><span id="err_fname"></span></td>
						<td><span style="color:red;">*<?php echo $err_fname;?></span></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" id="uname" onfocusout="check_username(this)" value="<?php echo $uname?>" name="uname"><span id="err_uname"></span></td>
						<td><span style="color:red;" id = "err_username">*<?php echo $err_uname;?></span></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" id="pass" value="<?php echo $pass?>" name="pass"><span id="err_pass"></span></td>
						<td><span style="color:red;">*<?php echo $err_pass;?></span></td>
					</tr>
					<tr>
						<td>Confirm password:</td>
						<td><input type="password" id="cpass" value="<?php echo $cpass?>" name="cpass"><span id="err_cpass"></span></td>
						<td><span style="color:red;">*<?php echo $err_cpass;?></span></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" id="email" value="<?php echo $email?>" name="email"><span id="err_email"></span></td>
						<td><span style="color:red;">*<?php echo $err_email;?></span></td>
					</tr>
					<tr>
						<td>Country</td>
						<td>
							<select name="country">
								<option disabled selected>Select a Country</option>
								<option>Bangladesh</option>
								<option>India</option>
								<option>South Korea</option>		
								<option>Chaina</option>
								<option>Canada</option>
								<option>Malaysia</option>	
								<option>United States</option>
								<option>Indonesia</option>
								<option>France</option>	
								<option>Japan</option>
								<option>Srilanka</option>
								<option>Australia</option>
								<option>New Zealand</option>
								<option>Thailand</option>
								<option>Turkey</option>								
							</select>
						</td>
						<td>
							<span style="color:red;">*<?php echo "$err_country"; ?></span>
						</td>		
					</tr>
					<tr>
						<td>Gender: </td>
						<td>
							<input type="radio" name="gender" value="Male"> Male
							<input type="radio" name="gender" value="Female"> Female
							<input type="radio" name="gender" value="Custom"> Custom
							<td><span style="color:red;">*<?php echo $err_gender;?></span></td>
						</td>
					</tr>
					<tr>
						<td>
							Birth Date:
						</td>
						<td>
							<select name = "day">
								<option disabled="disabled" selected="selected"> Day </option>
								<?php
                                   for($i = 1; $i <= 31; $i++) {
                                   	 echo "<option>" . "$i" . "</option>";
                                   }
								?>
							</select>
							<select name="month">
								<option disabled="disabled" selected="selected"> Month </option>
								<?php
								$month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "Octobor", "November", "December");
                                   for($i = 0; $i < 12; $i++) {
                                   	 echo "<option> $month[$i] </option>";
                                   }
								?>
							</select>
							<select name="year">
								<option disabled="disabled" selected="selected"> Year </option>
								<?php
								  for ($i = 0; $i < 30; $i++) {
								  	echo "<option>" . (1980+$i) . "</option>";
								  }
 								?>
							</select>
						</td>
						<td>
							<span style="color:red;">*<?php echo "$bdy"; ?></span>
						</td>
					</tr>
					<tr>
						<td>Profession:</td>
						<td>
							<select name="profession" value="<?php echo $profession?>">
								<option disabled selected>Choose a profession</option>
								<option >Teacher</option>
								<option >Student</option>						
							</select>
						</td>
						<td>
							<span style="color:red;">*<?php echo "$err_profession"; ?></span>
						</td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<td><input type="checkbox" name="condition">I accept all the terms and conditions</td>
						<td><span style="color:red;">*<?php echo "$condition"; ?></span></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="register" value="register">
						</td>
					</tr>
					
				</table>
			</fieldset>
		</form>
		</div>
		<script src="js/valid_reg.js"></script>
		<script>
			function checkUser(username){
				var xhr = new XMLHttpRequest;
				xhr.onreadystatechange=function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById("err_username").innerHTML = this.resposeText;
					}
				};
				xhr.open("GET","check_username.php?u"+username.value,true);
				xhr.send();
			}
		</script>
	</body>
</html>
