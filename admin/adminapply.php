<html>
<body>

<?php

	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$stmt = $dbhandler->prepare('update userreview set apply=1 where id=?');
		$stmt1 = $dbhandler->prepare('update userreview set apply=0 where id=?');	
		if(!empty($_POST['chk'])) {
   			foreach($_POST['chk'] as $check) {
            		
				$stmt->bindParam(1, $check, PDO::PARAM_INT);
				$stmt->execute();
			
			}
		}	
		if(!empty($_POST['chk1'])) {
   			foreach($_POST['chk1'] as $check1) {
            		

				$stmt1->bindParam(1, $check1, PDO::PARAM_INT);
				$stmt1->execute();
			
			}
		}
	/*	$stmt2 = $dbhandler->prepare("SELECT * FROM userreview where apply=1"); 
   		$stmt2->execute();
		$result = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 
		
		if($result)
		{	
				echo "<br>";
				foreach($stmt2->fetchAll() as $row)
			{
				echo "<br>";
				echo $row['name'] ."<br>";
				echo $row['comments']."<br>";
			}
		}
			echo "</table>";*/
			header("location:reviews.php");
	}
		catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
</body></html>	