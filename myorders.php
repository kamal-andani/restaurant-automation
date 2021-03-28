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
	<title>This Month's Orders</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
</head>
<body >
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript" src="https://github.com/MrRio/jsPDF/blob/master/jspdf.js"></script>
<div class="row" >

	<center><h1 class="z-depth-1" style="font-family: Brush Script MT;font-size: 100px; color: rgb(0,0,0);" >Paradise Cuisine</h1></center>
</div>

	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="menu1.php?cat=breakfast">Breakfast</a></li>
        			 <li><a href="menu1.php?cat=Fastfood">Fastfood</a></li>
     	   			<li><a href="menu1.php?cat=dessert">Dessert</a></li>
 		   	        <li><a href="menu1.php?cat=dinner">Dinner</a></li>
 		   	       
 		   	        <li><a href="menu1.php?cat=bevereges">Bevereges</a></li>
     			 	<li><a href="menu1.php?cat=all">ALL</a></li>
     			 </ul>

     			 <ul id="nav-mobile" class="right hide-on-med-and-down">

     			 	<li><a href="orders/viewcart.php">My Cart</a></li>
     			 	<li><a href="myorders.php">My Orders</a></li>
     			 	<li><a href="home.php">HOME</a></li>
     			 	<li><a href="signout.php">Sign Out</a></li>
     			 	

     			 </ul>
	    </div>
 	 </nav>
        	



<?php
session_start();

if(isset($_SESSION['user']))
{

try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $dbhandler->prepare('SELECT * FROM orders where username=?');

		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);

		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($result)
					{
							
							
							echo "<table border='2'><tr><th>ORDER ID</th><th>Name</th><th>Item Id</th><th>Quantity</th><th>Total Price</th><th>Order Date</th></tr>";						
							foreach($stmt->fetchAll() as $row)

							{
								$datetime1 = new DateTime();
								$datetime2 = new DateTime($row['OrderDate']);
								//echo "<br>".$datetime2;
								$interval = $datetime1->diff($datetime2);
								$elapsed = $interval->format('%a days');
							// 		echo "<br>".$elapsed;
								if($elapsed<=31)
								{
									//echo "<div class='card-panel transparent hoverable'>";
								echo "<tr><td>".$row['orderid']."</td><td>".$row['username']."</td><td>".$row['itemid']."</td><td>".$row['quantity']."</td><td>".$row['total']."</td><td>".$row['OrderDate']."</td></tr>";
							//	echo "</div>";
								}
							}


					}
					else
					{
						echo "NO ITEMS";
					}
}
catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}

}
else
{
	header("location:login.php?msg=Please LogIn");
}
?>
</body>
</html>