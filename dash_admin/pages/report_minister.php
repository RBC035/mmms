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
		$fpdf -> Cell(284,8,'MINISTERS REPORT IN MASO GOVERNMENT',0,0,'C');
		$fpdf -> Ln(10);

		// header table
		$fpdf -> Ln(5);
		$fpdf -> SetDrawColor(0,0,0);
		//$fpdf -> Cell(43,8,'Reg number',1,0);
		$fpdf -> Cell(53,8,'Full Name',1,0);;
		$fpdf -> Cell(38,8,'PhoneNumber',1,0);
		$fpdf -> Cell(29,8,'ElectedYear',1,0);
		//$fpdf -> Cell(20,8,'Level',1,0);
		//$fpdf -> Cell(22,8,'Status',1,0);
		$fpdf -> Cell(20,8,'Gender',1,0);
		$fpdf -> Cell(60,8,'ProgramName',1,0);
		$fpdf -> Cell(32,8,'Department',1,0);
		$fpdf -> Cell(40,8,'Minister Possition',1,0);

		// to get leader ammount
		$seleader =mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo  && StudentStatus='Enable'");
		while ($leaderow=mysqli_fetch_array($seleader)) 
			{
				$selemini=mysqli_query($con,"select * from minister where LeaderID = '".$leaderow['LeaderID']."' && not MinisterPossition='Prime minister' && MinisterPossition != 'Former Minister of Loan'  && MinisterPossition != 'Former Minister of Health' && MinisterPossition != 'Former Minister of Security' && MinisterPossition != 'Former Minister of Women' && MinisterPossition != 'Former Minister of Finance' && MinisterPossition != 'Former Minister of Education'  && MinisterPossition != 'Former Minister of Information'  && MinisterPossition != 'Former Prime minister'");
				while ($minirow=mysqli_fetch_array($selemini)) 
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',11);
					$fpdf -> SetTextColor(12,22,102);

					$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && LeaderID = '".$leaderow['LeaderID']."' ");
					 while($row=mysqli_fetch_array($query))
					{
						//$fpdf -> Cell(43,8,$row['RegNo'],1,0);
						$fpdf -> Cell(53,8,$row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName'],1,0);
						$fpdf -> Cell(38,8,$row['PhoneNumber'],1,0);
						$fpdf -> Cell(29,8,$row['ElectedYear'],1,0);
						$fpdf -> Cell(20,8,$row['Gender'],1,0);

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
					$fpdf -> Cell(40,8,$minirow['MinisterPossition'],1,0);
				}
			}
	}
	else 
	{
		// third line
		$fpdf -> SetTextColor(0,0,0);
		$fpdf -> Cell(284,8,'FORMER MINISTERS REPORT IN MASO GOVERNMENT',0,0,'C');
		$fpdf -> Ln(10);

		// header table
		$fpdf -> Ln(5);
		$fpdf -> SetDrawColor(0,0,0);
		//$fpdf -> Cell(43,8,'Reg number',1,0);
		$fpdf -> Cell(54,8,'Full Name',1,0);
		$fpdf -> Cell(26,8,'ElectedYear',1,0);
		$fpdf -> Cell(20,8,'Level',1,0);
		// $fpdf -> Cell(46,8,'ProgramName',1,0);
		$fpdf -> Cell(56,8,'Minister Possition',1,0);
		$fpdf -> Cell(24,8,'Start date',1,0);
		$fpdf -> Cell(24,8,'End date',1,0);
		$fpdf -> Cell(48,8,'Duration',1,0);
		$fpdf -> Cell(23,8,'Description',1,0);

		// minister table
		$ministerSelect = mysqli_query($con,"select * from minister where  MinisterPossition !='Prime minister'  &&  MinisterPossition !='Former Prime minister' && MinisterPossition != 'Minister of Loan'  && MinisterPossition != 'Minister of Security'  && MinisterPossition != 'Minister of Health'  && MinisterPossition != 'Minister of Education'  && MinisterPossition != 'Minister of Information'  && MinisterPossition != 'Minister of Women'  && MinisterPossition != 'Minister of Finance'");
		while ($ministerQuery = mysqli_fetch_array($ministerSelect)) 
			{
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',11);
				$fpdf -> SetTextColor(12,22,102);

				$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && StudentStatus='Enable' && LeaderID ='".$ministerQuery['LeaderID']."' ");
				while($row=mysqli_fetch_array($query))
					{
						$fpdf -> Cell(54,8,$row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName'],1,0);
						$fpdf -> Cell(26,8,$row['ElectedYear'],1,0);
						$fpdf -> Cell(20,8,$row['Level'],1,0);
					}
				$fpdf -> Cell(56,8,$ministerQuery['MinisterPossition'],1,0);

				// on duration table
				$DurationSelect =  mysqli_query($con,"select * from duration where LeaderID = '".$ministerQuery['MinisterID']."'");
					while ($DurationQuery = mysqli_fetch_array($DurationSelect)) 
					{
						$fpdf -> Cell(24,8,$DurationQuery['StartDate'],1,0);
						$fpdf -> Cell(24,8,$DurationQuery['EnDate'],1,0);

						$startDate = $DurationQuery['StartDate'];
						$endDate = $DurationQuery['EnDate'];

						$diff = abs(strtotime($endDate)-strtotime($startDate));

						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						$monthDay = $years." Year, ".$months." Month, ".$days." Days";

						$fpdf -> Cell(48,8,$monthDay ,1,0);
						$fpdf -> Cell(23,8,$DurationQuery['Reason'],1,0);
					}
			}
	}
	
	$fpdf -> Cell(190,10,''.$fpdf ->PageNo().'',0,0,'C');



	$fpdf ->Output();

?>