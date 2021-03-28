<html>
<head></head>
<body>

<?php

	try{
		

		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		
			$name=$_POST['uname'];
			$que=$_POST['que'];
			$ans=$_POST['ans'];
			$mno=$_POST['phn'];

		$stmt = $dbhandler->prepare('SELECT * FROM userinfo WHERE name=? AND question=? AND answer=? AND phone=?');
			$stmt->bindParam(1, $name, PDO::PARAM_INT);
			$stmt->bindParam(2, $que, PDO::PARAM_INT);
			$stmt->bindParam(3, $ans, PDO::PARAM_INT);
			$stmt->bindParam(4, $mno, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if( ! $row)
				{
					header("location:recover.php?msg=Invalid Info");
				}
			else
	
			{	
			session_start();
			$_SESSION['rec']=$name;	
			header("location:setpassword.php");
			}		
 	  }

	    catch(PDOException $e){
		echo $e->getMessage();
		die("Error");
	     }

?>
</body>
</html>
