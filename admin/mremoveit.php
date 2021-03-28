<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	session_start();
	if(isset($_SESSION['admin']))
	{
		try
		{
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$stmt = $dbhandler->prepare('DELETE FROM menuitem WHERE title=?');
			$stmt->bindParam(1,$_GET['bt'], PDO::PARAM_INT);
			$stmt->execute();
			header("location:menuinfo.php?msg=Item Removed Successfully");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die("Error");
		}
	}
	else
	{
		header("location:adminlogin.php?msg1=Please Login to View Your Home Screen!");
	}
?>
</body>
</html>