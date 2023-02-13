<?php
	include"connection.php";
	include"navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>profile</title>
	<style type="text/css">
		.wrapper{
			width: 375px;
			height: 600px;
			margin: 0 auto;
			color: white;
		}
	</style>
</head>
<body style="background-color: #4B5D50;">
	<div>
		<form action="" method="post">
			<button class="btn btn-default" style="float: right; width: 80px;" name="submit1" type="submit">Edit</button>
			
		</form>
		<div class="wrapper">
			<?php

			if (isset($_POST['submit1'])) {
				?>
				<script type="text/javascript">
					window.location="edit.php"
				</script>
				<?php
			}

			$q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]'; ");

			?>
			<h2 style="text-align: center;"> My Profile</h2>
			<?php
				$row=mysqli_fetch_assoc($q);

				echo "<div style='text-align:center'>
				<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['photo']."'>
				 </div>";

			?>
			<div style="text-align:center;"><b>Welcome</b>
				<h4>
					<?php
						echo $_SESSION['login_user'];
					?>
				</h4>

			</div>
			<?php
			echo "<b>";
				echo "<table class='table table-bordered'>";

				echo "<tr>";
						echo "<td>";
							echo "<b>First Name: </b>";
						echo "</td>";

						echo "<td>";
								echo $row['first'];
						echo "</td>";
				echo "</tr>";

				echo "<tr>";
						echo "<td>";
							echo "<b>Last Name: </b>";
						echo "</td>";

						echo "<td>";
								echo $row['last'];
						echo "</td>";
				echo "</tr>";

				echo "<tr>";
					echo "<td>";
							echo "<b>User Name: </b>";
						echo "</td>";

						echo "<td>";
								echo $row['username'];
						echo "</td>";
				echo "</tr>";

				echo "<tr>";
						echo "<td>";
							echo "<b>Password: </b>";
						echo "</td>";

						echo "<td>";
								echo $row['password'];
						echo "</td>";
				echo "</tr>";

			
				echo "<tr>";
						echo "<td>";
							echo "<b>Email: </b>";
						echo "</td>";

						echo "<td>";
								echo $row['email'];
						echo "</td>";
				echo "</tr>";

				echo "<tr>";
						echo "<td>";
							echo "<b>Phone No: </b>";
						echo "</td>";

						echo "<td>";
								echo $row['phone'];
						echo "</td>";
				echo "</tr>";

				echo "</table>";
			echo "</b>";
			?>
		</div>
	</div>

</body>
</html>