<!DOCTYPE html>
<html>
<head>
	<title>My Reservations</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
</head>
<body background="../pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div>
<br><br><br>

	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="tablebook.php">Book Table</a></li>
     	   			<li><a href="myres.php">My Reservations</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">

     			 	<li><a href="../home.php">HOME</a></li>
     			 	<li><a href="../signout.php">Sign Out</a></li>
     			 </ul>
	    </div>
 	 </nav>

<div class="row"></div>

<?php
		session_start();
		if(isset($_SESSION['user']))
		{
			try
			{
				$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

				$stmt = $dbhandler->query("SELECT * from booktable");
				$results = $stmt->fetchAll();
				$count = $stmt->rowcount();
				if($count>0)
				{
					echo "<div class='container'><div class='row'><div class='col-sm-6 offset-sm-3'>";
					echo "<table class='striped bordered resposive-table centered' style='background-color:white' width=100px> ";
					echo "<thead><tr><th>Table ID</th><th>Date</th><th>From</th><th>To</th></tr></thead>";
					echo "<tbody>";
					foreach ($results as $res) 
					{
						if($res['name']==$_SESSION['user'])
						{
							echo "<tr><td>".$res['tid']."</td><td>".$res['booking_date']."</td><td>".$res['start_time']."</td><td>".$res['end_time']."</td></tr>";
						}	
					}
					echo "</tbody></table></div></div></div>";
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
				die("Error");
			}
		}
		else
		{
			header("location:../login.php?msg=Please Login First");
		}
?>
</tbody></table></div></div></div>
</div><br><br>
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">PARADISE CUISINE</h5>
                <p class="grey-text text-lighten-4">By :Kamal Andani<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bansi Kasundra<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deep Patel</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Site Links</h5>
                <ul>
                	<li><a class="grey-text text-lighten-3" href="../home.php">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="../contact/contact.php">Contact Us</a></li>
                  
                  <li><a class="grey-text text-lighten-3" href="../menu1.php">Menu</a></li>
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright  THIS IS US
           
            </div>
          </div>
</footer>
</body>
</html>