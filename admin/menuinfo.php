<!DOCTYPE html>
<html>
<head>
	<title>Add Menu</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body background="../pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

    <div class="center-align">
	<h1>Paradise Cuisine</h1>
	</div>
	<br><br><br>

	<nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="tableres.php">View Reservations</a></li>
     	   			<li><a href="tableadd.php">Table Info</a></li>
     	   			<li><a href="orders.php">View ORDERS</a></li>
     	   			<li><a href="reviews.php">View Review</a></li> 
     			 </ul>
     			  <ul id="nav-mobile" class="right hide-on-med-and-down">
     			  	<li><a href="welcomeadmin.php">WELCOME PAGE</a></li>
     			 	<li><a href="adsignout.php">Sign Out</a></li>
     			</ul>
	    </div>
 	</nav><br><br><br>

 	<div class="row"></div>
		
<?php
	session_start();
	if(isset($_SESSION['admin']))
	{
		if(isset($_GET['msg']))
				{
					echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
				}

		try
		{
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$stmt = $dbhandler->query("SELECT * from menuitem");
			$users =$stmt->fetchAll();

			echo "<div class='container'><div class='row'><div class='col-sm-6 offset-sm-3'>";
			echo "<table class='striped bordered resposive-table centered' style='background-color:white' width=100px> ";
			echo "<thead><tr><th>Name</th><th>Price</th><th>Remove It</th></tr></thead>";
			echo "<tbody>";

			foreach ($users as $user) {
				$x=$user['title'];
				echo "<tr><td>".$user['title']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> Rs ".$user['price']."</td><td><img src='cross.png' height=20px width=20px /><a href='mremoveit.php?bt=$x'>  REMOVE</a>"."</td></tr>";
			}

			echo "<tr><td><a href='addmenu.php'>Add Menu Item</a></td></tr>";
			echo "</tbody></table></div></div></div>";
		}
		catch(PDOException $e)
		{
			echo "<tr><td><a href='addmenu.php'>Add Menu Item</a></td></tr>";
		}
	}
	else
	{
		header("location:adminlogin.php?msg1=Please Login to View Your Home Screen!");
	}
?></tbody></table></div></div></div>
</body>
</html>