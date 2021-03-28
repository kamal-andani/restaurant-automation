<!DOCTYPE html>
<html>
<head>
	<title>Verify Table</title>
</head>
<body>
<?php
	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');

		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$id = $_POST['tid'];
		$c = $_POST['percount'];

		$sql1 = "CREATE TABLE IF NOT EXISTS tableinfo (
				    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				    tid VARCHAR(30) NOT NULL,
				    maxperson INT(1) NOT NULL)";

		$sql2="CREATE TABLE IF NOT EXISTS tablebook(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			name VARCHAR(30),
			tid VARCHAR(20) NOT NULL,
			maxperson INT(1) NOT NULL,
			booking_date VARCHAR(20),
			start_time VARCHAR(20),
			end_time VARCHAR(20),
			mobile_no BIGINT(10))";
		
		$dbhandler->exec($sql1);
		$dbhandler->exec($sql2);

		if($id!=null && $c!=null && $c<=8)
		{
			$stmt = $dbhandler->prepare('SELECT * FROM tableinfo WHERE tid=?');
				$stmt->bindParam(1, $id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				if( ! $row)
				{
				$sql1="insert into tableinfo(tid,maxperson)values('$id','$c')";
				$sql2="insert into tablebook(tid,maxperson)values('$id','$c')";

				$query=$dbhandler->query($sql1);
				$query=$dbhandler->query($sql2);
				header("location:tableadd.php?msg=Successfully added table");		
				}

				else
					header("location:tbladd.php?msg=Table with this id already exist");
		}
		else
			header("location:tbladd.php?msg=Provide proper info");
	}
	catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}
?>
</body>
</html>