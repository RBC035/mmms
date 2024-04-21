<?php
	require_once '../../includes/connection.php';
	
	$sele2021 = mysqli_query($con,"select * from selectedleader where ElectedYear='2020/2021'");
	if (mysqli_num_rows($sele2021)) 
	{
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
		$fpdf -> Cell(190,8,'KAMPASI YA KARUME ZANZIBAR',0,2,'C');
		$fpdf -> SetDrawColor(61,181,239);
		$fpdf -> Cell(194,0.5,'','B',2,1);
		$fpdf -> Cell(194,0.5,'','B');
		$fpdf -> Ln(4);

		// third line
		$leaderow = '2020/2021';
		$proposal ='MASO BUDGET REPORT IN ACADEMIC  YEAR '.$leaderow;
		$fpdf -> SetTextColor(0,0,0);
		$fpdf -> SetFont('Times','B',15);
		$fpdf -> Cell(190,8,$proposal,0,0,'C');
		$fpdf -> Ln(10);

	/* ====================================
	 *	MINISTER OF LOAN BUDGET
	 * ====================================
	*/
		$miniloan = 'i) Minister of loan budget';
		$fpdf -> SetTextColor(0,0,0);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$miniloan,0,0);

		// to get  minister of loan
		$seloan = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Loan'");
		if (mysqli_num_rows($seloan) > 0) 
		{
			$qloan = mysqli_fetch_array($seloan);

		// to get user info from student table
		$loanstd = mysqli_query($con,"select * from student where RegNo= '".$qloan['RegNo']."' ");
		$qlstd = mysqli_fetch_array($loanstd);

		// fouth line
		$am ="I am ".$qlstd['FirstName'].", ".$qlstd['MiddleName'].", ".$qlstd['LastName']." ".$qloan['MinisterPossition']." in academic year ".$leaderow.". This is the budget report in ";
		$am1="in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in ";
		$am2=" maso government. First my own budget as ".$qloan['MinisterPossition']." such 20000 Tsh for bandwidth in order   ";
		$am3 =" to spread infomation about ministry to students, 30000 Tsh for transport for different important event ";
		$am4 ="academic year.. ".$leaderow;
		$fpdf -> Ln(8);
		$fpdf -> SetFont('Times','',12);
		$fpdf -> Cell(190,8,$am,0,2,'C');
		$fpdf -> Cell(190,8,$am2,0,2,'C');
		$fpdf -> Cell(190,8,$am3,0,2,'C');
		$fpdf -> Cell(190,8,$am1,0,2,'C');
		$fpdf -> Cell(190,8,$am4,0,2,'C');

		// loan total overal
		 $LoanTotal = 0;
		 // event name
		$no = 1;
		$loanevent = mysqli_query($con,"select * from event where MinisterID='".$qloan['MinisterID']."' && Estatus= 'RELEASED'");
		while ($loanquery=mysqli_fetch_array($loanevent)) 
			{
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','B',12);
				$fpdf -> SetTextColor(0,0,0); $snb = $no.") ";
				$fpdf -> Cell(5,8,$snb,0,0);
				$fpdf -> Cell(65,8,$loanquery['EventName'],0,0);
				$fpdf -> Ln(4);

				// header table
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','B',13);
				$fpdf -> SetDrawColor(0,0,255);
				$fpdf -> SetTextColor(255,255,255);
				$fpdf -> SetFillColor(0,0,213);
				$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
				$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
				$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
				$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

				// loan over role variable
				$LoanOveral = 0;
				$loanreq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qloan['MinisterID']."' && EventName='".$loanquery['EventName']."' && Rstatus='RELEASED'");
				if (mysqli_num_rows($loanreq)>0) 
				{
					while($lrow=mysqli_fetch_array($loanreq))
					{
						$fpdf -> Ln(8);
						$fpdf -> SetFont('Times','',12);
						$fpdf -> SetTextColor(0,0,0);
						$fpdf -> Cell(65,8,$lrow['Rname'],1,0); 
						$fpdf -> Cell(45,8,$lrow['Ramount'],1,0);
						$fpdf -> Cell(40,8,$lrow['Rcost'],1,0);
						$fpdf -> Cell(40,8,$lrow['EventDate'],1,0);

						$number1 =$lrow['Ramount'];
						$number2 =$lrow['Rcost'] ;
						$total =$number1* $number2;
						
						$LoanOveral =  $total + $LoanOveral ;
					}
				}
				else
				{
					$LR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(190,8,$LR0,1,0); 
				}

				$no = $no +  1;
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','B',12);
				$fpdf -> Cell(65,8,'',0,0);
				$fpdf -> Cell(45,8,'',0,0);
				$fpdf -> Cell(40,8,'Total',1,0);
				$fpdf -> Cell(40,8,$LoanOveral,1,0);

				$LoanTotal = $LoanOveral + $LoanTotal;
			}
			$Total_Loan = $LoanTotal + 20000 + 30000 + 75000;
			$nbd="The Total Budget in ".$qloan['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_Loan;
			$fpdf -> Ln(15);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(190,8,$nbd,0,2);
		}
		else
		{
			echo "<script> alert('MINISTER OF LOAN IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>";
		}

	/* ====================================
	 *	MINISTER OF HEALTH BUDGET
	 * ====================================
	*/
	$minihealth = 'ii) Minister of health budget';
	$fpdf -> Ln(8);
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,$minihealth,0,0);

	// to get  minister of health
	$selehealth = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Health'");
	if (mysqli_num_rows($selehealth)>0) 
	{
		$qhealth = mysqli_fetch_array($selehealth);

	// to get user info from student table
	$healthstd = mysqli_query($con,"select * from student where RegNo= '".$qhealth['RegNo']."' ");
	$qhstd = mysqli_fetch_array($healthstd);

	// fouth line
	$amh ="I am ".$qhstd['FirstName'].", ".$qhstd['MiddleName'].", ".$qhstd['LastName']." ".$qhealth['MinisterPossition']." in academic year ".$leaderow.". This is the budget  ";
	$am1h="event in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in";
	$am2h="report in maso government. First my own budget as ".$qhealth['MinisterPossition']." such 20000 Tsh for bandwidth in ";
	$am3h ="order  to spread infomation about ministry to students, 30000 Tsh for transport for different important ";
	$am4h ="academic year.. ".$leaderow;
	$fpdf -> Ln(8);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$amh,0,2,'C');
	$fpdf -> Cell(190,8,$am2h,0,2,'C');
	$fpdf -> Cell(190,8,$am3h,0,2,'C');
	$fpdf -> Cell(190,8,$am1h,0,2,'C');
	$fpdf -> Cell(190,8,$am4h,0,2,'C');

	// loan total overal
	 $HealthTotal = 0;
	 // event name
	$no1 = 1;
	$health_event = mysqli_query($con,"select * from event where MinisterID='".$qhealth['MinisterID']."' && Estatus= 'RELEASED'");
	while ($health_query=mysqli_fetch_array($health_event)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb1 = $no1.") ";
			$fpdf -> Cell(5,8,$snb1,0,0);
			$fpdf -> Cell(65,8,$health_query['EventName'],0,0);
			$fpdf -> Ln(4);

			// header table
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',13);
			$fpdf -> SetDrawColor(0,0,255);
			$fpdf -> SetTextColor(255,255,255);
			$fpdf -> SetFillColor(0,0,213);
			$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
			$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
			$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
			$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

			// health over role variable
			$HealthOveral = 0;
			$healthreq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qhealth['MinisterID']."' && EventName='".$health_query['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($healthreq)>0) 
			{
				while($hrow=mysqli_fetch_array($healthreq))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$hrow['Rname'],1,0); 
					$fpdf -> Cell(45,8,$hrow['Ramount'],1,0);
					$fpdf -> Cell(40,8,$hrow['Rcost'],1,0);
					$fpdf -> Cell(40,8,$hrow['EventDate'],1,0);

					$number1 =$hrow['Ramount'];
					$number2 =$hrow['Rcost'] ;
					$total =$number1* $number2;
					
					$HealthOveral =  $total + $HealthOveral ;
				}
			}
			else
			{
				$HR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$HR0,1,0);
			}
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$HealthOveral,1,0);
			$no1 = $no1 +  1;
			$HealthTotal = $HealthOveral + $HealthTotal;
		}
		$Total_Health = $HealthTotal + 20000 + 30000 + 75000;
		$nbh="The Total Budget in ".$qhealth['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_Health;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbh,0,2);
	}
	else
	{
		echo "<script> alert('MINISTER OF HEALTH IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>"; 
	}

	/* ====================================
	 *	MINISTER OF INFORMATION BUDGET
	 * ====================================
	*/
	$mininfo = 'iii) Minister of Information, Arts, Culture and Sports budget';
	$fpdf -> Ln(8);
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,$mininfo,0,0);

	// to get  minister of Information,
	$selinfo = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Information'");
	if (mysqli_num_rows($selinfo)>0) 
	{$qinfo = mysqli_fetch_array($selinfo);

	// to get user info from student table
	$infostd = mysqli_query($con,"select * from student where RegNo= '".$qinfo['RegNo']."' ");
	$qinstd = mysqli_fetch_array($infostd);

	// fouth line
	$aminfo ="I am ".$qinstd['FirstName'].", ".$qinstd['MiddleName'].", ".$qinstd['LastName']." ".$qinfo['MinisterPossition']." in academic year ".$leaderow.". This is the budget report";
	$am1i="event in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in";
	$am2i=" in maso government. First my own budget as ".$qinfo['MinisterPossition']." such 20000 Tsh for bandwidth in ";
	$am3i ="order  to spread infomation about ministry to students, 30000 Tsh for transport for different important ";
	$am4i ="academic year.. ".$leaderow;
	$fpdf -> Ln(8);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$aminfo,0,2,'C');
	$fpdf -> Cell(190,8,$am2i,0,2,'C');
	$fpdf -> Cell(190,8,$am3i,0,2,'C');
	$fpdf -> Cell(190,8,$am1i,0,2,'C');
	$fpdf -> Cell(190,8,$am4i,0,2,'C');

	// information total overal
	 $InfoTotal = 0;
	 $no2 = 1;
	 // event name
	 $info_event = mysqli_query($con,"select * from event where MinisterID='".$qinfo['MinisterID']."' && Estatus= 'RELEASED'");
	 while ($info_query=mysqli_fetch_array($info_event)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb2 = $no2.") ";
			$fpdf -> Cell(5,8,$snb2,0,0);
			$fpdf -> Cell(65,8,$info_query['EventName'],0,0);
			$fpdf -> Ln(4);

			// header table
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',13);
			$fpdf -> SetDrawColor(0,0,255);
			$fpdf -> SetTextColor(255,255,255);
			$fpdf -> SetFillColor(0,0,213);
			$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
			$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
			$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
			$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

			// information over role variable
			$InfoOveral = 0;
			$Inforeq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qinfo['MinisterID']."' && EventName='".$info_query['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($Inforeq)>0) 
			{
				while($irow=mysqli_fetch_array($Inforeq))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$irow['Rname'],1,0); 
					$fpdf -> Cell(45,8,$irow['Ramount'],1,0);
					$fpdf -> Cell(40,8,$irow['Rcost'],1,0);
					$fpdf -> Cell(40,8,$irow['EventDate'],1,0);

					$number1 =$irow['Ramount'];
					$number2 =$irow['Rcost'] ;
					$total =$number1* $number2;
					
					$InfoOveral =  $total + $InfoOveral ;
				}
			}
			else
			{
				$IR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$IR0,1,0);
			}
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$InfoOveral,1,0);
			$no2 = $no2 +  1;
			$InfoTotal = $InfoOveral + $InfoTotal;
		}
		$Total_Info = $InfoTotal + 20000 + 30000 + 75000;
		$nbi="The Total Budget in ".$qinfo['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_Info;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbi,0,2);
	}
	else
	{
		echo "<script> alert('MINISTER OF INFORMATION IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>";
	}

		/* ====================================
	 *	MINISTER OF EDUCATION BUDGET
	 * ====================================
	*/
	$minedu = 'iv) Minister of Education';
	$fpdf -> Ln(8);
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,$minedu,0,0);

	// to get  minister of Information,
	$seledu = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Education'");
	if (mysqli_num_rows($seledu)>0) 
	{
		$qedu = mysqli_fetch_array($seledu);

	// to get user info from student table
	$edustd = mysqli_query($con,"select * from student where RegNo= '".$qedu['RegNo']."' ");
	$qedustd = mysqli_fetch_array($edustd);

	// fouth line
	$amedu ="I am ".$qedustd['FirstName'].", ".$qedustd['MiddleName'].", ".$qedustd['LastName']." ".$qedu['MinisterPossition']." in academic year ".$leaderow.". This is the budget ";
	$am1e="event in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in";
	$am2e="report in maso government. First my own budget as ".$qedu['MinisterPossition']." such 20000 Tsh for bandwidth ";
	$am3e ="in order  to spread infomation about ministry to students, 30000 Tsh for transport for different important ";
	$am4e ="academic year.. ".$leaderow;
	$fpdf -> Ln(8);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$amedu,0,2,'C');
	$fpdf -> Cell(190,8,$am2e,0,2,'C');
	$fpdf -> Cell(190,8,$am3e,0,2,'C');
	$fpdf -> Cell(190,8,$am1e,0,2,'C');
	$fpdf -> Cell(190,8,$am4e,0,2,'C');

	// education total overal
	 $EduTotal = 0;
	 $no3 = 1;
	 // event name
	  $edu_event = mysqli_query($con,"select * from event where MinisterID='".$qedu['MinisterID']."' && Estatus= 'RELEASED'");
	  while ($edu_query=mysqli_fetch_array($edu_event)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb3 = $no3.") ";
			$fpdf -> Cell(5,8,$snb3,0,0);
			$fpdf -> Cell(65,8,$edu_query['EventName'],0,0);
			$fpdf -> Ln(4);

			// header table
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',13);
			$fpdf -> SetDrawColor(0,0,255);
			$fpdf -> SetTextColor(255,255,255);
			$fpdf -> SetFillColor(0,0,213);
			$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
			$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
			$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
			$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

			// education over role variable
			$EduOveral = 0;
			$edureq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qedu['MinisterID']."' && EventName='".$edu_query['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($edureq)>0) 
			{
				while($erow=mysqli_fetch_array($edureq))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$erow['Rname'],1,0); 
					$fpdf -> Cell(45,8,$erow['Ramount'],1,0);
					$fpdf -> Cell(40,8,$erow['Rcost'],1,0);
					$fpdf -> Cell(40,8,$erow['EventDate'],1,0);

					$number1 =$erow['Ramount'];
					$number2 =$erow['Rcost'] ;
					$total =$number1* $number2;
					
					$EduOveral =  $total + $EduOveral ;
				}
			}
			else
			{
				$IR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$IR0,1,0);
			}
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$EduOveral,1,0);
			$no3 = $no3 +  1;
			$EduTotal = $EduOveral + $EduTotal;
		}
		$Total_Edu = $EduTotal + 20000 + 30000 + 75000;
		$nbe="The Total Budget in ".$qedu['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_Edu;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbe,0,2);
	}
	else
	{
		echo "<script> alert('MINISTER OF EDUCATION IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>";
	}

	/* ====================================
	 *	MINISTER OF SECURITY BUDGET
	 * ====================================
	*/
	$minisecu = 'v) Minister of Security';
	$fpdf -> Ln(8);
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,$minisecu,0,0);

	// to get  minister of Information,
	$selesecu = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Security'");
	if (mysqli_num_rows($selesecu)>0) 
	{
		$qsecu = mysqli_fetch_array($selesecu);

	// to get user info from student table
	$secustd = mysqli_query($con,"select * from student where RegNo= '".$qsecu['RegNo']."' ");
	$qsecustd = mysqli_fetch_array($secustd);

	// fouth line
	$amsecu ="I am ".$qsecustd['FirstName'].", ".$qsecustd['MiddleName'].", ".$qsecustd['LastName']." ".$qsecu['MinisterPossition']." in academic year ".$leaderow.". This is the budget ";
	$am1e="event in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in";
	$am2e="report in maso government. First my own budget as ".$qsecu['MinisterPossition']." such 20000 Tsh for bandwidth ";
	$am3e ="in order  to spread infomation about ministry to students, 30000 Tsh for transport for different important ";
	$am4e ="academic year.. ".$leaderow;
	$fpdf -> Ln(8);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$amsecu,0,2,'C');
	$fpdf -> Cell(190,8,$am2e,0,2,'C');
	$fpdf -> Cell(190,8,$am3e,0,2,'C');
	$fpdf -> Cell(190,8,$am1e,0,2,'C');
	$fpdf -> Cell(190,8,$am4e,0,2,'C');

	 $SecuTotal = 0;
	 $no4 = 1;
	 // event name
	  $secu_event = mysqli_query($con,"select * from event where MinisterID='".$qsecu['MinisterID']."' && Estatus= 'RELEASED'");
	  while ($secu_query=mysqli_fetch_array($secu_event)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb4 = $no4.") ";
			$fpdf -> Cell(5,8,$snb4,0,0);
			$fpdf -> Cell(65,8,$secu_query['EventName'],0,0);
			$fpdf -> Ln(4);

			// header table
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',13);
			$fpdf -> SetDrawColor(0,0,255);
			$fpdf -> SetTextColor(255,255,255);
			$fpdf -> SetFillColor(0,0,213);
			$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
			$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
			$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
			$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

			// security over role variable
			$SecuOveral = 0;
			$secureq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qsecu['MinisterID']."' && EventName='".$secu_query['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($secureq)>0) 
			{
				while($srow=mysqli_fetch_array($secureq))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$srow['Rname'],1,0); 
					$fpdf -> Cell(45,8,$srow['Ramount'],1,0);
					$fpdf -> Cell(40,8,$srow['Rcost'],1,0);
					$fpdf -> Cell(40,8,$srow['EventDate'],1,0);

					$number1 =$srow['Ramount'];
					$number2 =$srow['Rcost'] ;
					$total =$number1* $number2;
					
					$SecuOveral =  $total + $SecuOveral ;
				}
			}
			else
			{
				$IR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$IR0,1,0);
			}
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$SecuOveral,1,0);
			$no4 = $no4 +  1;
			$SecuTotal = $SecuOveral + $SecuTotal;
		}
		$Total_Secu = $SecuTotal + 20000 + 30000 + 75000;
		$nbse="The Total Budget in ".$qsecu['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_Secu;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbse,0,2);
	}
	else
	{
		echo "<script> alert('MINISTER OF SECURITY IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>";
	}

	/* ====================================
	 *	MINISTER OF WOMEN BUDGET
	 * ====================================
	*/
	$miniwe = 'vi) Minister of Women';
	$fpdf -> Ln(8);
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,$miniwe,0,0);

	// to get  minister of Information,
	$selewe = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Women'");
	if (mysqli_num_rows($selewe)>0) 
	{
		$qwemo = mysqli_fetch_array($selewe);

	// to get user info from student table
	$womestd = mysqli_query($con,"select * from student where RegNo= '".$qwemo['RegNo']."' ");
	$qwomestd = mysqli_fetch_array($womestd);

	// fouth line
	$amwomen ="I am ".$qwomestd['FirstName'].", ".$qwomestd['MiddleName'].", ".$qwomestd['LastName']." ".$qwemo['MinisterPossition']." in academic year ".$leaderow.". This is the budget ";
	$am1e="event in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in";
	$am2e="report in maso government. First my own budget as ".$qwemo['MinisterPossition']." such 20000 Tsh for bandwidth ";
	$am3e ="in order  to spread infomation about ministry to students, 30000 Tsh for transport for different important ";
	$am4e ="academic year.. ".$leaderow;
	$fpdf -> Ln(8);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$amwomen,0,2,'C');
	$fpdf -> Cell(190,8,$am2e,0,2,'C');
	$fpdf -> Cell(190,8,$am3e,0,2,'C');
	$fpdf -> Cell(190,8,$am1e,0,2,'C');
	$fpdf -> Cell(190,8,$am4e,0,2,'C');

	$WomenTotal = 0;
	 $no5 = 1;
	 // event name
	  $women_event = mysqli_query($con,"select * from event where MinisterID='".$qwemo['MinisterID']."' && Estatus= 'RELEASED'");
	  while ($women_query=mysqli_fetch_array($women_event)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb5 = $no5.") ";
			$fpdf -> Cell(5,8,$snb5,0,0);
			$fpdf -> Cell(65,8,$women_query['EventName'],0,0);
			$fpdf -> Ln(4);

			// header table
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',13);
			$fpdf -> SetDrawColor(0,0,255);
			$fpdf -> SetTextColor(255,255,255);
			$fpdf -> SetFillColor(0,0,213);
			$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
			$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
			$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
			$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

			// security over role variable
			$WomenOveral = 0;
			$womenreq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qwemo['MinisterID']."' && EventName='".$women_query['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($womenreq)>0) 
			{
				while($wrow=mysqli_fetch_array($womenreq))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$wrow['Rname'],1,0); 
					$fpdf -> Cell(45,8,$wrow['Ramount'],1,0);
					$fpdf -> Cell(40,8,$wrow['Rcost'],1,0);
					$fpdf -> Cell(40,8,$wrow['EventDate'],1,0);

					$number1 =$wrow['Ramount'];
					$number2 =$wrow['Rcost'] ;
					$total =$number1* $number2;
					
					$WomenOveral =  $total + $WomenOveral ;
				}
			}
			else
			{
				$IR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$IR0,1,0);
			}
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$WomenOveral,1,0);
			$no5 = $no5 +  1;
			$WomenTotal = $WomenOveral + $WomenTotal;
		}
		$Total_Women = $WomenTotal + 20000 + 30000 + 75000;
		$nbwo="The Total Budget in ".$qwemo['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_Women;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbwo,0,2);
	}
	else
	{
		echo "<script> alert('MINISTER OF WOMEN IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>";
	}

	/* ====================================
	 *	MINISTER OF FINANCE BUDGET
	 * ====================================
	*/
	$minife = 'vii) Minister of Finance';
	$fpdf -> Ln(8);
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',12);
	$fpdf -> Cell(190,8,$minife,0,0);

	// to get  minister of Information,
	$selefine = mysqli_query($con,"select selectedleader .* , minister .* from selectedleader , minister where selectedleader.LeaderID = minister.LeaderID && ElectedYear ='".$leaderow."' && 	MinisterPossition ='Minister of Finance'");
	if (mysqli_num_rows($selefine)>0) 
	{
		$qfine = mysqli_fetch_array($selefine);

	// to get user info from student table
	$finestd = mysqli_query($con,"select * from student where RegNo= '".$qfine['RegNo']."' ");
	$qfinestd = mysqli_fetch_array($finestd);

	// fouth line
	$finance ="I am ".$qfinestd['FirstName'].", ".$qfinestd['MiddleName'].", ".$qfinestd['LastName']." ".$qfine['MinisterPossition']." in academic year ".$leaderow.". This is the budget ";
	$am1e="event in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in";
	$am2e="report in maso government. First my own budget as ".$qfine['MinisterPossition']." such 20000 Tsh for bandwidth ";
	$am3e ="in order  to spread infomation about ministry to students, 30000 Tsh for transport for different important ";
	$am4e ="academic year.. ".$leaderow;
	$fpdf -> Ln(8);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$finance,0,2,'C');
	$fpdf -> Cell(190,8,$am2e,0,2,'C');
	$fpdf -> Cell(190,8,$am3e,0,2,'C');
	$fpdf -> Cell(190,8,$am1e,0,2,'C');
	$fpdf -> Cell(190,8,$am4e,0,2,'C');

	$FinanceTotal = 0;
	 $no6 = 1;
	  // event name
	  $finance_event = mysqli_query($con,"select * from event where MinisterID='".$qfine['MinisterID']."' && Estatus= 'RELEASED'");
	  while ($finance_query=mysqli_fetch_array($finance_event)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb5 = $no5.") ";
			$fpdf -> Cell(5,8,$snb5,0,0);
			$fpdf -> Cell(65,8,$finance_query['EventName'],0,0);
			$fpdf -> Ln(4);

			// header table
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',13);
			$fpdf -> SetDrawColor(0,0,255);
			$fpdf -> SetTextColor(255,255,255);
			$fpdf -> SetFillColor(0,0,213);
			$fpdf -> Cell(65,8,'RequirementName',1,0,'C',true);
			$fpdf -> Cell(45,8,'RequirementAmount',1,0,'C',true);
			$fpdf -> Cell(40,8,'RequirementCost',1,0,'C',true);
			$fpdf -> Cell(40,8,'EventAddeDate',1,0,'C',true);

			// security over role variable
			$FinanceOveral = 0;
			$finereq=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$qfine['MinisterID']."' && EventName='".$finance_query['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($finereq)>0) 
			{
				while($frow=mysqli_fetch_array($finereq))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$frow['Rname'],1,0); 
					$fpdf -> Cell(45,8,$frow['Ramount'],1,0);
					$fpdf -> Cell(40,8,$frow['Rcost'],1,0);
					$fpdf -> Cell(40,8,$frow['EventDate'],1,0);

					$number1 =$frow['Ramount'];
					$number2 =$frow['Rcost'] ;
					$total =$number1* $number2;
					
					$FinanceOveral =  $total + $FinanceOveral ;
				}
			}
			else
			{
				$IR0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$IR0,1,0);
			}
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$FinanceOveral,1,0);
			$no4 = $no4 +  1;
			$FinanceTotal = $FinanceOveral + $FinanceTotal;
		}
		$Total_finance = $FinanceTotal + 20000 + 30000 + 75000;
		$nbfine="The Total Budget in ".$qfine['MinisterPossition']." in academic yaer ".$leaderow." is ".$Total_finance;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbfine,0,2);
	}
	else
	{
		echo "<script> alert('MINISTER OF FINANCE IS NOT SELECTED YET'); </script> .<script>window.location='index.php'</script>";
	}

		// total budget 
		$TotalBudget = $Total_Loan + $Total_Health + $Total_Info + $Total_Edu + $Total_Secu + $Total_Women + $Total_finance;

		$totalbg="The total budget of all ministry in maso government in academic year ".$leaderow." is ".$TotalBudget." Tsh.";
		$fpdf -> Ln(10);
		$fpdf -> SetFont('Times','B',13);
		$fpdf -> Cell(190,8,$totalbg,0,2);

		$sign ="Signature............................";
		$fpdf -> Ln(10);
		$fpdf -> SetFont('Times','B',13);
		$fpdf -> Cell(190,8,$sign,0,2);


		$fpdf ->Output();
	}
	else
	{
		echo "<script> alert('LEADERS ARE NOT SELECTED IN THIS ACADEMIC YEAR'); </script> .<script>window.location='index.php'</script>";
	}


?>