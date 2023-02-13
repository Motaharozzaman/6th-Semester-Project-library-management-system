<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>edit profile</title>
	<style type="text/css">
		.form-control{
			width: 300px;
			height: 38px;
		}
		form{
			padding-left: 525px;
		}
	</style>
</head>
<body style="background-color: #4B5D50;">
	<h2 style="text-align: center; color: #fff;">Edit Information</h2>
	<?php
		$sql="SELECT * FROM student WHERE username='$_SESSION[login_user]' ";
		$result= mysqli_query($db,$sql) or die(mysql_error());
		while ($row=mysqli_fetch_assoc($result)) {

			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
			$phone=$row['phone'];
			
		}
	?>
	<div class="profile_info" style="text-align:center;">
		<span  style=" color: #fff;"><h4>Welcome</h4></span>
		<h4 style="color:#fff"><?php echo $_SESSION['login_user'];?></h4>
		
	</div><br><br>
	<div>
	<form action="" method="post" enctype="multipart/form-data">
		<input class="form-control" type="file" name="file">
		<label><h4><b>First Name:</b></h4></label>
		<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">
		<label><h4><b>Last Name:</b></h4></label>
		<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">
		<label><h4><b>Username:</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">
		<label><h4><b>Email:</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
		<label><h4><b>Phone No:</b></h4></label>
		<input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>"><br>
		<div style="padding-left: 120px;"><button class="brn brn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
<?php
	if (isset($_POST['submit'])) {

		move_uploaded_file($_FILES['file']['tmp_name'], "images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$photo=$_FILES['file']['name'];


			$sql1="UPDATE student SET photo='$photo', first='$first', last='$last', username='$username', password='$password', email='$email', phone='$phone' WHERE username='".$_SESSION['login_user']."'; ";
			if (mysqli_query($db,$sql1)) {
			
					?>
						<script type="text/javascript">
							alert("Saved Successfully");
							window.location="profile.php"
						</script>
					<?php

			}
			

		
	}
?>


</body>
</html>