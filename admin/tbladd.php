<!DOCTYPE html>
<html>
<head>
	<title>Add Table</title>
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
     	   			<li><a href="menuinfo.php">Menu Info</a></li>
     	   			<li><a href="reviews.php">View Review</a></li> 
     	   			<li><a href="orders.php">View ORDERS</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">
        				<li><a href="welcomeadmin.php">WELCOME PAGE</a></li>
        				<li><a href="signout.php">SIGN OUT</a></li>
     			</ul>
	    </div>
 	</nav>
 	<div class='container'><div class='row'><div class='col-sm-6 offset-sm-3'>
		<table class='striped bordered resposive-table centered' style='background-color:white' width=100px>
		<tbody>
		
<?php
	session_start();
	if(isset($_SESSION['admin']))
	{
		if(isset($_GET['msg']))
				{
					echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
				}
				echo "
		<form action='verifytable.php' method='post' style='position:relative;top:250px'>"?>
		<tr><td>
		Enter the Table id: </td><td><input type='text' name='tid'></td></tr>
		<tr><td>
		Enter the number of people per this table:</td><td><input type='number' max="10" name='percount'>
		</td></tr>
		<tr><td colspan=2><input type='submit' value='Add Table'> </td></tr>
		<br>
		</tbody>
		</table>
		</div></div></div>
		</form>
		<?php
	}
	else
	{
		header("location:adminlogin.php?msg1=Please Login to View Your Home Screen!");
	}
?>

</body>
</html>