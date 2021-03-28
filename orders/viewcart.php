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
	<title>MY CART</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body background="../pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<div class="row">
	<center><h1 class="z-depth-1" style="font-family: Brush Script MT;font-size: 100px; color: rgb(0,0,0);" >Paradise Cuisine</h1></center>
</div>


	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="../menu1.php?cat=breakfast">Breakfast</a></li>
        			 <li><a href="../menu1.php?cat=Fastfood">Fastfood</a></li>
     	   			<li><a href="../menu1.php?cat=dessert">Dessert</a></li>
 		   	        <li><a href="../menu1.php?cat=dinner">Dinner</a></li>
 		   	       
 		   	        <li><a href="../menu1.php?cat=bevereges">Bevereges</a></li>
     			 	<li><a href="../menu1.php?cat=all">ALL</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">
     			 	<li><a href="../menu1.php">Menu</a></li>
     			 	<li><a href="../home.php">HOME</a></li>
     			 	<li><a href="../signout.php">Sign Out</a></li>

     			 </ul>
	    </div>
 	 </nav>
<?php
session_start();

if(isset($_SESSION['user']))
{

try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $dbhandler->prepare('SELECT * FROM itmorder WHERE username=?');

		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);
		$stmt->execute();
		$stmt1 = $dbhandler->prepare('SELECT title,price FROM menuitem WHERE id=?');
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

				echo "<div class='container'>";

				if(isset($_GET['msg']))
				{
					echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
				}

				echo "<div class='card-panel deep-orange lighten-5'>";
					if($result)
					{
							
							$t=0;
						
							foreach($stmt->fetchAll() as $row)
							{
								$stmt1->bindParam(1, $row['itemid'], PDO::PARAM_INT);
								$stmt1->execute();
								$row1=$stmt1->fetch();
								$time=date("H:i:s",strtotime($row['OrderDate']));
								?>
									<div class="row z-depth-2">
					
									<div class='col s3'>
									<div class="verti"></div>
									<?php
								echo "<h6>Item: ".$row1['title']."</h6> ";
								?>
								</div>
								<div class="col s2" >
								<div class="verti"></div>


								<?php

								echo "Price:".$row1['price']."</div><div class='col s2'><div class='verti'></div>";
								echo "Quantity: ".$row['qty']."<br>";
								echo "Place IN Cart At: ".$row['OrderDate']."</div>";
								echo "<div class='col s2'>";
								echo "Amount=".$row1['price']."*".$row['qty']."=".$row1['price']*$row['qty'];
								$t=$t+$row1['price']*$row['qty'];
								?>
									<form action='updatecart.php' method='post' >

									<input type='hidden' name='odid' value=<?php echo $row['id'] ?> />
    					   <button class="btn waves-effect waves-light" type="submit" name="action">Remove Cart
 							 </button>
									</form>
									<?php	
										echo "</div>";

								//echo "----------------------------------";
								echo "</div>";
							}
						

					
					?>
					<div class="row">
						<div class="col s2 offset-s2">Total Bill:<?php echo $t;?></div>
						<div class="col s2 offset-s7">
							<form action="placeorder.php" method="POST">
											<input type="hidden" name="tb" value=<?php $t ?> />
								 <button class="btn waves-effect waves-light" type="submit" name="action">Place_Order
 							 </button>
							</form>
						</div>
					</div>
					<?php
				}
					else
					{
						echo "<h3>Empty cart</h3>";
					}
				echo "</div>";
				echo "</div>";

	}

	    catch(PDOException $e){
			echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>"."Currently no Items in the Cart"."</center></div></div>";
	     }
}
else
{
	header("location:../login.php?msg=Please LogIn first");
}

?>
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