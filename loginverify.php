<html>
<head></head>
<body>

<?php

	try{
		
		session_start();

		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		
			$name=$_POST['uname'];
			$pass=$_POST['pass'];
		if(isset($_SESSION['user']))
		{
			header("location:home.php");
		}
		else
		{
		if(isset($name) && isset($pass))
		{
			$stmt = $dbhandler->prepare('SELECT * FROM userinfo WHERE name=? AND pwd=?');
			$stmt->bindParam(1, $name, PDO::PARAM_INT);
			$stmt->bindParam(2, $pass, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if( ! $row)
				{
					header("location:login.php?msg=Invalid Username / Password");
				}
			else
	
			{	

				$_SESSION['user']=$name;
				$_SESSION['email']=$row['email'];
				$_SESSION['address']=$row['address'];
			header("location:home.php");
			}		
		}
		else
			header("location:login.php?msg=provide all info");
		}	   
	 }

	    catch(PDOException $e){
		echo $e->getMessage();
		die("Error");
	     }

?>
</body>
</html>