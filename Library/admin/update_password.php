<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
	<style type="text/css">
		body{
			
			height: 700px;
			
			background-image: url("images/9.jpg");
			background-repeat: no-repeat;
		}
		.wrapper{
			width: 350px;
			height: 400px;
			margin: 120px auto;
			background-color: yellowgreen;
			opacity: .5;
			color: white;
			padding: 15px 15px;
		}
		.form-control{
			width: 225px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="text-align: center;">
			<h1 style="text-align: center; font-size: 35px; font-family: Lucide Console;">Change Your Password</h1>
		</div><br><br>
		<div style="padding-left: 50px;">
		<form action="" method="post">
			<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
			<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
			<input class="form-control" type="password" name="password" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" >Update</button>
			
		</form>
	</div>
		
	</div>
	<?php

		if (isset($_POST['submit'])) {
			if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';")){

				?>
				<script type="text/javascript">
					alert("The Password Updated Successfully.");
				</script>


				<?php

			}
		}
	?>

</body>
</html>