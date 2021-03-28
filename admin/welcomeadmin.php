<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
		<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
<?php
session_start();
if(isset($_SESSION['admin']))
{
?>
	<div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="../pic/adminhome.jpg">
        <div class="caption center-align">
          <h1>Welcome Admin!!</h1>
          <h5 class="light grey-text text-lighten-3">Have a Good Day!</h5>
           <h3><a href="orders.php"><font color="black"> View Orders</font></a></h3>
           <h3><a href="tableres.php"><font color="black"> View Reservations</font></a></h3>
          <h3><a href="reviews.php"><font color="black">View Reviews</font></a></h3>
           <h3><a href="menuinfo.php"><font color="black">Menu Info</font></a></h3>
          <h3><a href="tableadd.php"><font color="black">Table Info</font></a></h3>
          <h3><a href="signout.php"><font color="white">Sign Out</font></a></h3>
        </div>
      </li>
   <!--   <li>
        <img src="../pic/adminhome1.jpg"> 
        <div class="caption left-align">
          <h3 class="light black-text text-lighten-3">Welcome Admin!!</h3>
          <h5 class="light grey-text text-lighten-3">Have a Good Day!</h5>
          <h3><a href="adminhome.php">View Reviews</a></h3>
          <h3><a href="tableadd.php">Add Table</a></h3>
        </div>
      </li>
     -->
    </ul>
  </div>
  <script type="text/javascript"> $(document).ready(function(){
      $('.slider').slider();
    });</script>

  <?php    
}
else
{
	header("location:adminlogin.php?msg=Please LogIn");
}
?>

</body>
</html>signout