<html>
	<head>
	
<title>notification</title>
	</head>
	
<body>
	
<?php
	session_start();
	if(isset($_SESSION['user']))
	{
		try{
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
			
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$nm=$_SESSION['user'];
			if($_POST['pass']==$_POST['rpass'])
			{
			//	if(strlen($_POST['pass'])>=6)
			//	{
			//		if(is_numeric($pass)==false)
			//		{
			$sql = "UPDATE userinfo SET pwd = :pwd WHERE name= :nm";
			$stmt=$dbhandler->prepare($sql);
			$stmt->bindParam(':pwd', $_POST['pass'], PDO::PARAM_STR);

			$stmt->bindParam(':nm', $nm, PDO::PARAM_STR);
			$stmt->execute();
			header("location:menu1.php?msg=Password Changed Successfully..");
					}
			//		else
			//			header("location:setpassword.php?msg=password must contain alphabets...Try again");			
			//}
			//else
			//	header("location:setpassword.php?msg=Length is short...Try again");		
			//}
			else
				header("location:updatepass.php?msg=Both password must be same");
		   }

			catch(PDOException $e){
		echo $e->getMessage();
		die("Error");
			}
	}
	else
	{
		header("location:login.php?msg=Please Login First");
	}

?>

</body>
</html>


