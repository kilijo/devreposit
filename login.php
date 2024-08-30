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
	<link rel="stylesheet" type="text/css" href="ligin.css">
</head>
<body>
	<form action="login_check.php" method="POST">
     <center>
	<div class="container">
		<div>
			<label>UserName</label>
			<input type="text" name="username">
			<span style="color: red;"><?php echo $_SESSION['unameSms'] ?></span>
		</div><br>
		<div>
			<label>Password</label>
			<input type="text" name="password">
			<span style="color: red;"><?php echo $_SESSION['upassSms'] ?></span>
		</div><br>
		<div>
			<button type="submit" name="btnsubmit">Login</button>
		</div>
		
	</div>
	</center>
	</form>

</body>
</html> 