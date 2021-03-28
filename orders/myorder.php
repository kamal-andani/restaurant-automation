<style type="text/css">
.verti{
	width: 1px;
	background-color: black;
	height: 15%;
	float:right;
	
}
.verti1{
	border-left: thin solid #ff0000;

}
.divider1 {

  height: 5px;
  overflow: hidden;
  background-color: #e0e0e0;
}</style>
<!DOCTYPE html>
<html>
<head>
	<title>MY Orders</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
</head>
<body background="pic/woodbk12.jpg" >
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div>
<br><br><br>

<?php
session_start();

//if(isset($_SESSION['user']))
{

try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $dbhandler->prepare('SELECT * FROM orders WHERE username=?');

		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);

		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		if($result)
					{
							
							
						
							foreach($stmt->fetchAll() as $row)

							{

							echo $row['OrderDate'];
								$datetime1 = new DateTime();
								$datetime2 = new DateTime($row['OrderDate']);
								$interval = $datetime1->diff($datetime2);
								$elapsed = $interval->format('%a days');
								if($elapsed<=31)
								{
									echo "<div class='row'><div class='col s3'><h1>";
								echo $elapsed;
								echo "</h1></div></div>";
								}
							}
						}
}
catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}

}
?>

</body>
</html>