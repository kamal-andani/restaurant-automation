<style type="text/css">
.verti{
	width: 1px;
	background-color: black;
	height: 22%;
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
	<title>Menus</title>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body background="pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


<div class="row" >

	<center><h1 class="z-depth-1" style="font-family: Brush Script MT;font-size: 100px; color: rgb(0,0,0);" >Paradise Cuisine</h1></center>
</div>


	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="menu1.php?cat=breakfast">Breakfast</a></li>
        			 <li><a href="menu1.php?cat=Fastfood">Fastfood</a></li>
     	   			<li><a href="menu1.php?cat=dessert">Dessert</a></li>
 		   	        <li><a href="menu1.php?cat=dinner">Dinner</a></li>
 		   	       
 		   	        <li><a href="menu1.php?cat=bevereges">Bevereges</a></li>
     			 	<li><a href="menu1.php?cat=all">ALL</a></li>
     			 </ul>

     			 <ul id="nav-mobile" class="right hide-on-med-and-down">
     			 <?php
     			  if(isset($_SESSION['user']))
     			  { 
     			 	echo "<li><a href='orders/viewcart.php'>My Cart</a></li>
     			 	<li><a href='myorders.php'>My Orders</a></li>";
     			 	}
     			 	?>
     			 	<li><a href='home.php'>HOME</a></li>
     			 <?php 
     			 	if(isset($_SESSION['user']))
     			 	{
     			 		echo "<li><a href='signout.php'>Sign Out</a></li>";
     			 }
     			 	?>
     			 	

     			 </ul>
	    </div>
 	 </nav>
<div class="container" >
<br><br>
	<div class="container-full">
<nav class="white">
    <div class="nav-wrapper">
      <form action="searchitem.php" method="post">
        <div class="input-field">
          <input id="search" type="search" placeholder="Search your fav food!" name="isearch">
          <i class="material-icons red-text">close</i>
        </div>
      </form>
    </div>
  </nav>
</div>

	<?php
	if(isset($_GET['msg']))
				{
					echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
				}

		//Getting the name of item to be searched
		$s = strtolower($_POST['isearch']);
		$pattern = "/.*".$s.".*/";
		$c=0;
		try
		{
			session_start();
			if(isset($_SESSION['user']))
				{

					$userid=$_SESSION['user'];
	
					?>
	
						<ul id="slide-out" class="side-nav">
		   			 	<li><div class="userView">
					   	      <div class="background">
  							      <img src="pic/background.jpg">
    			  			  </div>
  				 		     <a href="#!user"><img class="circle" src="pic/star.jpg"></a>
  		  			    	  <a href="#!name"><span class="white-text name"><?php echo $userid; ?></span></a>
 				  		     <a href="#!email"><span class="white-text email"><?php echo $_SESSION['email']; ?></span></a>
						    </div></li>
						      <li><a class="subheader">My Address:</a></li>
						 <li><a href="#!address"><span ><?php echo $_SESSION['address']; ?></span></a></li>
						 <li><div class="divider"></div></li>
					    <li><a href="orders/viewcart.php"><i class="material-icons"></i>View Cart</a></li>
				    	
   						 <li><div class="divider"></div></li>
 				  		 <li><a class="waves-effect" href="signout.php">Sign Out</a></li>
 				  		 <li><a class="waves-effect" href="updatepass.php">Change Password</a></li>
  						</ul>
  						<div class="row">
      					<div class="col s1"></div>
      					<div class="col s2"><br>
				 		 <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons"><b>info</b></i><b><u><i><?php echo $_SESSION['user']; ?></i></u></b></a>
							<script type="text/javascript">$(".button-collapse").sideNav();
							</script>
							</div>
							<div class="s9"></div>
						</div>

			<?php 
				}
		   
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


			if(isset($_GET['msg']))
			{
				$mes=$_GET['msg'];
				if($mes=='breakfast')
				{
					$stmt = $dbhandler->prepare("SELECT * FROM menuitem where category='Breakfast'");
				}
				else if($mes=='lunch')
				{
					$stmt = $dbhandler->prepare("SELECT * FROM menuitem where category='Lunch'");
				}
				else if($mes=='dinner')
				{
					$stmt = $dbhandler->prepare("SELECT * FROM menuitem where category='Dinner'");

				}
				else if($mes=='fastfood')
					$stmt = $dbhandler->prepare("SELECT * FROM menuitem where category='Fastfood'");
				else if($mes=='colddrink')
					$stmt = $dbhandler->prepare("SELECT * FROM menuitem where category='colddrink'");
				else
					$stmt = $dbhandler->prepare("SELECT * FROM menuitem ");

			}
			else
				$stmt = $dbhandler->prepare("SELECT * FROM menuitem");

			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			if($result)
			{	
				?>
				<div class='card-panel deep-orange lighten-5'>
				<?php
				foreach($stmt->fetchAll() as $row)
				{
					if(preg_match($pattern,strtolower($row['title']) ))
					{
					$c++;
					?>
					
					<div class="row z-depth-2 hoverable">
					
					<div class='col s3'>
					<div class="verti"></div>

				<!--<table class='highlight'><tr><td> -->
				
    					<center><img src="images/<?php echo $row['image'] ?>" height="100px" width="100px" style="margin-top: 20px"/></center>
    					</div>
    				<div class="col s4">
    				<div class="verti"></div>
    				
					<h6><p><b><?php echo $row['title'] ?></b></p><br></h6>
					<i><p><?php echo $row['discription']?></p></i><br>
					
					
					</div>
					<div class="col s1" style="position: relative;top:20%">
					<div class="verti"></div>
						<b><p>INR</p></b><br/>

						<h6><?php echo $row['price'] ?></h6><br/><br/>
					</div>
					<div class='col s4'>
					<form action='menu1verify.php' method='post' >

					<input type='hidden' name='itemid' value=<?php echo $row['id'] ?>> Quantity:
					<input type='number' value=1 min='1' id='qty' name='qty'/>
    				
    				 <button class="btn waves-effect waves-dark" type="submit" name="action">ADD To
    <i class="material-icons right">shopping_cart</i>
  </button>

					<!--<input type='submit' value="Add to Cart">-->
					</div>
					

					</form>
			
					</div>
					
				<?php
				}
			}
			if($c==0)
			{
				echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>"."No Match Found!"."</center></div></div>";
			}
				?>
				</div>
				<?php
			}
		}
		catch(PDOException $e) {
   			 echo "Error: " . $e->getMessage();
		}
	?>
</div>
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
                	<li><a class="grey-text text-lighten-3" href="home.php">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="contact/contact.php">Contact Us</a></li>
                  
                  <li><a class="grey-text text-lighten-3" href="menu1.php">Menu</a></li>
                 
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