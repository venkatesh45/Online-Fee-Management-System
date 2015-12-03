<?php
	require('fpdf/fpdf.php');
	// include('db.php');
	// $data=json_decode($_GET['js']);
	// $roll=$_GET['id'];
		 // // echo $data[0];
	 // //create header
	 // $n1=mysqli_query($link,"SELECT * FROM student WHERE id='$roll'");
	 // $n1result=mysqli_fetch_row($n1);
	 // $n2=mysqli_query($link,"SELECT * FROM examresults WHERE id='$roll' and subjectcode='$data[0]'");
	 // $n2result=mysqli_fetch_row($n2);
	 //echo $n1result[5];
	class PDF extends FPDF
	{
		
		function header()
		{
			//Creating LOGO
			$this->Image('images/s.gif',10,6,30);
			$this->SetFont('Times','',11);
			$this->ln(13);
			$this->Cell(30);
			/*$this->ln(13);*/
			$this->Cell(150,10,'GOKARAJU RANGARAJU INSTITUTE OF ENGINEERING AND TECHNOLOGY','','','C');
			$this->Cell(25);
			$this->SetFont('Times','B',11);
			$this->Cell(30,10,'HALL TICKET','',1,'C');
			$this->Cell(60);
			$this->SetFont('Times','',11);
			$this->Cell(80,10,'(Autonomous Institution under JNTU Hyderabad)','','','C');
			$this->Cell(60);
			$this->Cell(40,10,'Original','','1','C');
			$this->Cell(60);
			$this->Cell(80,10,'Bachupally,Kukatpally,Hyderabad-500090','','','C');
			$this->Cell(70);
			//$this->Cell(20,10,$n1result[5],'','1','C');
			//$this->Cell(20,10,'','1','1','C');
			
		}
		
		function putdata()
		{
			include('db.php');
			$data=json_decode($_GET['js']);
			$roll=$_GET['id'];
		 // echo $data[0];
	 //create header
			 $n1=mysqli_query($link,"SELECT * FROM student WHERE id='$roll'");
			 $n1result=mysqli_fetch_row($n1);
			 // $n2=mysqli_query($link,"SELECT * FROM examresults WHERE id='$roll' and subjectcode='$data[0]'");
			 // $n2result=mysqli_fetch_row($n2);
			 $n3=mysqli_query($link,"SELECT * FROM examdates");
			 
			 
			 
			 $this->Cell(20,10,$n1result[5],'','1','C');
			 $this->Cell(70);
			 $this->Cell(20,10,$n1result[5].','.$n1result[6].'Year','','','C');
			 $this->Cell(50,10,',Computer Science Engineering','','1','C');
			 $this->Cell(40);
			 $this->Cell(15,10,'Center :','','','C');
			 $this->Cell(10);
			 $this->Cell(100,10,'Gokaraju Rangaraju Institute Of Engineering And Technology','','','C');
			 $this->Cell(20);
			 $this->SetFont('Times','B','11');
			 $this->Cell(15,10,'H.T.No :','','','C');
			 $this->Cell(10);
			 $this->Cell(22,10,$roll,'','1','C');
			 $this->SetFont('Times','','11');
			 $this->ln(15);
			 
			 //for name and photo
			 $this->Cell(40);
			 $this->Cell(40,10,'1 Name of the Candidate','','','L');
			 $this->Cell(20,10,':','','','R');
			 $this->Cell(20);
			 $this->Cell(40,10,$n1result[0],'','','C');
			 $this->Image('pictures/'.$n1result[10],220,80,30);
			 $this->ln(8);
			 
			 
			 //for father name
			 $this->Cell(40);
			 $this->Cell(40,10,'2 Father`s Name','','','L');
			 $this->Cell(20,10,':','','','R');
			 $this->Cell(20);
			 $this->Cell(40,10,$n1result[4],'','1','C');
			 
			 //Month and year of examination
			 $this->Cell(40);
			 $this->Cell(40,10,'3 Month and Year of Examination','','','L');
			 $this->Cell(20,10,':','','','R');
			 $this->Cell(20);
			 $this->Cell(40,10,'Apr/May 2014','','1','C');
			 
			//Regular Supplementary
			$this->Cell(40);
			 $this->Cell(40,10,'4 Regular/Supplementary','','','L');
			 $this->Cell(20,10,':','','','R');
			 $this->Cell(20);
			 $this->Cell(40,10,'Supplementary','','1','C');
			 $this->ln(5);
			 //list of subjects registered
			 $this->Cell(90);
			 $this->Cell(50,10,'List Of Subjects Registered','','1','C');
			 
			 
			 //printing the subjects
			 for($i=0;$i<count($data);$i++)
			 {
			 $j=$i+1;
			 $n2=mysqli_query($link,"SELECT * FROM examresults WHERE id='$roll' and subjectcode='$data[$i]'");
			 $n2result=mysqli_fetch_row($n2);
			 $n3result=mysqli_fetch_row($n3);
			 $this->Cell(40);
			 $this->Cell(40,10,$j." ".$n2result[2],'','','L');
			 $this->Cell(20);
			 $this->Cell(20,10,$n3result[0],'','1','C');
			 }
		}
	}
	$pdf=new PDF('L');
	$pdf->AddPage();
	$pdf->putdata();
	$pdf->Output();
?>