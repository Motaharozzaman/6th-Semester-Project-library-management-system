<?php
	include"connection.php";
	include"navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>book request</title>

		<meta name="viewport" content="width=device-width initial-scale=1">
	<style type="text/css">
		.search{
			padding-left: 500px;
    padding-top: 10px;
		}
		.form-control{
			width: 200px;
			height: 35px;
			background-color:black ;
			color:white ;
		}

		body {
			background-image: url("images/5.jpg");
			background-repeat: no-repeat;
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
	color: green;
	width: 300px;
	height: 50px;
	background-color: #1976D2;
}
.container{
	width: 800px;
	height: 700px;
	background-color: green;
	color: white;
	opacity: .5;
  margin-top:60px
}
.scroll{

  width: 100%;
  height: 100px;
  overflow: auto;
}
th,td{
  width: 10%;
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
  
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Books Request</a></div>
 <div class="h"><a href="issue_info.php">Issue Information</a></div>
<div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<div class="container">

  <?php
  if (isset($_SESSION['login_user'])) {
    ?>
    <div style="float: left; padding: 25px;">
<form method="post" action="" name="form">
      <button name="submit2" type="submit" class="btn btn-default" style="background-color: green;">RETURNED</button>&nbsp &nbsp
  <button name="submit3" type="submit" class="btn btn-default" style="background-color:red;">EXPIERD</button>
</form>
</div>
      <div class="search">
    

    <form method="post" action="" name="form1">
      <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
      <input class="form-control" type="text" name="bid" placeholder="Book id" required=""><br>
      <button class="btn btn-default" name="submit" type="submit">Submit</button>
      
    </form>
    
  </div>


    <?php
    if (isset($_POST['submit'])) {

     $res=mysqli_query($db," SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]'; ");

      while($row=mysqli_fetch_assoc($res)){
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day=floor($diff/(60*60*24)); 
          $fine=$day*.10;
        } 

      }


      $x=date("Y-m-d");
    mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '','not paid'); ");



        $var1='<p style="color:yellow; background-color:green;">Returned</P>';
         mysqli_query($db, "UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");
      
    }
  }

  ?>
  <h2 style="text-align: center;">Expired list</h2>
  <?php
  $c=0;
  if (isset($_SESSION['login_user'])) {
    
     $ret='<p style="color:yellow; background-color:green;">Returned</P>';
      $exp='<p style="color:yellow; background-color:red;">EXPIRED</P>';

    if (isset($_POST['submit2'])) {
       $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='$ret' ";

           $res=mysqli_query($db,$sql);
       
          }

          else if(isset($_POST['submit3'])) {

             $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='$exp' ";
              $res=mysqli_query($db,$sql);

                      }

           else{

             $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve!='' and issue_book.approve!='YES' ";
              $res=mysqli_query($db,$sql);

           }           


    echo "<table class='table table-bordered table-hover' style='width=90%;'>";
        echo "<tr style='background-color:#1976D2;'>";
        echo "<th>"; echo"Username"; echo "</th>";
        echo "<th>"; echo "Roll No"; echo "</th>";
        echo "<th>"; echo "Book Id"; echo "</th>";
        echo "<th>"; echo "Book Name"; echo "</th>";
        echo "<th>"; echo"Authors Name"; echo "</th>";
        echo "<th>"; echo"Edition"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Issue Date"; echo"</th>";
        echo "<th>"; echo "Return Date"; echo "</th>";
        echo "</tr>";
      echo "</table>";


      echo "<div class='scroll'>";
      echo "<table class='table table-bordered'>";
      
  
        while ($row=mysqli_fetch_assoc($res)) {
          
          
        echo "<tr>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors'];echo "</td>"; 
        echo "<td>"; echo $row['edition']; echo"</td>";
        echo "<td>"; echo $row['approve'];echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>"; 
        echo "<td>"; echo $row['return']; echo "</td>"; 
        echo "</tr>";
      }
        
      
  echo "</table>";
  echo "</div>";
  


  }
  else{
    ?>
    <h3>Login to see information of Borrowed</h3>
    <?php
  }
  ?>
</div>
</body>
</html>