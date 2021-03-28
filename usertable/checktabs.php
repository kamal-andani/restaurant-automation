<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
	<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
	<title>Check Tabs</title>
</head>
<body background="../pic/woodbk.jpg">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<div class="center-align">
	<h1>Paradise Cuisine</h1>
</div>
<br><br><br>

	 <nav>
    	<div class="nav-wrapper">
      		    <ul id="nav-mobile" class="left hide-on-med-and-down">
        			<li><a href="tablebook.php">Book Table</a></li>
     	   			<li><a href="myres.php">My Reservations</a></li>
     			 </ul>
     			 <ul id="nav-mobile" class="right hide-on-med-and-down">

     			 	<li><a href="../loginnverify/home.php">HOME</a></li>
     			 	<li><a href="../signout.php">Sign Out</a></li>
     			 </ul>
	    </div>
 	 </nav>
 	 <br><br>
	<center><img src="table.jpg" height="350px" width="1000px"></center><br><br>
	<?php
		session_start();
		if(isset($_SESSION['user']))
		{
			try
			{
				$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				
				$nm = $_SESSION['user'];
				$bdate = $_POST['rdate'];
				$_SESSION['bdate']=$bdate;
				//echo $bdate."<br/>";
				$from = $_POST['rtimef'];
				$_SESSION['from']=$from;
				$fromlong = strtotime($from);
				$_SESSION['fromlong']=$fromlong;
				//echo $fromlong."<br/>";
				$to = $_POST['rtimet'];
				$_SESSION['to']=$to;
				$tolong = strtotime($to);
				$_SESSION['tolong']=$tolong;
				//echo $tolong;

				date_default_timezone_set("Asia/Kolkata");
				$d=date("Y-m-d");
				$b = strtotime(date("H:i"));
				
				if($bdate==$d)
				{
					//if($fromlong-strtotime($t)<60*60*2*1000)
					if($fromlong-$b-19800+60<=60*60*2)
					{
						header("location:tablebook.php?msg=Reservation must be made before 2 hours");
					}
				}
				else
				{}

				if($tolong>$fromlong)
				{
					
					if($tolong-$fromlong>=60*20)
					{
						?>
							<div class="row">
							<div class="col s8 offset-s2" style="color: rgb(255,105,180); font-size: 20px;">
							<center>
							<?php
							$m='';
							if(isset($_GET['msg']))
							{
								 $m = $_GET['msg'];
							}
							else
							{
								$m = "Available Tables at your timing";
							}
							echo "<marquee><p style='color: rgb(255,192,203); font-size: 20px;'>".$m."</p></marquee>";	
							?>
							</center>
							</div>
						</div>
						</div><?php

						$sql="CREATE TABLE IF NOT EXISTS booktable(
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
						name VARCHAR(30),
						tid VARCHAR(20) NOT NULL,
						maxperson INT(1) ,
						booking_date VARCHAR(20),
						start_time VARCHAR(20),
						starttime_long BIGINT(20),
						end_time VARCHAR(20),
						endtime_long BIGINT(20),
						mobile_no BIGINT(10))";

						$dbhandler->exec($sql);

							/*$sl = "INSERT into booktable(name,tid,maxperson,booking_date,start_time,starttime_long,end_time,endtime_long,mobile_no) values('$nm','2A','2','$bdate','$from','$fromlong','$to','$tolong','8141744452')";
							$q= $dbhandler->query($sl);*/

						$stmt = $dbhandler->query("SELECT tid from tableinfo");
						$users =$stmt->fetchAll();
						$stmt1 = $dbhandler->query("SELECT * from booktable");
						$results = $stmt1->fetchAll();
						$count = $stmt1->rowcount();
						$b=1;
						echo "<div class='container'><div class='row'><div class='col s6 offset-s3'>";
						echo "<table class='striped bordered resposive-table centered' style='background-color:white' width=100px> ";
						echo "<tbody>";
						if($count>0)
						{
							foreach ($users as $user) {
								$b=1;
								foreach ($results as $res) {
									//if($user['tid']==$res['tid'] and $res['booking_date']==$bdate and ($res['starttime_long']>$fromlong and $res['starttime_long']<$tolong) and ($res['endtime_long']>$fromlong and $res['endtime_long']<$tolong))
									
										if($user['tid']==$res['tid'] and $res['booking_date']==$bdate and(($fromlong>=$res['starttime_long'] and $fromlong<=$res['endtime_long']) or ($tolong>=$res['starttime_long'] and $tolong<=$res['endtime_long']) or ($fromlong<=$res['starttime_long'] and $tolong>=$res['endtime_long'])))
										{$b=$b*0;}
										else
										{
											$b=$b*1;
										}
									

								}
								if($b==1)
								{
									$x=$user['tid'];
									echo "<tr><td>".$user['tid']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>"."<a href='bookit.php?bt=$x'>BOOK NOW</a>"."</td></tr>";
								}
								else{}
							}
						}
						else
						{
							foreach ($users as $user) {
								$x=$user['tid'];
									echo "<tr><td>".$user['tid']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>"."<a href='bookit.php?bt=$x'>BOOK NOW</a>"."</td></tr>";
								
							}
						}
					/*	$sl = "INSERT into booktable(name,tid,maxperson,booking_date,start_time,starttime_long,end_time,endtime_long,mobile_no) values('$nm','2A','2','$bdate','$from','$fromlong','$to','$tolong','8141744452')";
						$q= $dbhandler->query($sl);

						$stmt = $dbhandler->query("SELECT tid from tableinfo");
						$stmt1 = $dbhandler->prepare("SELECT * FROM booktable WHERE booking_date=? AND tid=? AND (starttime_long BETWEEN ? and ?) AND (endtime_long BETWEEN ? and ?)");
					
								$users =$stmt->fetchAll();
								$count = $stmt->rowcount();
								echo "<br/><br/>".$count."<br/>";
								foreach ($users as $user) {
									 //print($user['tid']).'<br/>';
									$stmt1->bindParam(1,$bdate,PDO::PARAM_STR);	
									$stmt1->bindParam(2,$user['tid'],PDO::PARAM_STR);	
									$stmt1->bindParam(3,$fromlong,PDO::PARAM_STR);	
									$stmt1->bindParam(4,$tolong,PDO::PARAM_STR);	
									$stmt1->bindParam(5,$fromlong,PDO::PARAM_STR);
									$stmt1->bindParam(5,$tolong,PDO::PARAM_STR);	
									$results = $stmt1->fetchAll();
									$count1 = $stmt1->rowcount();
									if($count1==0)
									{
										echo $user['tid'].'<br/>';
									}

								}*/
								
								//$row = $stmt->fetch(PDO::FETCH_ASSOC);

						/*$stmt = execute(array($bdate,$tolong,$fromlong,$tolong,$fromlong));
						if($count > 0)
						{
							while($r=$stmt->fetch(PDO::FETCH_ASSOC))
							{
								echo '<pre>',print_r($r),'</pre>';
							}
						}*/

						//$stmt = $dbhandler->prepare('SELECT * FROM tablebook WHERE  )\
						echo "</tbody></table></div></div></div>";
					}
					else
						header("location:tablebook.php?msg=Reservation must be made for at least 20 mins");
					
				}
				else
					header("location:tablebook.php?msg=Input Proper Timing");
			}

			catch(PDOException $e)
			{
				echo $e->getMessage();
				die("Error");
			}
		}
		else
		{
			header("location:../login.php?msg=Login To Book Table");
		}
	?>
	<!--<br><form action="bookit" method="_POST">
	Book Any of Above Table:
	<input type="text" name="bt"/>
	</form>-->
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">PARADISE CUISINE</h5>
                <p class="grey-text text-lighten-4">By :Kamal Andani<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bansi Kasundra<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Deep Patel</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Site Links</h5>
                <ul>
                	<li><a class="grey-text text-lighten-3" href="home.php">Home</a></li>
                  <li><a class="grey-text text-lighten-3" href="../contactusandfeedback/contact.php">Contact Us</a></li>
                  
                  <li><a class="grey-text text-lighten-3" href="menu1.php">Menu</a></li>
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright  THIS IS US
           
            </div>
          </div>
        </footer>
</body>
</html>