<html>
<head>
	<title>Customer Reviews</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body>

 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="menuinfo.php">ITEM INFO</a></li>
        			<li><a href="tableres.php">VIEW RESERVATIONS</a></li>
        			<li><a href="tableadd.php">TABLE INFO</a></li>
        			<li><a href="orders.php">VIEW ORDERS</a></li> 
        		</ul>
        		<ul id="nav-mobile" class="right hide-on-med-and-down">
        				<li><a href="welcomeadmin.php">WELCOME PAGE</a></li>
        				<li><a href="signout.php">SIGN OUT</a></li>
     			</ul>

     			
	    </div>
 	 </nav>

<?php
session_start();
if(isset($_SESSION['admin']))
{

	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$stmt = $dbhandler->prepare("SELECT * FROM userreview"); 
   		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		
		if($result)
		{
			echo "<form action='adminapply.php' method='POST'>";
			echo "<table border='2'><tr><th>ID</th><th>Name</th><th>Comment</th><th>Service Rating</th><th>Food Rating</th><th>display</th><th>Don't display</th><th>Current Status</th></tr>";
			foreach($stmt->fetchAll() as $row)
			{
				if($row['apply']==0)
				{
					$y="Not Displayed";
				}
				else
					$y="Displayed";

				echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['comments']."</td><td>".$row['ratingser']."</td><td>".$row['ratingfood']."</td><td><input type='checkbox' name='chk[]' value='$row[id]' class='filled-in' id='$row[id]'><label for='$row[id]'></label></td><td><input type='checkbox' name='chk1[]' id='$row[id]+1' value='$row[id]' class='filled-in'><label for='$row[id]+1'></label></td><td>".$y."</td></tr>";
			}
			echo "</table>";
			 ?>
			 <button class="btn waves-effect waves-dark offset-l3" type="submit" name="action">Save
    <i class="material-icons right">Changes</i>
  </button>
  <?php
			echo "</form>";
		}
		else
			echo "NO reviews";

		
	}
	catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
else
{
	header("location:adminlogin.php?msg=Please Login");
}

?>
</body></html>	