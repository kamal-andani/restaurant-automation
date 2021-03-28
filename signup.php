<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="signuppage.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<!--<link href="stylesheet" type="text/css" href="../boot/boots/css/bootstrap.css">-->
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<title>SignUp</title>
</head>
<body background="images/tablecover.jpg">
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<div class="container">
	<div class="row"><center><h1 class="z-depth-5" style="color: white;">User Registeration</h1></center></div>
	<div>
		<form action="signupverify.php" method="post" class="z-depth-5">
	
		<div class="row">
			<div class="col l8 offset-l2" style="color: rgb(255,0,0);">
			<center>
				<?php
				if(isset($_GET['msg']))
				{
		
					 $m = $_GET['msg'];
				}
				else{
					$m = "Welcome New User";
				}
					 echo "<marquee>$m</marquee>"; 
				
				?>
			</center>
			</div>
		</div>
	<div class="row">
			<div class="col s3 offset-s1"><b>Username:</b><br><input type="text" required title="must start with $ or @ and length must be between 3 and 15" pattern="^[$|@][A-Za-z0-9-_]{3,15}$" placeholder="Username" STYLE="color: #000000;placeholder="Username" font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="rname"></div>
			<div class="col s4"><b>Email:</b><br><input type="Email" required placeholder="Email" STYLE="color: #000000; placeholder="Email"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="rmail"></div>
			<div class="col s3"><b>Phone Number:</b><br><input type="text" required placeholder="Phone Number" STYLE="color: #000000;placeholder="Phone Number";; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="rphone"></div>
	</div>
		<div class="row">
			<div class="col l4 offset-l2"><b>Password:</b><br><input type="Password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Password" STYLE="color: #000000;placeholder="Password"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;"  name="rpass"></div>
			<div class="col l4"><b>Confirm Password:</b><br><input type="Password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Password" STYLE="color: #000000;placeholder="Password"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="rcpass"></div>
		</div>
		<div class="row">
			<div class="input-field col s6 offset-s3 z-depth-2">
					<b>Security Question:</b>
				 <select name="que">
				 	<option value="" disabled selected>Choose your question</option>
					<option>What was your favorite place to visit as a child?</option>
					<option>Which is the Most memorable trip you ever had?</option>
					<option>What is your Family Pet Name?</option>
				</select>
				<script type="text/javascript">$(document).ready(function() {
    $('select').material_select();
  });</script>

				<input type="text" placeholder="Write your Answer" STYLE="color: #000000"; placeholder = "Write your answer" font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="ans">
		</div>
		</div>
		<div class="row">
			<div class="col l4 offset-l4 z-depth-2">
				<center><img src="captcha/captchafont.php"></center><hr><b>Enter Code:</b><input type="text" name="vcaptcha"/>
			</div>
		</div>
		<div class="row">
			<div class="col l4 offset-l4">
				<center><input type="submit" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 17px; background-color: #72A4D2;" value="Create an Account"/></center>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col l2 offset-l5">
				<center><a href="cover.html"><center><p style="font-size: 17px;">Go Back</p></center></a></center>
			</div>
		</div>
	</div>
</div>
</body>
</html>