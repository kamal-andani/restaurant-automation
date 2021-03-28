<!DOCTYPE html>
<html>
<head>
	<title>Table Reservations</title>
	<link rel="stylesheet" type="text/css" href="../../materialize.css">
</head>
<body background="../loginnverify/pic/woodbk.jpg">	

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../../materialize.min.js"></script>


<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div>
<br><br><br>

	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="booktable.php?msg=bookatable">Book Table</a></li>
     	   			<li><a href="booktable.php?msg=seemytables">Check My Reservations</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">

     			 	<li><a href="../loginnverify/home.php">HOME</a></li>
     			 </ul>
	    </div>
 	 </nav>

 	<?php
	if(isset($_GET['msg']))
	{
		echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
	}
	try
	{
		session_start();
		if(isset($_SESSION['user']))
		{
			$userid=$_SESSION['user'];
		}
		if(isset($_GET['msg']))
		{
			if($_GET['msg']=='SeeReservations')
			{

			}
			else
			{
				
			}
		}
}
catch(PDOException $e) {
   			 echo "Error: " . $e->getMessage();
		}
	?>

</body>
</html>