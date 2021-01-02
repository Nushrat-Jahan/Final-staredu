<?php include_once "../controller/addcourse_valid.php" ;?>
<html>
	<head></head>
	<body>
		<form action="" method="post">
			<table align="center">
					<tr align="center">
						<td>
							<span><img src="resources/img10.jpg" width=550px height=40px ></span>
						</td>
					</tr>
					<tr align="center">
						<td><img src="resources/headerlogo1.jpg" width=450px height=150px ></td>
					</tr>
					<tr align="center">
						<td>
							<span><img src="resources/img10.jpg" width=500px height=30px ></span>
						</td>
					</tr>
					<tr>
						<td><h1 align="center" style="color:green;">Add Course</h1></td>
					</tr>
				</table>
			<table align="center">
				<tr>
					<td>Course id:</td>
				</tr>	
				<tr>
					<td><input type="text" value="<?php echo $cid?>" name="cid"></td>
					<td><span style="color:red;">*<?php echo $err_cid;?></span></td>
				</tr>
				<tr>
					<td>Course name:</td>
				</tr>
				<tr>
					<td><input type="text" value="<?php echo $cname?>" name="cname"></td>
					<td><span style="color:red;">*<?php echo $err_cname;?></span></td>
				</tr>
				<tr>
					<td align="center">
						<input type="submit" name="add" value="add">
					</td>	
				</tr>
			</table>
		</form>
	</body>
</html>