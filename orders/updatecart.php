<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
		session_start();

			if(isset($_SESSION['user']))
			{
				try{

					//	echo $_POST['odid'];

			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
			
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$stmt = $dbhandler->prepare('DELETE FROM itmorder WHERE id=?');

		//	$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);
			$stmt->bindParam(1,$_POST['odid'], PDO::PARAM_INT);
		//	$stmt->bindParam(3, $_POST['qnt'], PDO::PARAM_INT);
		$stmt->execute();

		header("location:viewcart.php?msg=Cart Updated Succefully");


				}

	    catch(PDOException $e){
		echo $e->getMessage();
		die("Error");
	     }
}

else
{
	header("location:login.php?msg=Please LogIn first");
}

?>

</body>
</html>