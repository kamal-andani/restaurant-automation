<style type="text/css">
form{
	background-color: rgb(255,255,255);
	opacity: .92;
}
*{
	font-family: 'Arial', sans-serif;
	font-size: 20px;
	background-image: 
}

body{
	background-image: url(pic/menu1.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
}

input[type=text]{
	border-style: solid;
	border-color: rgb(220,220,220);
	border: 2px;
	border-radius: 4px;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<title>Update Password</title>
</head>
<body><br><br>
<div class="row"><center><h4 class="z-depth-5" style="color: white;">Update Password</h4></center></div>
<br>
<div class="container">
<form action="set.php" method="POST">
	
	<?php
		session_start();
		if(isset($_SESSION['rec']))
		{	
			if(isset($_GET['msg']))
			{
				echo "<tr><td colspan='2'>" .$_GET['msg']."</td></tr>";
			}
		?> 
			<div class="row"> 
			<div class="col s4 offset-s1"> 
			Enter New Password:</div>
			<div class="col s6">
			<input type="password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Password" name="pass">
			</div></div>
			<div class="row">
			<div class="col s4 offset-s1">
			Enter Re-Enter New Password:</div>
			<div class="col s6">
			<input type="password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Re-enter Password" name="rpass">
			</div></div>
			<div class="row"> <div class="col s2 offset-s5">
			<input type="submit" value="Update Password"></div></div>
		</table>
		<?php }
		else
		{
			header("location:recover.php?msg=Please Provide the credentials");
		}
		?>
</form>
</div>
</body>
</html>