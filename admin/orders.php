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
	<title>View Orders</title>
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
        			<li><a href="tableres.php">View Reservations</a></li>
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

	echo "<div class='row'><div class='col s3'><form action='orders.php' method='post'>
			For Last How Many Days You Want To See Orders?</div>
			<div class='col s2'><input type='number' name='dys'> </div>
			</div>
			<div class='row'>
				 <button class='btn waves-effect waves-dark offset-l3' type='submit' name='action'>Filter
    <i class='material-icons right'>Orders</i>
  </button></div>";

try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $dbhandler->prepare('SELECT * FROM orders');

//		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);

		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($result)
					{
							
						$ttl=0;$d=0;
							
							echo "<table border='2' class='striped bordered'><tr><th>ORDER ID</th><th>Name</th><th>Item Id</th><th>Quantity</th><th>Total Price</th><th>Order Date</th></tr>";						
							foreach($stmt->fetchAll() as $row)

							{
								$datetime1 = new DateTime();
								$datetime2 = new DateTime($row['OrderDate']);
								//echo "<br>".$datetime2;
								$interval = $datetime1->diff($datetime2);
								$elapsed = $interval->format('%a days');
							// 		echo "<br>".$elapsed;
								if(isset($_POST['dys']))
								{
									$d=$_POST['dys'];
								}
								else
								{
									$d=1;
								}
								if($elapsed<=$d)
								{
									$ttl=$ttl+$row['total'];
										//echo "<div class='card-panel transparent hoverable'>";
								echo "<tr><td>".$row['orderid']."</td><td>".$row['username']."</td><td>".$row['itemid']."</td><td>".$row['quantity']."</td><td>".$row['total']."</td><td>".$row['OrderDate']."</td></tr>";
							//	echo "</div>";
								}
								

							}

								echo "<br><h4><b>Total Amout Earned In ".$d." days: ".$ttl."</b></h4>";

					}
					else
					{
						echo "NO ITEMS";
					}
}
catch(PDOException $e){
	echo "No Orders Yet!!";
}

}
else
{
	header("location:adminlogin.php/msg=Please LogIn");
}
?>
</body>
</html>