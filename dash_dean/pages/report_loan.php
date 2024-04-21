<?php
	require_once '../../includes/connection.php';
	include '../../includes//fpdf/fpdf.php';

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
	$fpdf -> Cell(190,8,'KAMPASI YA KARUME',0,2,'C');
	$fpdf -> SetDrawColor(61,181,239);
	$fpdf -> Cell(194,0.5,'','B',2,1);
	$fpdf -> Cell(194,0.5,'','B');
	$fpdf -> Ln(4);

	// third line
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> Cell(190,8,'STUDENT LOAN REPORT IN MASO GOVERNMENT',0,0,'C');
	$fpdf -> Ln(10);

	// header table
	$fpdf -> Ln(5);
	$fpdf -> SetDrawColor(0,0,0);
	$fpdf -> Cell(48,8,'Reg number',1,0);
	$fpdf -> Cell(28,8,'First Name',1,0);
	$fpdf -> Cell(28,8,'Last Name',1,0);
	$fpdf -> Cell(30,8,'Academic Year',1,0);
	$fpdf -> Cell(28,8,'Level',1,0);
	$fpdf -> Cell(28,8,'Category',1,0);

	// code to fecth
	$query=mysqli_query($con,"select student .* , loan .* from student , loan where student.RegNo = loan.RegNo && StudentStatus = 'Enable'");
	if (mysqli_num_rows($query)>0) 
	{
	while($row=mysqli_fetch_array($query))
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','',11);
			$fpdf -> SetTextColor(12,22,102);
			$fpdf -> Cell(48,8,$row['RegNo'],1,0);
			$fpdf -> Cell(28,8,$row['FirstName'],1,0);
			$fpdf -> Cell(28,8,$row['LastName'],1,0);
			$fpdf -> Cell(30,8,$row['AcademicYear'],1,0);
			$fpdf -> Cell(28,8,$row['Level'],1,0);
			$fpdf -> Cell(28,8,$row['LoanCategory'],1,0);
		}
	}
	else
	{
		$fpdf -> Ln(8);
		$fpdf -> SetFont('Times','',11);
		$fpdf -> SetTextColor(12,22,102);
		$fpdf -> Cell(190,8,'There is no data available in this table will it will be released it will apear here..',1,0);
	}
	
	$fpdf -> Cell(190,10,''.$fpdf ->PageNo().'',0,0,'C');



	$fpdf ->Output();

?>