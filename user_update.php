<?php
error_reporting(0);
include('login_connection.php');

if($_GET['update_id']){
	$user_info=$_GET['update_id'];
    $sql="SELECT *FROM users WHERE id='$user_info'";
    $result1=mysqli_query($connect,$sql);

    $update_info=$result1->fetch_assoc();

    if(isset($_POST['update_submit'])){
    	$upid=$_POST['id'];
    	$upname=$_POST['name'];
    	$upmail=$_POST['email'];
    	$upopts=$_POST['options'];

    	$file=$_FILES['uimage']['name'];
    	$destination="./images/".$file;
    	$destineDb="image/".$file;

    	move_uploaded_file($_FILES[ 'uimage']['tmp_name'], $destination);

      if($file){
      	$sql2="UPDATE users SET name='$upname',email='$upmail',usertype='$upopts',
      	image='$destineDb' WHERE id='$upid'";

      }else{
      	$sql2="UPDATE users SET name='$upname',email='$upmail',usertype='$upopts' WHERE id='$upid'";
      }

    	$result2=mysqli_query($connect,$sql2);

    	if($result2){
    		?>
    		<script type="text/javascript">
    			alert("data updated successful");
    			window.location="view.php";
    		</script>
    		<?php
    	}else{
    		echo "update failed";
    	}
    }  

}
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
		<form action="#" method="POST" enctype="maltipart/form-data">
		<div>
			<input type="text" name="id" value="<?php echo"{$update_info['id']}";?>" hidden>
		</div><br>
		<div>
			<label>Name</label>
			<input type="text" name="name" value="<?php echo"{$update_info['name']}";?>">
		</div><br>

		<div>
			<label>Email</label>
			<input type="text" name="email" value="<?php echo"{$update_info['email']}";?>">
		</div><br>
		<div>
			<label>UserType</label>
			<select name="options" style="width:50%; height: 35px;">
			<option>accountant</option>
			<option>secretary</option>
			<option>auditor</option>
			</select>
		</div><br>
		<div>
			<label>Photo</label>
			<input type="file" name="uimage">
		</div><br>

		<div>
			<button type="submit" name="update_submit">submit</button>
		</div>
		</form>
		
	</div>
	</center>

</body>
</html> 