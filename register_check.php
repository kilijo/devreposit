<?php
include('login_connection.php');
error_reporting(0);
session_start();

if (isset($_POST['btnsubmit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$type=$_POST['options'];
	$pass= password_hash($_POST['password'], PASSWORD_DEFAULT);

	if(empty($name))
	{
		$smsname="name is required";
		$_SESSION['nameSms']=$smsname;
	}elseif(!preg_match("/[a-zA-Z ]+$/",$name))
	{
      $smsname="user name must contain text and space only";
	  $_SESSION['nameSms']=$smsname;
	  header("location:register.php");
	}elseif(empty($email))
	{
		$smsemail="email is required";
		$_SESSION['emailSms']=$smsemail;
		header("location:register.php");
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$smsemail="invald email format";
		$_SESSION['emailSms']=$smsemail;
		header("location:register.php");
	}elseif(empty($pass))
	{
		$smspass="password is required";
		$_SESSION['passwordSms']=$smspass;
		header("location:register.php");
	}elseif(strlen($pass)<4)
	{
		$smspass="password must be greater than four characters";
		$_SESSION['passwordSms']=$smspass;
		header("location:register.php");
	}elseif(!preg_match("#[0-9]+#",$pass))
	{
		$smspass="password must contain atleast one number";
		$_SESSION['passwordSms']=$smspass;
		header("location:register.php");

	}elseif(!preg_match("#[a-z]+#",$pass))
	{
		$smspass="password must contain atleast one small leter";
		$_SESSION['passwordSms']=$smspass;
		header("location:register.php");

	}elseif(!preg_match("#[A-Z]+#",$pass))
	{
		$smspass="password must contain atleast one capital leter";
		$_SESSION['passwordSms']=$smspass;
		header("location:register.php");
	}else{

	$data="INSERT INTO users(name,email,usertype,password)
	VALUES('$name','$email','$type','$pass')";

	$response=mysqli_query($connect,$data);
	//header("Location:view.php");

	if($response){
 	// header("Location:view.php");
	 	?>
	 	<script type="text/javascript">
	 		alert("sent successful");
	 		window.location="view.php";
	 	</script>
	 	<?php
	 }else{
	 	echo "registion fail";
	 }
	}
}
?>