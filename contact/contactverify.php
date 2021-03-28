<html>
<body>

<?php

	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$name=$_POST['uname'];
		$em=$_POST['email'];
		$tex=$_POST['textarea1'];
		if(($_POST['rating']!=NULL && $_POST['rating1']!=NULL))
		{
		$rat=$_POST['rating'];
		$rat1=$_POST['rating1'];
  		}
  		else
  		{
  			header("location:contact.php?msg=Please give us ratings!!");
  		}
  		$sql11 = "CREATE TABLE IF NOT EXISTS userreview (
	 	   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
       		    name VARCHAR(30) NOT NULL,
	 	   email VARCHAR(50),
         	   comments TEXT,
	  	  ratingser INT(6),
		  ratingfood INT(6),
		  apply INT(6) 
    		)";
		$dbhandler->exec($sql11);
		if($name!=null)
		{
			
	
			$stmt = $dbhandler->prepare('SELECT * FROM userinfo WHERE name=? AND email=?');
			$stmt->bindParam(1, $name, PDO::PARAM_INT);
			$stmt->bindParam(2, $em, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if( ! $row)
				{
					header("location:contact.php?msg=You must be registered user to give feedback");
				}
		else
	
		{			
			
			$sql="insert into userreview(name,email,comments,ratingser,ratingfood)values('$name','$em','$tex','$rat','$rat1')";

			$query=$dbhandler->query($sql);
			echo "
<b><i>Successfully submitted your feedback</i></b>";
			echo "<br><br>";
			header("location:contact.php?msg=Successfully submitted your feedback");
			
		}
		}
		else
	
		header("location:contact.php?msg=Please Enter valid information");
	
	}

		catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}

	



?>
</body>
</html>