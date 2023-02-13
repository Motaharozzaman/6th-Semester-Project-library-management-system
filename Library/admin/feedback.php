<?php
include"connection.php";
include"navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
    	
    	body{

    		background-image: url("images/7.jpg");
    	}
    	
    .wrapper {
    	padding: 10px;
    	margin: 20px auto;
    	width: 600px;
    	height: 700px;
    	background-color: black;
    	opacity: .5;
    	color: white;
    }
    .form-control{
    	height: 200px;
    	width: 60%;
    }
    .scroll{
    	width: 100%;
    	height: 300px;
    	overflow: auto;
    }

    </style>
</head>
<body>

	<div class="wrapper">
		<h4>If you have any suggesions or questions please comment below.</h4>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write something..."><br><br>
			<input class="btn btn-default" type="submit" name="submit" value="comment" style="width:100px; height: 35px;"><br><br>
			
		</form><br>
	
	<div class="scroll">

		<?php 

		if (isset($_POST['submit'])) {
			$sql="INSERT INTO `comments` VALUES('', 'Admin','$_POST[comment]');";
			if(mysqli_query($db,$sql)){

				$q="SELECT * FROM `comments` ORDER BY `comment`  DESC";
				$res=mysqli_query($db,$q);
				echo "<table class='table table-bordered'>";
				while ($row=mysqli_fetch_assoc($res)) {
					echo "<tr>"; 
					echo "<td>"; echo $row['username']; echo "</td>";
					echo "<td>"; echo $row['comment']; echo "</td>";
					echo "</tr>";
					
				}
			}
			
		}
		else{

			$q="SELECT * FROM `comments` ORDER BY `comment`  DESC";
				$res=mysqli_query($db,$q);
				echo "<table class='table table-bordered'>";
				while ($row=mysqli_fetch_assoc($res)) {
					echo "<tr>"; 
					echo "<td>"; echo $row['username']; echo "</td>";
					echo "<td>"; echo $row['comment']; echo "</td>";
					echo "</tr>";
					
				}
		}

		 ?>
		


	</div>
</div>
</body>

</html>
