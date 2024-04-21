<?php
	require_once '../../includes/connection.php';
	include '../../includes//fpdf/fpdf.php';

	$fpdf = new FPDF();
	$fpdf -> Addpage('','A3');
	$fpdf -> SetFont('Times','B',21);
	$fpdf -> Ln(6);
	$fpdf -> SetTextColor(12,24,109);
	$fpdf -> SetFillColor(255,255,255);
	$fpdf -> Cell(193,20,'THE MWALIMU NYERERE MEMORIAL ACADEMY STUDENT ORGANIZATION',0,1,'',true);
	$fpdf -> Ln(10);

	//second line
	$fpdf -> SetFont('Times','',10);
	$fpdf -> SetTextColor(12,24,109);
	$fpdf -> SetFillColor(255,255,255);
	$fpdf -> Cell(250,5,'Simu +2550242250315');
	$fpdf -> Cell(45,5,'S.L.P  307,',0,1);
	$fpdf -> Cell(250,5,'Tovuti: www.mnma.ac.tz');
	$fpdf -> Cell(45,5,'Zanzibar,',0,1);
	$fpdf -> Cell(250,6,'Barua pepe: mnmaznz@mnma.ac.tz');
	$fpdf -> Cell(45,5,'Tanzania,',0,1);
	$fpdf -> Image('../../icons/Logo.jpg',136,35,32,32);
	$fpdf -> Ln(5);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(283,8,'KAMPASI YA KARUME ZANZIBAR',0,2,'C');
	$fpdf -> SetDrawColor(61,181,239);
	$fpdf -> Cell(276,0.5,'','B',2,1);
	$fpdf -> Cell(276,0.5,'','B');
	$fpdf -> Ln(4);

	$getID = $_GET['ID'];
	if ($getID == 0) 
	{
		// third line
		$fpdf -> SetTextColor(0,0,0);
		$fpdf -> Cell(284,8,'PRESIDENT REPORT IN MASO GOVERNMENT',0,0,'C');
		$fpdf -> Ln(10);

		// header table
		$fpdf -> Ln(5);
		$fpdf -> SetDrawColor(0,0,0);
		//$fpdf -> Cell(43,8,'Reg number',1,0);
		$fpdf -> Cell(26,8,'First Name',1,0);
		$fpdf -> Cell(30,8,'Middle Name',1,0);
		$fpdf -> Cell(25,8,'Last Name',1,0);
		$fpdf -> Cell(35,8,'PhoneNumber',1,0);
		$fpdf -> Cell(27,8,'ElectedYear',1,0);
		$fpdf -> Cell(20,8,'Level',1,0);
		$fpdf -> Cell(22,8,'Status',1,0);
		$fpdf -> Cell(60,8,'ProgramName',1,0);
		$fpdf -> Cell(32,8,'Department',1,0);

		// code to fecth
		$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && Possition='President' &&  StudentStatus='Enable'");
		while($row=mysqli_fetch_array($query))
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','',11);
			$fpdf -> SetTextColor(12,22,102);
			//$fpdf -> Cell(43,8,$row['RegNo'],1,0);
			$fpdf -> Cell(26,8,$row['FirstName'],1,0);
			$fpdf -> Cell(30,8,$row['MiddleName'],1,0);
			$fpdf -> Cell(25,8,$row['LastName'],1,0);
			$fpdf -> Cell(35,8,$row['PhoneNumber'],1,0);
			$fpdf -> Cell(27,8,$row['ElectedYear'],1,0);
			$fpdf -> Cell(20,8,$row['Level'],1,0);
			$fpdf -> Cell(22,8,$row['Status'],1,0);

			//to find program
			$sel=mysqli_query($con,"select * from program where RegNo = '".$row['RegNo']."' ");
			while ($prow=mysqli_fetch_array($sel)) 
			{
				$fpdf -> Cell(60,8,$prow['ProgramName'],1,0);
			}
			//to find department
			$select=mysqli_query($con,"select * from depertment where RegNo = '".$row['RegNo']."' ");
			while ($dprow=mysqli_fetch_array($select)) 
			{
				$fpdf -> Cell(32,8,$dprow['DepertmentName'],1,0);
			}
		}
	}
	else 
	{
		// third line
		$fpdf -> SetTextColor(0,0,0);
		$fpdf -> Cell(284,8,'FORMER PRESIDENT REPORT IN MASO GOVERNMENT',0,0,'C');
		$fpdf -> Ln(10);

		// header table
		$fpdf -> Ln(5);
		$fpdf -> SetDrawColor(0,0,0);
		//$fpdf -> Cell(43,8,'Reg number',1,0);
		$fpdf -> Cell(51,8,'Full Name',1,0);
		$fpdf -> Cell(26,8,'ElectedYear',1,0);
		$fpdf -> Cell(20,8,'Level',1,0);
		$fpdf -> Cell(50,8,'ProgramName',1,0);
		// $fpdf -> Cell(30,8,'Department',1,0);
		$fpdf -> Cell(24,8,'Start date',1,0);
		$fpdf -> Cell(24,8,'End date',1,0);
		$fpdf -> Cell(50,8,'Duration',1,0);
		$fpdf -> Cell(25,8,'Description',1,0);

		// code to fecth
		$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && Possition ='Former President' &&  StudentStatus='Enable'");
		if (mysqli_num_rows($query)>0) 
		{
			while ($row= mysqli_fetch_array($query)) 
			{
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',11);
				$fpdf -> SetTextColor(12,22,102);

				$fpdf -> Cell(51,8,$row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName'],1,0);
				$fpdf -> Cell(26,8,$row['ElectedYear'],1,0);
				$fpdf -> Cell(20,8,$row['Level'],1,0);

				$programSelect = mysqli_query($con,"select * from program where RegNo = '".$row['RegNo']."'");
					while ($programQuery = mysqli_fetch_array($programSelect)) 
						{
							$fpdf -> Cell(50,8,$programQuery['ProgramName'],1,0);
						}

				$departmentSelect = mysqli_query($con,"select * from depertment where RegNo = '".$row['RegNo']."'");
					while ($departmentQuery = mysqli_fetch_array($departmentSelect)) 
						{
							 // $fpdf -> Cell(30,8,$departmentQuery['DepertmentName'],1,0);
						}

				$DurationSelect = mysqli_query($con,"select * from duration where Reason != 'Continue' && LeaderID ='".$row['LeaderID']."'");
				while ($DurationQuery = mysqli_fetch_array($DurationSelect)) 
					{
						$startDate = $DurationQuery['StartDate'];
						$endDate = $DurationQuery['EnDate'];

						$diff = abs(strtotime($endDate)-strtotime($startDate));

						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

						$monthDay = $years." Year, ".$months." Month, ".$days." Days";
						$fpdf -> Cell(24,8,$startDate,1,0);
						$fpdf -> Cell(24,8,$endDate,1,0);
						$fpdf -> Cell(50,8,$monthDay ,1,0);
						$fpdf -> Cell(25,8,$DurationQuery['Reason'],1,0);
					}
			}
		}
		else
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','',11);
			$fpdf -> SetTextColor(12,22,102);
			$fpdf -> Cell(270,8,'There is not data available in this table while will be released will apear here.................',1,0);
		}
	}
	
	$fpdf -> Cell(190,10,''.$fpdf ->PageNo().'',0,0,'C');



	$fpdf ->Output();

?>