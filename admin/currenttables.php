<!DOCTYPE html>
<html>
<head>
	<title>Current tables</title>
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
        			<li><a href="reviews.php">View Review</a></li> 
     	   			<li><a href="tableadd.php">TABLE INFO</a></li>
     	   			<li><a href="menuinfo.php">Menu Info</a></li>
     	   			<li><a href="orders.php">TODAY'S ORDERS</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">
        				<li><a href="welcomeadmin.php">WELCOME PAGE</a></li>
        				<li><a href="signout.php">SIGN OUT</a></li>
     			</ul>
	    </div>
 	</nav>
	<?php 
		try
		{
			
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpproject','root','');
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$t = time();
			$d=date("Y-m-d");
			$b = strtotime(date("H:i"));
			$b=$b+19800;echo "<br/>";
			$c=0;

			$stmt = $dbhandler->query("SELECT * from booktable");
			$results = $stmt->fetchAll();
			$count = $stmt->rowcount();
			echo "<div class='container'><div class='row'><div class='col-sm-6 offset-sm-3'>";
					echo "<table class='striped bordered resposive-table centered' style='background-color:white' width=100px> ";
					echo "<tbody>";
			if($count>0)
			{
				foreach ($results as $r) 
				{
					if($r['starttime_long']<=$b && $r['endtime_long']>=$b && $r['booking_date']==$d)
						{echo "<tr><td>".$r['tid']."</td></td>".$r['id']."</td></tr>";$c++;}
				}
			}
			if($c==0)
			{
				echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>"."No Bookings At This Time"."</center></div></div>";
			}
		}

		catch(PDOException $e)
		{
			echo $e->getMessage();
			die("Error");
		}
	?>
</body>
</html>