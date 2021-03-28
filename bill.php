
<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','BU',20);
$pdf->Cell(180,10,'PARADISE CUISINE',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','IU',15);
$pdf->Cell(180,10,' BILL',0,1,'C');

$pdf->SetFont('Arial','I',15);
$pdf->Ln(5);
$pdf->Cell(30,10,'Item Id',1,0,'C');
$pdf->Cell(30,10,'Quantity',1,0,'C');
$pdf->Cell(30,10,'Price',1,0,'C');
$pdf->Cell(30,10,'Total Price',1);
//$pdf->Cell(60,10,'Order Date',1);
try
{
	session_start();
	$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=phpdata','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt = $dbhandler->prepare('SELECT itemid,quantity,price,total,OrderDate FROM orders Where username=?');
$stmt1 = $dbhandler->prepare('SELECT OrderDate FROM orders ');

		$stmt->bindParam(1, $_SESSION['user'], PDO::PARAM_INT);

		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt1->execute();
		$result1 = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$ttl=0;$d=0;
		if($result)
		{
			
			foreach($stmt->fetchAll() as $row)

							{
								$pdf->SetFont('Arial','',12);	
								
								$datetime1 = new DateTime();
								$datetime2 = new DateTime($row['OrderDate']);
				//				echo $row['OrderDate'] ."<br>";
								$interval = $datetime1->diff($datetime2);
							
							//	$elapsed = $interval->format('%a days %h hours %i minutes');
							//	$dt1=strtotime('$datetime1');
								$dt1=$datetime1->getTimestamp();
								$dt2=$datetime2->getTimestamp();
								$dt3=$dt2-$dt1;
	//							echo "<br><b>dt1=".$dt1."</b><br>";
	//						echo "<i>dt2=". $dt2."</i><br>";
	//					echo "<i>". $dt3."</i><br>";
						//		echo $$datetime2->getTimestamp()-$datetime1->getTimestamp();
							//	$elap=$elapsed-5.30*60;
							//	echo $elapsed ."<br>";
								if($dt3>=19795)
								{
									$dt=$row['OrderDate'];
									$d=$dt;
									$ttl=$ttl+$row['total'];
									$pdf->Ln();
									$pdf->Cell(30,10,$row['itemid'],1,0,'C');
									$pdf->Cell(30,10,$row['quantity'],1,0,'C');
									$pdf->Cell(30,10,$row['price'],1,0,'C');
									$pdf->Cell(30,10,$row['total'],1,0,'C');
								
								}
							}

		}
		if($d==0)
		{
			header("location:menu1.php?msg=NO ITEMS IN CART");
		}
		$pdf->Ln();
		$pdf->Cell(60,10,'Total Amout To be Paid:',1);
		$pdf->Cell(30,10,$ttl,1);
		$pdf->Ln();
	$pdf->Cell(30,10,'Time of Order:',1);
		$pdf->Cell(60,10,$d,1);	
			$pdf->Ln();
		$pdf->Cell(30,10,'Order Given By:');
		$pdf->Cell(30,10,$_SESSION['user']);
		
}
catch(PDOException $e){
	
	}

$pdf->Output();
?>

