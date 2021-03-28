<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Change Password</title>
</head>
<body background="pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div>
<br><br><br>

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

            <li><a href="orders/viewcart.php">My Cart</a></li>
            <li><a href="myorders.php">My Orders</a></li>
            <li><a href="home.php">HOME</a></li>
            <li><a href="signout.php">Sign Out</a></li>

            

           </ul>
      </div>
   </nav>
 	 <br><br><br>
 	 <div class='container'><div class='row'><div class='col-sm-6 offset-sm-3'>
   <?php
   if(isset($_GET['msg']))
        {
          echo "<div class='row '><div class='col s3 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
        }
      ?>
 	 <form action="set1.php" method="POST">
 	 <table class='striped bordered resposive-table centered' style='background-color:white' width=100px>
 	 <tbody>
 	 	<tr><td>Enter New Password:</td><td><input type="password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Password" name="pass"></td></tr>
		<tr><td>Enter Re-Enter New Password:</td><td><input type="password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Re-enter Password" name="rpass"></td></tr>
		<tr><td><input type="submit" value="update password"></td></tr>
 	 </tbody>
 	 </table>
 	 </form>
 	 </div>
 	 </div>
 	 </div>
 	 <br><br><br>
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
                  <li><a class="grey-text text-lighten-3" href="../contactusandfeedback/contact.php">Contact Us</a></li>
                  
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