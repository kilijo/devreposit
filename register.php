<?php
  error_reporting(0);
  session_start();
  session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
     <center>
	<div class="container">
		<form action="register_check.php" method="POST">
		
		<div>
			<label>Name</label>
			<input type="text" name="name">
			<span style="color: red;"><?php echo $_SESSION['nameSms']?></span>
		</div><br>

		<div>
			<label>Email</label>
			<input type="text" name="email">
			<span style="color: red;"><?php echo $_SESSION['emailSms']?></span>
		</div><br>
		<div>
			<label>UserType</label>
			<select name="options" style="width:50%; height: 35px;">
			<option>accountant</option>
			<option>secretary</option>
			<option>auditor</option>
			<option>admin</option>
			</select>
		</div><br>

		<div>
			<label>Password</label>
			<input type="text" name="password">
			<span style="color: red;"><?php echo $_SESSION['passwordSms']?></span>
		</div><br>

		<div>
			<button type="submit" name="btnsubmit">Register</button>
		</div>
		</form>
		
	</div>
	</center>

</body>
</html> 