<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<title>Book your table</title>
</head>
<body background="../pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<?php 
session_start();
if(isset($_SESSION['user']))
{
?>
<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div>
<br><br><br>

	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="tablebook.php">Book Table</a></li>
     	   			<li><a href="myres.php">My Reservations</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">

     			 	<li><a href="../home.php">HOME</a></li>
     			 	<li><a href="../signout.php">Sign Out</a></li>
     			 </ul>
	    </div>
 	 </nav>
<div class="container">
	<br>
	<center><img src="table.jpg" height="350px" width="1000px"></center>
	<br>
	<div class="row">
			<div class="col l8 offset-l2" style="color: rgb(255,105,180); font-size: 20px;">
			<center>
				<?php
				$m='';
				if(isset($_GET['msg']))
				{
					 $m = $_GET['msg'];
				}
				else
				{
					$m = "Enter Date and time of Reservation";
				}
				echo "<marquee><p style='color: rgb(255,192,203); font-size: 20px;'>".$m."</p></marquee>";	
				?>
			</center>
			</div>
	</div>
	<div class="row">
	<div class="col-sm-4 offset-sm-4">
	<form action="checktabs.php" method="post">
	<div style="background-color: rgb(255,182,193); position: relative;top: 10%; left: 120%">
	<?php
		date_default_timezone_set("Asia/Kolkata");
		$d=date("Y-m-d");
		$d1 = date("Y-m-d", strtotime('last day of next month'));
		$t=date("h:i");
		$t1=date("H:i", strtotime('+2 hours'));
		$timestamp1 = strtotime($t1) + 2*60*60;
		$timestamp2 = strtotime($t1) + 60*60;
		$t3 = date('H:i', $timestamp1);
		$t2 = date('H:i', $timestamp2);

		echo "
	<b> &nbsp; Reservation Date:</b> <hr style='height:1px;border:none;color:#333;background-color:#333;' /><input type='date'  placeholder='yyyy-mm-dd' required min=$d max=$d1 value=$d name='rdate'>
	<br>
	<b> &nbsp; Reservation Time:</b><hr style='height:1px;border:none;color:#333;background-color:#333;' />
	From:<input type='Time' placeholder='hrs:mins' required value=$t1 name='rtimef'><br>
	To:<input type='Time' placeholder='hrs:mins' required value=$t3 name='rtimet'>
	<br>
	<div class='row'>
		<div class='col s4 offset-s2'>
			<input style='position:relative;left:15%;' type='Submit' class='z-depth-2' value='Show available Tables'>
		</div>
	</div>"
	?><br>
	</div>
	</form>
	</div>
	</div>
	</div>
</div><br><br>
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">PARADISE CUISINE</h5>
                <p class="grey-text text-lighten-4">By :Kamal Andani<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bansi Kasundra<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deep Patel</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Site Links</h5>
                <ul>
                	<li><a class="grey-text text-lighten-3" href="../home.php">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="../contact/contact.php">Contact Us</a></li>
                  
                  <li><a class="grey-text text-lighten-3" href="../menu1.php">Menu</a></li>
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright  THIS IS US
           
            </div>
          </div>
</footer>
<?php }
else
{
	header("location:../login.php?msg=Please Log into your Account");
}
?>
</body>
</html>