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
	<title>MY ORDER</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body background="../pic/woodbk.jpg"> 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
<div class="row">
	<center><h1 class="z-depth-1" style="font-family: Brush Script MT;font-size: 100px; color: rgb(0,0,0);" >Paradise Cuisine</h1></center>
</div>


<?php
session_start();

if(isset($_SESSION['user']))
{
try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$stmtx = $dbhandler->prepare('SELECT * FROM userinfo WHERE name=?');

		$stmtx->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);
		$stmtx->execute();
		$rowx=$stmtx->fetch();
		if($rowx['address']==NULL)
		{
				echo "<div class='container'>";

				echo "<div class='card-panel deep-orange lighten-5'>";
				echo "<div class='row z-depth-2'>
					
									<div class='col s6'>";

			echo "<h4>Please Provide your Address</h4>";
			echo "<form action=addaddress.php method='post'>";
			echo "<textarea id='addr' name='addr' class='materialize-textarea' name='addr'></textarea>";
			echo "<button class='btn waves-effect waves-light' type='submit' name='action'>ADD_ADDRESS
 							 </button>
									</form>";

			echo "</div></div></div>";
		}
		else
		{
		$stmt = $dbhandler->prepare('SELECT * FROM itmorder WHERE username=?');

		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);
		$stmt->execute();
		$stmt1 = $dbhandler->prepare('SELECT title,price FROM menuitem WHERE id=?');
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


		$sql = "CREATE TABLE IF NOT EXISTS orders ( orderid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,username VARCHAR(15) NOT NULL, itemid INT(6) NOT NULL,quantity INT(6) NOT NULL,price INT(6), total INT(6) NOT NULL,OrderDate datetime NOT NULL DEFAULT NOW())";
		$dbhandler->exec($sql);

				echo "<div class='container'>";	
				echo "<div class='card-panel red lighten-3'>";
					if($result)
					{
						
						
							foreach($stmt->fetchAll() as $row)
							{
								$stmt1->bindParam(1, $row['itemid'], PDO::PARAM_INT);
								$stmt1->execute();
								$row1=$stmt1->fetch();
								$ttl=$row['qty']*$row1['price'];
								$sql1="insert into orders(username,itemid,quantity,price,total)values('$_SESSION[user]','$row[itemid]','$row[qty]','$row1[price]','$ttl')";

								$query=$dbhandler->query($sql1);


							}
							$stmt3 = $dbhandler->prepare('DELETE FROM itmorder WHERE username=?');

			$stmt3->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);
		//	$stmt->bindParam(1,$_POST['odid'], PDO::PARAM_INT);
		//	$stmt->bindParam(3, $_POST['qnt'], PDO::PARAM_INT);
		$stmt3->execute();
			header("location:../bill.php");
					}
					else
					{
						header("location:../menu1.php?msg=NO ITEMS IN CART");
					}
	}
}
	catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}
}
else
{
	header("location:../login.php?msg=Please LogIn first");
}
?>
</body></html>