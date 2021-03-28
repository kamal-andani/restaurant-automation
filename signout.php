<!DOCTYPE html>
<html>
<head>
	<title>Signout</title>
</head>
<body>
<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['email']);
session_destroy();
header("location:login.php?msg=Succesfully Logged Out");
?>
</body>
</html>