<!DOCTYPE html>
<html>
<head>
	<title>Book IT</title>
</head>
<body>
	<?php
	session_start();
	try
	{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$nm = $_SESSION['user'];
		$tid = $_GET['bt'];
		$bdate = $_SESSION['bdate'];
		$from = $_SESSION['from'];
		$fromlong = $_SESSION['fromlong'];
		$to = $_SESSION['to'];
		$tolong = $_SESSION['tolong'];
		$mnum = 9876543210;

		$sl = "INSERT into booktable(name,tid,booking_date,start_time,starttime_long,end_time,endtime_long,mobile_no) values('$nm','$tid','$bdate','$from','$fromlong','$to','$tolong','$mnum')";
		$q= $dbhandler->query($sl);

		header("location:tablebook.php?msg=Your Table is Booked");

	}

	catch(PDOException $e)
	{
		echo $e->getMessage();
		die("Error");
	}
	?>
</body>
</html>