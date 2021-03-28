<!DOCTYPE html>
<html>
<head>
<title>SET UP PASSWORD</title>
</head>
<body>

Verification successful
<form action="set.php" method="POST">
	<table>
	<?php
		session_start();	
		if(isset($_GET['msg']))
		{
			echo "<tr><td colspan='2'>" .$_GET['msg']."</td></tr>";
		}
	?> 
		<tr><td>Enter New Password:</td><td><input type="password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Password" name="pass"></td></tr>
		<tr><td>Enter Re-Enter New Password:</td><td><input type="password" title="Minimum 8 and Maximum 15 characters having at least 1 Uppercase Alphabet, 1 Lowercase Alphabet, 1 Number and 1 Special Character" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}" required placeholder="Re-enter Password" name="rpass"></td></tr>
		<tr><td><input type="submit" value="update password"></td></tr>
	</table>
</form>

</body>
</html>