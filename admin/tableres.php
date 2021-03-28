<style type="text/css">
.verti{
	width: 1px;
	background-color: black;
	height: 15%;
	float:right;
	
}
.verti1{
	border-left: thin solid #ff0000;

}
.divider1 {

  height: 5px;
  overflow: hidden;
  background-color: #e0e0e0;
}</style>
<!DOCTYPE html>
<html>
<head>
	<title>View Reservations</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body >
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>

<script type="text/javascript" src="https://github.com/MrRio/jsPDF/blob/master/jspdf.js"></script>

<nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="menuinfo.php">ITEM INFO</a></li>
        			<li><a href="tableadd.php">TABLE INFO</a></li>
        			<li><a href="reviews.php">View Review</a></li> 
        			<li><a href="orders.php">View Orders</a></li>
        		</ul>
        		<ul id="nav-mobile" class="right hide-on-med-and-down">
        				<li><a href="welcomeadmin.php">WELCOME PAGE</a></li>
        				<li><a href="signout.php">SIGN OUT</a></li>
     			</ul>
	    </div>
 	 </nav>

<?php
session_start();

if(isset($_SESSION['admin']))
{

	

try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $dbhandler->prepare('SELECT * FROM booktable');

//		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);

		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($result)
					{
							
						$ttl=0;$d=0;
							
							echo "<table border='2' class='striped bordered'><tr><th>Name</th><th>Table Id</th><th>Booking Date</th><th>From</th><th>To</th></tr>";						
							foreach($stmt->fetchAll() as $row)

							{
								echo "<tr><td>".$row['name']."</td><td>".$row['tid']."</td><td>".$row['booking_date']."</td><td>".$row['start_time']."</td><td>".$row['end_time']."</td></tr>";
							}

					}
					else
					{
						echo "No Reservations made yet.";
					}
}
catch(PDOException $e){
	echo "No Reservations Yet!!";
}

}
else
{
	header("location:adminlogin.php/msg=Please LogIn");
}
?>
</body>
</html>