<!DOCTYPE html>
<html>
<head>
	<title>MY ORDER</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body background="../pic/woodbk.jpg"> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
<div class="row">
	<center><h1 class="z-depth-1" style="font-family: Brush Script MT;font-size: 100px; color: rgb(0,0,0);" >Paradise Cuisine</h1></center>
</div>


<?php
session_start();

if(isset($_SESSION['user']))
{
try{
		
		$nm=$_SESSION['user'];
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql = "UPDATE userinfo SET address = :ad WHERE name= :nm";
		$stmt=$dbhandler->prepare($sql);
		$stmt->bindParam(':ad', $_POST['addr'], PDO::PARAM_STR);

		$stmt->bindParam(':nm', $nm, PDO::PARAM_STR);
		$stmt->execute();
		header("location:placeorder.php");

	}
	catch(PDOException $e){
		echo $e->getMessage();
		die("Error");
	     }
}
else
{
	header("location:../login.php?msg=Please LogIn first");
}
?>
</body>
</html>

