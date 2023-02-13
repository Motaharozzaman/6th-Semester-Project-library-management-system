<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Libraray Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		nav{
    float: right;
    word-spacing: 30px;
    padding:15px;
}
nav li{
    display: inline-block;
    line-height: 65px;
}
	</style>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<img src="images/2.png">
				<h1 style="">Araw Library Managemant System </h1>
			</div>
			<?php
				if(isset($_SESSION['login_user']))
					{ 
						?>
							<nav>
							<ul>
							<li><a href="home.php">HOME</a></li>
							<li><a href="books.php">BOOKS</a></li>
							<li><a href="logout.php">LOGOUT</a></li>
							<li><a href="feedback.php">FEEDBACK</a></li>
							</ul>
						</nav>

					<?php


				}
				else{
					?>
					<nav>
						<ul>
							<li><a href="home.php">HOME</a></li>
							<li><a href="books.php">BOOKS</a></li>
							<li><a href="admin_login.php">LOGIN</a></li>
							<li><a href="feedback.php"> FEEDBACK</a></li>
						</ul>
					</nav>
					<?php

				}
			?>
			
					</header>
		<section>
			<div class="sec_img">
			<br><br><br><br>
			<div class="box">
				<br><br><br>
				<h1 style="text-align: center; font-size: 35px;">WELCOME TO LIBRARY</h1><br><br>
				<h1 style="text-align: center; font-size:25px"> Opens at: 09:00</h1><br>
				<h1 style="text-align:center; font-size:25px">Closes at: 14:00</h1><br>
				
			</div>
		</div>
		</section>
		
		</div>
		<?php
		include"footer.php";

		?>
</body>
</html>