<?php
	require('fpdf/fpdf.php');
	//$pdf=new FPDF('L','mm','A4');
	class PDF extends FPDF
	{
	
		function header()
		{
				include('db.php');
				$num=$_GET['val'];
				$n1=mysqli_query($link,"SELECT * FROM student WHERE id='$num'");
				$n1result=mysqli_fetch_row($n1);
				$this->Image('images/s.gif',10,6,30);
				$this->SetFont('Times','B',18);
				$this->ln(13);
				$this->Cell(30);
				/*$this->ln(13);*/
				$this->Cell(150,10,'REGULAR FEES RECEIPT','','','C');
				$this->Image('pictures/'.$n1result[10],250,50,30);
				$this->ln(30);
				$this->SetFont('Times','',11);
				//
				$this->Cell(40);
				$this->Cell(30,10,'Academic Year','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(30,10,'2013/14','','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'Name','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(30,10,$n1result[0],'','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'Roll no','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(30,10,$n1result[1],'','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'Course & Branch','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(30,10,$n1result[5],'','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'Year & Semester','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(30,10,$n1result[6],'','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'Fee Paid For','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(20,10,'Regular','','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'Total Fee','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				$this->Cell(20,10,'1000/-','','1','C');
				//
				$this->Cell(40);
				$this->Cell(30,10,'NOTE','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','','C');
				//
				$this->Cell(30);
				$this->Cell(30,10,'HALL TICKET WILL BE UPDATED SOON','','','C');
				$this->Cell(20);
				$this->Cell(1,10,':','','1','C');
		}
	}
	$pdf=new PDF('L','mm','A4');
	$pdf->AddPage();
	
	$pdf->Output();
?>