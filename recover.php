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

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<title>Recover Password</title>
</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
<br><br><br><br><br>
<div class="container">
<form action=recoververify.php method="POST">
<?php	
echo "<div class='row'>
<div class='col s3'>";
	if(isset($_GET['msg']))
	{
	


		echo  "<b><h4>".$_GET['msg']."</h4></b>";

	}
	echo "</div></div>";
?> 

	<div class="row">
<div class="col s4 offset-s1">
ENTER YOUR USERNAME:</div><div class="col s6"><input type="text" name="uname"></div>
</div>

	<div class="input-field row">
	<div class="col s4 offset-s1">
	Select the Question Which you seleced at sign up:</div>
	<div class="col s6">
	<select name="que">
		<option>What was your favorite place to visit as a child?</option>
		<option>Which is the Most memorable trip you ever had?</option>
		<option>What is your Family Pet Name?</option>
		</select>
		<script type="text/javascript">$(document).ready(function() {
    $('select').material_select();
  });</script>
  </div>
  </div>



	<div class="row">
	<div class="col s4 offset-s1">
	Give Your Answer:</div>
	<div class="col s6">
	<input type="text" cols="40" rows="3" name="ans"></div>
	</div>

	<div class="row">
	<div class="col s4 offset-s1">
	Enter the Mobile Number which you provided:</div>
	<div class="col s6">
	<input type="text" name="phn"></div>
	</div>
	<div class="row">
	<div class="col s2 offset-s5">
	<input type="submit" value="VALIDATE"></div>
	</div>
</form>
</div>
</body></html>