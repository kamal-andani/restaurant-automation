<!DOCTYPE html>
<html>
<head>
	<title>
		verfier
	</title>
</head>
<body>
<?php 
try{
		session_start();
	if(isset($_SESSION['user']))
	{

		$userid=$_SESSION['user'];
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 		$qn=$_POST['qty'] ;
		$itmid=$_POST['itemid'];
 		$sql = "CREATE TABLE IF NOT EXISTS itmorder ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,username VARCHAR(15) REFERENCES userinfo(name) ,itemid INT(6) NOT NULL,qty INT(6) NOT NULL, OrderDate datetime NOT NULL DEFAULT NOW())";
		$dbhandler->exec($sql);	

		$sql1="insert into itmorder(username,itemid,qty)values('$userid','$itmid','$qn')";

					$query=$dbhandler->query($sql1);

			header("location:menu1.php?msg=Item Added to Cart Succesfully");
	}
	else
	{
			header("location:login.php?msg=Please LogIn to add Items in cart");	
	}
	}
		catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}

  ?>
</body>
</html>