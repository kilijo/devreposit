<?php
include("login_connection.php");

if($_GET['delete_id']){
	$udel=$_GET['delete_id'];

	$sql3="DELETE FROM users WHERE id='$udel'";

	$result3=mysqli_query($connect,$sql3);

	if($result3){
		?>
		<script type="text/javascript">
			alert("data deleted successful");
			window.location='view.php';
		</script>
		<?php
	}else{
		echo "data deletion failed";
	}
}
?>