<!DOCTYPE html>
<html>
<head>
	<title>Signout</title>
</head>
<body>
<?php
session_start();
unset($_SESSION['admin']);
//unset($_SESSION['email']);
session_destroy();
header("location:adminlogin.php?msg=Succesfully Logged Out");
?>
</body>
</html>