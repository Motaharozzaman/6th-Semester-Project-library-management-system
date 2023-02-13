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
    	section{
    		margin-top: -20px;    	}
    </style>
      
</head>
<body>
	
		<section>
			<div class="reg_img">
				<br>			
				<div class="box2">
					<h1  style="text-align: center; font-size: 30px; font-family: lucide Console; color: blue;">Araw Library Managemant System </h1>
					<h1 style="text-align: center; font-size:20px; color: blue;">User Registration From</h1>
					<form name="registration" action="" method="post">
						
						<div class="login">

							<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
							<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
						<input class="form-control" type="text" name="username" placeholder="Username" required="" style="color: blue;"><br>
						<input class="form-control" type="password" name="password" placeholder="Password" required="" style="color:blue;"><br>
						<input class="form-control" type="text" name="department" placeholder="Department Name" required=""><br>
						<input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
						<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
						<input class="form-control" type="text" name="phone" placeholder="Phone No" required=""><br>
						
          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> 
						
					</div>
						
					</form>
					
				</div>

						
					</div>
		
		 </section>

	<?php
	if (isset($_POST['submit'])) {

		$count=0;
		$sql="SELECT username from `student`";
		$res=mysqli_query($db,$sql);
		while ($row=mysqli_fetch_assoc($res)){

			if($row['username']==$_POST['username']){
				$count=$count+1;
			}
		} 
		if($count==0)

		{mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[department]', '$_POST[roll]', '$_POST[email]', '$_POST[phone]', '8.png');");
		?>

	<script type="text/javascript">
		alert("Registration successful");
	</script>	
		<?php
	}

	else{

	}

			}
					?>

	<script type="text/javascript">
		alert("This username already exist.");
	</script>	
		<?php
		{

		}

	?>

					
</body>
</html>