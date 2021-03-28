<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="adminloginpage.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<title>Admin Login</title>
</head>
<body background="../images/cvr2.jpg">
<div class="container">
	<div class="center" style="position: relative;top: 30px">
		<form method="post" class="z-depth-2">
			<div class="row">
			<div class="col s8 offset-s2" style="padding-top: 10px">
				<h5><b><center>ADMIN LOGIN</center></b></h5>
			</div>
			</div>
				<?php 
					if(isset($_GET['msg']))
					{
						echo "<b>".$_GET['msg']."</br>";
					}
				?>					
			<hr>
			<table border="1">
			<tr><td>Username:</td><td><input type="text" class="z-depth-2" placeholder="Username" style="position: relative;top: 10px" STYLE="color: #000000;placeholder="Username"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="uname"></td></tr>
			<tr><td>Password:</td><td><input type="password" placeholder="Password" style="position: relative;top: 10px" STYLE="color: #000000;placeholder="Password"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" class="z-depth-2" name="pass"></td></tr>
			<tr><td><input type="submit" style="position: relative;left: 40px" class="z-depth-2" value="Login"></td><td><input type="reset" class="z-depth-2" style="position: relative;left: 65px" name="Reset"></td></tr>
			<tr><td colspan="2" style="font-size: 12px; position: relative;top: -10px"><a href="../cover.html"><u>Home</u></a></td></tr>
			</table>
		</form>
		<?php
	session_start();
	if(isset($_POST['uname']) && isset($_POST['pass']))
	{
		$u=$_POST['uname'];
		$p=$_POST['pass'];
		if(($u=="superuser" && $p=="root"))
		{
			$_SESSION['admin']=$u;
			header("location:welcomeadmin.php");	
			
		}
		else
		{
		header("location:adminlogin.php?msg=INVALID LOGIN DETAIL");	
		}
		
		
	}
	?>
	</div>
</div>
</body>
</html>