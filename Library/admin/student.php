<?php

include"connection.php";

include"navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student information</title>
	<style type="text/css">
		.search{
			padding-left: 1000px;
		}
	</style>
</head>
<body>

	<div class="search">
		<form class="navbar-from" method="post" name="from1">
			
				<input class="from-control" type="text" name="search" placeholder="search username..." required="">
				<button style="background-color:#1976D2 ;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			
			
		</form>
	</div>


	<h2>List of Students</h2>
	<?php

			if (isset($_POST['submit'])) {

				$q=mysqli_query($db,"SELECT first,last,username,department,roll,email,phone FROM `student` where username like '%$_POST[search]%' ");
				if (mysqli_num_rows($q)==0) {
					echo "Sorry! No student found with that username. Try searching again.";
					
				}

				else{

					echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color:#1976D2;'>";
				echo "<th>"; echo"First Name"; echo "</th>";
				echo "<th>"; echo "Last Name"; echo "</th>";
				echo "<th>"; echo " Username"; echo "</th>";
				echo "<th>"; echo "Department Name"; echo "</th>";
				echo "<th>"; echo "Roll No"; echo "</th>";
				echo "<th>"; echo "Email"; echo "</th>";
				echo "<th>"; echo "Phone No"; echo "</th>";
				echo "</tr>";
				while ($row=mysqli_fetch_assoc($q)) {
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['phone']; echo "</td>";
			
				echo "</tr>";
			}
				
			
	echo "</table>";

				}

				
			}

			else{

				$res=mysqli_query($db,"SELECT first,last,username,department,roll,email,phone FROM `student`;");

				echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color:#1976D2;'>";
				echo "<th>"; echo"First Name"; echo "</th>";
				echo "<th>"; echo "Last Name"; echo "</th>";
				echo "<th>"; echo "Username"; echo "</th>";
				echo "<th>"; echo "Department Name"; echo "</th>";
				echo "<th>"; echo "Roll No"; echo "</th>";
				echo "<th>"; echo "Email"; echo "</th>";
				echo "<th>"; echo "Phone No"; echo "</th>";
				echo "</tr>";
				while ($row=mysqli_fetch_assoc($res)) {
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['phone']; echo "</td>";

				echo "</tr>";
			}
			echo "</table>";

			}
	?>


</body>
</html>