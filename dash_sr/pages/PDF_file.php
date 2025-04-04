<?php
	require_once '../../includes/connection.php';
	include '../../includes//fpdf/fpdf.php';
	$user=$_SESSION['username'];
	$dept=mysqli_query($con,"select * from depertment where RegNo ='".$user."'");
	$fet1=mysqli_fetch_array($dept);
	$department=$fet1['DepertmentName'];

	$fpdf = new FPDF();
	$fpdf -> Addpage();
	$fpdf -> SetFont('Times','B',21);
	$fpdf -> Ln(6);
	$fpdf -> SetTextColor(12,24,109);
	$fpdf -> SetFillColor(255,255,255);
	$fpdf -> Cell(193,20,'CHUO CHA KUMBUKUMBU YA MWALIMU NYERERE',0,1,'C',true);
	$fpdf -> Ln(10);

	//second line
	$fpdf -> SetFont('Times','',10);
	$fpdf -> SetTextColor(12,24,109);
	$fpdf -> SetFillColor(255,255,255);
	$fpdf -> Cell(149,5,'Simu +2550242250315');
	$fpdf -> Cell(45,5,'S.L.P  307,',0,1);
	$fpdf -> Cell(149,5,'Tovuti: www.mnma.ac.tz');
	$fpdf -> Cell(45,5,'Zanzibar,',0,1);
	$fpdf -> Cell(149,6,'Barua pepe: mnmaznz@mnma.ac.tz');
	$fpdf -> Cell(45,5,'Tanzania,',0,1);
	$fpdf -> Image('../../icons/Logo.jpg',90,35,30,30);
	$fpdf -> Ln(5);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,'KAMPASI YA KARUME ZANZIBAR',0,2,'C');
	$fpdf -> SetDrawColor(61,181,239);
	$fpdf -> Cell(194,0.5,'','B',2,1);
	$fpdf -> Cell(194,0.5,'','B');
	$fpdf -> Ln(4);

	// third line
	$fpdf -> SetTextColor(0,0,0); $info ='CR REPORT IN '.$department.' DEPARTMENT';
	$fpdf -> Cell(190,8,$info,0,0,'C');
	$fpdf -> Ln(10);

	// header table
	$fpdf -> Ln(5);
	$fpdf -> SetDrawColor(0,0,0);
	$fpdf -> Cell(48,8,'Regnumber',1,0);
	$fpdf -> Cell(28,8,'FirstName',1,0);
	$fpdf -> Cell(28,8,'MiddleName',1,0);
	$fpdf -> Cell(28,8,'LastName',1,0);
	$fpdf -> Cell(30,8,'AcademicYear',1,0);
	$fpdf -> Cell(28,8,'Department',1,0);

	// kupata academic year
	$crsele =mysqli_query($con,"select * from student where RegNo ='".$user."'");
	$crow=mysqli_fetch_array($crsele);
	$ac = $crow['AcademicYear'];

	// kupata program name
	$program = mysqli_query($con,"select * from program where  RegNo ='".$user."'");
	$querypro = mysqli_fetch_array($program); 

	// code to fecth
	$query=mysqli_query($con,"select student .* , program .* from student , program where student.RegNo = program.RegNo && 	ProgramName='".$querypro['ProgramName']."' && StudentStatus='Enable' && Semister = '".$crow['Semister']."' && Level ='".$crow['Level']."'");
	while($row=mysqli_fetch_array($query))
		{
			if ($row['AcademicYear'] === $ac) 
				{

			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','',11);
			$fpdf -> SetTextColor(12,22,102);
			$fpdf -> Cell(48,8,$row['RegNo'],1,0);
			$fpdf -> Cell(28,8,$row['FirstName'],1,0);
			$fpdf -> Cell(28,8,$row['MiddleName'],1,0);
			$fpdf -> Cell(28,8,$row['LastName'],1,0);
			$fpdf -> Cell(30,8,$row['AcademicYear'],1,0);
			$fpdf -> Cell(28,8,$department,1,0);

			}
		}
	$fpdf -> Cell(190,10,''.$fpdf ->PageNo().'',0,0,'C');


	$fpdf ->Output();
?>
