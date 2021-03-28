<!DOCTYPE html>
<html>
<head>
	<title>Check Tabs</title>
</head>
<body>
	<center><img src="table.jpg" height="350px" width="1000px"></center>
	<?php
		session_start();
		try
		{
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpproject','root','');
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

			if($tolong>$fromlong)
			{
				if($tolong-$fromlong>=60*60*20)
				{
					if(isset($_GET['msg']))
					{
						echo $_GET['msg'];
					}
					else
					{
						echo "Available tables at your timing:<br/><br><br>";
					}

					$sql="CREATE TABLE IF NOT EXISTS booktable(
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
					name VARCHAR(30),
					tid VARCHAR(20) NOT NULL,
					booking_date VARCHAR(20),
					start_time VARCHAR(20),
					starttime_long BIGINT(20),
					end_time VARCHAR(20),
					endtime_long BIGINT(20),
					mobile_no BIGINT(10))";

					$dbhandler->exec($sql);

						/*$sl = "INSERT into booktable(name,tid,maxperson,booking_date,start_time,starttime_long,end_time,endtime_long,mobile_no) values('$nm','2A','2','$bdate','$from','$fromlong','$to','$tolong','8141744452')";
						$q= $dbhandler->query($sl);*/

					$stmt = $dbhandler->query("SELECT * from tableinfo");
					$users =$stmt->fetchAll();
					$stmt1 = $dbhandler->query("SELECT * from booktable");
					$results = $stmt1->fetchAll();
					$count = $stmt1->rowcount();
					$b=1;
					echo "<table border='1'>";
					if($count>0)
					{
						foreach ($users as $user) {
							$b=1;
							foreach ($results as $res) {
								//if($user['tid']==$res['tid'] and $res['booking_date']==$bdate and ($res['starttime_long']>$fromlong and $res['starttime_long']<$tolong) and ($res['endtime_long']>$fromlong and $res['endtime_long']<$tolong))
								
									if($user['tid']==$res['tid'] and $res['maxperson']!=$count and $res['booking_date']==$bdate and(($fromlong>=$res['starttime_long'] and $fromlong<=$res['endtime_long']) or ($tolong>=$res['starttime_long'] and $tolong<=$res['endtime_long']) or ($fromlong<=$res['starttime_long'] and $tolong>=$res['endtime_long'])))
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
							echo "<tr><td><form action='bookit' method='POST'>".$user['tid']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type='Submit' value='Book Now'/></td></tr>";
							
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

					//$stmt = $dbhandler->prepare('SELECT * FROM tablebook WHERE  )
					echo "<br>
				<center><a href='tablebook.php'>Go Back</a></center>";
				}
				else
					header("location:tablebook.php?msg=Reservations must be for at least 20 mins!");
			}
			else
				header("location:tablebook.php?msg=Input Proper Timing");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			die("Error");
		}
	?>
	<!--<br><form action="bookit" method="_POST">
	Book Any of Above Table:
	<input type="text" name="bt"/>
	</form>-->
</body>
</html>