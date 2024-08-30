<?php
include('login_connection.php');

$dataview="SELECT * FROM users WHERE usertype!='admin'";

$result=mysqli_query($connect,$dataview);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Page</title>
	<style type="text/css">
		tr,td{
			text-align: left;
			padding: 6;
		}
		tr:nth-child(even){
			background-color: #f2f2f2f2;
		}

		.btn_update{
			width: 25px;
			height: 50px;
			background-color: yellow;
			text-decoration: none;
		}

		.btn_delete{
			width: 25px;
			height: 70px;
			background-color: red;
			text-decoration: none;
			color: white;
		}
	</style>
</head>
<body>
	<center>
		<a href="logout.php">Logout</a>
		<a href="register.php">Register</a>
	<div class="viewtable">
		<table style="border: 1px solid;width: 95%; border-collapse: collapse;
		border-spacing: 0;">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>UserType</th>
				<th>UserImage</th>
				<th>EditAction</th>
				<th>DeleteAction</th>
			</tr>
            
            <?php
             while($row=$result->fetch_assoc())
             {
            ?>
			<tr>
				<td><?php echo"{$row['name']}";?></td>
				<td><?php echo"{$row['email']}";?></td>
				<td><?php echo"{$row['usertype']}";?></td>
				<td> 
				 <img class="user_img" src="<?php echo"{$row['image']}";?>">
				 </td>
				<td>
					<?php
					echo "<a class='btn_update' href='user_update.php?update_id={$row['id']}'>Update</a>";
					?>
				</td>

				<td>
					<?php echo "<a class='btn_delete' href='user_delete.php?delete_id={$row['id']}'>Delete</a>";?>
				</td>
			</tr>	
			<?php
			}
			?>

		</table>
		
	</div>
	</center>

</body>
</html>