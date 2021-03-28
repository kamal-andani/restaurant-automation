<!DOCTYPE html>
<html>
<head>
	<title>Menu Verifyer</title>
</head>
<body>
<?php
		session_start();


		if(!empty($_FILES["myFile"]["name"]))
	{
	//	$target_location="C:\wamp64\www\mypro\pic\ ".basename($_FILES["myFile"]["name"]);
	//	if(! (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_location)))
	//		echo "Error: " . $_FILES["myFile"]["error"] . "<br>";
	//	else
	//	{
		$imgname=$_FILES["myFile"]["name"];
		$filetmp = $_FILES['myFile']['tmp_name'];
		$file_bname=basename($_FILES["myFile"]["name"]);
		$dir="../images/";
		$final_dir=$dir.$file_bname;
		if(move_uploaded_file($filetmp, $final_dir)){
			echo "SUCCESS";


	}
		else
			echo "Error";




	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$titl=$_POST['titl'];
		$disc=$_POST['disc'];
		$price=$_POST['price'];
		$cat=$_POST['cat'];
		$sql = "CREATE TABLE IF NOT EXISTS menuitem ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,title VARCHAR(15) NOT NULL, discription TEXT NOT NULL,price INT(6) NOT NULL,category VARCHAR(15) NOT NULL,image VARCHAR(200))";
		$dbhandler->exec($sql);
		$sql1="insert into menuitem(title,discription,price,category,image)values('$titl','$disc','$price','$cat','$imgname')";

					$query=$dbhandler->query($sql1);

		header("location:addmenu.php?msg=Successfully added item");
	}
		catch(PDOException $e){
	echo $e->getMessage();
	die("Error");
}
}
else
{
	header("location:addmenu.php?msg=Upload Image");
}
?>
</body>
</html>