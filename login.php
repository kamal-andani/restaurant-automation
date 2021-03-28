<style type="text/css">
	body{
	background-image: url(pic/menu.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
}
</style>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="loginpage.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<title>Login Page</title>
</head>
<body background="pic/gallary.jpg" style="background-image: ; animation: ease-in;">
<?php 
	session_start();
	if(isset($_SESSION['user']))
	{
		$h = "Welcome back ". $_SESSION['user'];
		header("location:home.php?msg=$h");
	}
	else
	{
?>
<div class="container">
	<div class="center" style="position: relative;top: -10px">
		<form action="loginverify.php" method="post" class="z-depth-5">
			<div class="row">
				<div class="col s4 offset-s3">
				<img src="images/login.jpg"  height="100px" width="100px"><br><p style="position: relative;left: 40%;"><b>LOGIN</b></p>
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
			<tr><td>Username:</td><td><input type="text" class="z-depth-2" required placeholder="Username" style="position: relative;top: 10px" STYLE="color: #000000;placeholder="Username"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" name="uname"></td></tr>
			<tr><td>Password:</td><td><input type="password" placeholder="Password" required style="position: relative;top: 10px" STYLE="color: #000000;placeholder="Password"; font-family: Verdana; font-size: 18px; background-color: #d3d3d3;" class="z-depth-2" name="pass"></td></tr>
			<tr><td><input type="submit" style="position: relative;left: 40px" class="z-depth-2" value="Login"></td><td><input type="reset" class="z-depth-2" style="position: relative;left: 65px" name="Reset"></td></tr>
			<tr><td colspan="2" style="font-size: 12px"><a href="recover.php"><u>Forgot Password</u></a></td></tr>
			<tr><td colspan="2" style="font-size: 12px; position: relative;top: -22px"><a href="cover.html"><u>Home</u></a></td></tr>
			</table>
		</form>
	</div>
</div>
<?php } ?>
</body>
</html>