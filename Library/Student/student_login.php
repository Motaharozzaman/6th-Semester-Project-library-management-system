<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Libraray Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      <style type="text/css">
    section
    {
      margin-top: -20px;
     

    }

  </style> 
</head>
<body>
	
		<section>
			<div class="student_login">
				<br><br>
				
				<div class="box1">
					<h1 style="text-align: center; font-size: 35px; font-family: lucide Console; color: blue;">Araw Library Managemant System </h1><br>
					<h1 style="text-align: center; font-size:25px; color: blue;">User Login From</h1>
					<form name="login" action="" method="post">
						<br>
						<div class="login">
						<input class="form-control" type="text" name="username" placeholder="Username" required="" style="color: blue;"><br>
						<input class="form-control" type="password" name="password" placeholder="Password" required="" style="color:blue;"><br>
						 <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
						
					</div>
						
					</form>
					<p>
						<br><br>
						<a style="color:blue; text-decoration: none;" href="update_password.php"><b>Forgot password?</b></a> &nbsp &nbsp &nbsp &nbsp
						 <b>Create New Account?</b><a style="color:blue; text-decoration:none;" href="registration.php"><b>Sign Up<b></a>
					</p>
					
				</div>

						
					</div>
		
		</section>
		<?php

			if (isset($_POST['submit'])) {
				$count=0;
				$res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
				$row=mysqli_fetch_assoc($res);

				$count=mysqli_num_rows($res);

				if ($count==0) {
					?>
					
					<div class="alert alert-danger" style="width:500px; margin-left:400px; background-clip: red;">
						<strong>The username and password doen't match.</strong>
					</div>

					<?php
				}
				else{
					$_SESSION['login_user'] = $_POST['username'];
					$_SESSION['photo']=$row['photo'];
					?>
					<script type="text/javascript">
						window.location="home.php";
					</script>

					<?php
				}
				
			}

		?>
	
		
</body>
</html>