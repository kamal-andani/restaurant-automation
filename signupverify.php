<html>
	<head>
	
<title>notification</title>
	</head>
	
<body>
	<?php
		session_start();
	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$nm=$_POST['rname'];

		$mail=$_POST['rmail'];

		$phn=$_POST['rphone'];

		$pass=$_POST['rpass'];
		$repass=$_POST['rcpass'];
		$ans=$_POST['ans'];
		$ques=$_POST['que'];
		$nmck="/[@$][A-Z_a-z0-9]+/";
		$phnck="/^(7|8|9)\d{9}$/";
  $sql11 = "CREATE TABLE IF NOT EXISTS userinfo (
    PersonID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(30) NOT NULL,
    pwd VARCHAR(20) NOT NULL,
    email VARCHAR(50),
    phone BIGINT(10),
    question TEXT,
    answer TEXT,
    address TEXT
    )";
$dbhandler->exec($sql11);
if(preg_match($nmck,$nm) && preg_match($phnck,$phn) )
{

	if($pass==$repass && $pass!=null)
	{	
		if(strlen($pass)>=6 && is_numeric($pass)==false)
		{
		if($mail!=null)
		{
			if($ans!=null)
			{
				if($_SESSION['vercode']!=$_POST['vcaptcha'] OR $_SESSION['vercode']=='')
				{
					header("location:signup.php?msg=INCORRECT captcha");
				}
				else
				{
					$stmt = $dbhandler->prepare('SELECT * FROM userinfo WHERE name=? OR email=?');
					$stmt->bindParam(1, $nm, PDO::PARAM_INT);
					$stmt->bindParam(2, $mail, PDO::PARAM_INT);
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
					if( ! $row)
					{
					$sql="insert into userinfo(name,pwd,email,phone,question,answer)values('$nm','$pass','$mail','$phn','$ques','$ans')";

					$query=$dbhandler->query($sql);
					//$_SESSION['user']=$nm;
					header("location:login.php?msg=Successfully created Account.");
					?>
<b><i>Successfully created account</i></b>
					
					<table border="2">
	<?php
	echo "<tr><td>Name:  " . $_POST['rname'] ."</td></tr><br/>";

					echo "<tr><td>Email id:  " .$_POST['rmail']."</td></tr><br>";

					echo "<tr><td>Phone no.:  " . $_POST['rphone'] ."</td></tr><br/>";
	
				
	echo "</table>";
					session_destroy();
					}
					else
					header("location:signup.php?msg=Username/Email already taken by someone.Please provide another");	

				}
			}
			else
			{	header("location:signup.php?msg=Please provide Answer for security purpose");}
		
		}
		else
			header("location:signup.php?msg=Please provide your email");
		}
		else
			header("location:signup.php?msg=Password length is short/ provide valid password");

	}
	else
	header("location:signup.php?msg=Please Enter same passwords.");
}
else
	header("location:signup.php?msg=Please enter valid phoneno/username");
	
}

		catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}
?>
	</body>
</html>




