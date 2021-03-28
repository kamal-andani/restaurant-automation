<!DOCTYPE html>
<html>
<head>
	<title>ADD MENU</title>
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
<?php
session_start();
if(isset($_SESSION['admin']))
{
?>

 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="reviews.php">View Reviews</a></li>
        			<li><a href="tableadd.php">TABLE INFO</a></li>
        			<li><a href="tableres.php">View Reservations</a></li>
        			<li><a href="menuinfo.php">Menu Info</a></li>
        			<li><a href="orders.php">View ORDERS</a></li> 

        		</ul>
        		<ul id="nav-mobile" class="right hide-on-med-and-down">
        				<li><a href="welcomeadmin.php">WELCOME PAGE</a></li>
        				<li><a href="signout.php">LOG OUT</a></li>
     			</ul>

     			
	    </div>
 	 </nav>
<div class="row">
<div class="col s6"> 	 
	<form action="addmenuverify.php" method="POST" enctype="multipart/form-data">
		<table border="2">
		<?php
			
			if(isset($_GET['msg']))
				{
					echo "<div class='row '><div class='col s4 offset-s5 card-panel yellow z-depth-2 '><center>".$_GET['msg']."</center></div></div>";
				}

		?>
		<tr>
		<td>Select Your File: </td> <td colspan="2"><input type="file" name="myFile"  required id="myFile"></td>
		</tr>

		<tr><td>
		Please provide Title of the item:</td><td><input type="text" name="titl" required title="Only alphabets"></td></tr>

		<tr><td>
		Please provide short discription of the item:</td><td> <textarea id="disc" name="disc" required class="materialize-textarea"></textarea>
          <label for="disc"></label></td></tr>
		
		<tr><td>
		Please provide price of item:</td><td><input type="text" name="price" pattern="[0-9]+" required title="Enter price in Rupees"></td></tr>
		<tr><td>Select Catagory:</td>
		<td><div class="input-field ">
    <select name="cat">
      <option value="" disabled selected>Choose the Catagory</option>
      <option value="Breakfast">Breakfast</option>
      <option value="dessert">Dessert</option>
      <option value="bevereges">Bevereges</option>
      <option value="Fastfood">Fastfood</option>
      <option value="Dinner">Dinner</option>
    </select>
    <label></label>
    <script type="text/javascript">$(document).ready(function() {
    $('select').material_select();
  });</script>
  </div></td></tr>
		<tr><td>
		 <button class="btn waves-effect waves-dark offset-l3" type="submit" name="action">Add
    <i class="material-icons right">Item</i>
  </button>
		</td></tr>
		</table>
	</form>
</div>
</div>
<?php
}
else
{
	header("location:adminlogin.php/msg=Please LogIn");
}
?>
</body>
</html>