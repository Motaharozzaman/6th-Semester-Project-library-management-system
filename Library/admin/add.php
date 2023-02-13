<?php

include"connection.php";

include"navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.search{
			padding-left: 900px;
		}

		body {
      background-color: #BF6D54;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle{
	margin-left: 20px;
}
.h:hover{
	color: white;
	width: 300px;
	height: 50px;
	background-color: #1976D2;
}
.container{
  width: 400px;
  height: 600px;
  margin: 0 auto;
  text-align: center;
}
.form-control{
  background-color: #080707;
  color: white;
  height: 40px;
}

	</style>
</head>
<body>

	<!------------------sidenav----------->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="color:white; margin-left: 50px; font-size: 20px;">
  	<?php
  	if(isset($_SESSION['login_user'])){
  		echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['photo']." '>";
  		echo "</br></br>";
  		echo "  ".$_SESSION['login_user'];
  	}
  	?>
  </div>
<div class="h"><a href="add.php">Add Books</a></div>
  
  <div class="h"><a href="request.php">Books Request</a></div>
 <div class="h"><a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color:black;" onclick="openNav()">&#9776; open</span>
  <div class="container">
    <h2 style="color:black; font-family: Lucida Console; text-align: center;">Add New Books</h2><br><br>
    <form class="book" action="" method="post">
      <input class="form-control" type="text" name="bid" placeholder="Book id"><br>
      <input class="form-control" type="text" name="name" placeholder="Book Name"><br>
      <input class="form-control" type="text" name="authors" placeholder="Authors Name"><br>
      <input class="form-control" type="text" name="edition" placeholder="Edition"><br>
      <input class="form-control" type="text" name="status" placeholder="Status"><br>
      <input class="form-control" type="text" name="quantity" placeholder="Quantity"><br>
      <input class="form-control" type="text" name="department" placeholder="Department Name"><br>
      <button class="btb btn-default" type="submit" name="submit1">ADD</button>
      
    </form>
  </div>
  <?php

    if(isset($_POST['submit1'])){
      if (isset($_SESSION['login_user'])) {
        mysqli_query($db,"INSERT INTO books VALUES('$_POST[bid]', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]','$_POST[quantity]','$_POST[department]');");
        ?>
        <script type="text/javascript">
          alert("Book Added Successfully.");
        </script>

        <?php
      }
      else{
        ?>
        <script type="text/javascript">
          alert("You need to login first");
        </script>
        <?php
      }
    }
  ?>
</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#BF6D54";
}
</script>

</body>
</html>
   