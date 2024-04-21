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
	$fpdf -> Cell(190,8,'KAMPASI YA KARUME ZANZIBAR',0,2,'C');
	$fpdf -> SetDrawColor(61,181,239);
	$fpdf -> Cell(194,0.5,'','B',2,1);
	$fpdf -> Cell(194,0.5,'','B');
	$fpdf -> Ln(4);

	$userID=$_GET['ID'];

	// to get LeaderID
	$selmin=mysqli_query($con,"select * from minister where MinisterID ='".$userID."'");
	$minrow=mysqli_fetch_array($selmin);
	$leader= $minrow['LeaderID'];

	// to get electedYear and std regno
	$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$leader."'");
	$leaderow=mysqli_fetch_array($seleader);
	$Year= $leaderow['ElectedYear'];
	$stdreg =$leaderow['RegNo'];

	// third line
	$proposal ='The Budget Report of '.$minrow['MinisterPossition'].' In Academic Year '.$Year;
	$fpdf -> SetTextColor(0,0,0);
	$fpdf -> SetFont('Times','B',15);
	$fpdf -> Cell(190,8,$proposal,0,0,'C');
	$fpdf -> Ln(10);

	// to get userinfo 
	$sel=mysqli_query($con,"select * from student where RegNo ='".$stdreg."'");
	$qlsel =mysqli_fetch_array($sel);

	// fouth line
	$am ="I am ".$qlsel['FirstName'].", ".$qlsel['MiddleName'].", ".$qlsel['LastName']." ".$minrow['MinisterPossition']." in academic year ".$leaderow['ElectedYear'].". This is the budget report in ";
	$am1="in ministry  and 75000 Tsh for clothes and shoes. The table bellow show ministry expendicture in ";
	$am2=" maso government. First my own budget as ".$minrow['MinisterPossition']." such 20000 Tsh for bandwidth in order   ";
	$am3 =" to spread infomation about ministry to students, 30000 Tsh for transport for different important event ";
	$am4 ="in academic year.. ".$leaderow['ElectedYear'];
	$fpdf -> Ln(3);
	$fpdf -> SetFont('Times','',12);
	$fpdf -> Cell(190,8,$am,0,2,'C');
	$fpdf -> Cell(190,8,$am2,0,2,'C');
	$fpdf -> Cell(190,8,$am3,0,2,'C');
	$fpdf -> Cell(190,8,$am1,0,2,'C');
	$fpdf -> Cell(190,8,$am4,0,2,'C');

	// overal total
    $ovarl_total = 0;
    // event name
	$no = 1;
	$eventquery = mysqli_query($con,"select * from event where MinisterID='".$userID."' && Estatus= 'RELEASED'");
	while ($fetchev=mysqli_fetch_array($eventquery)) 
		{
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> SetTextColor(0,0,0); $snb = $no.") ";
			$fpdf -> Cell(5,8,$snb,0,0);
			$fpdf -> Cell(65,8,$fetchev['EventName'],0,0);
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

			// over role variable
			$overal = 0;
			$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$userID."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
			if (mysqli_num_rows($query)>0) 
			{
				while($row=mysqli_fetch_array($query))
				{
					$fpdf -> Ln(8);
					$fpdf -> SetFont('Times','',12);
					$fpdf -> SetTextColor(0,0,0);
					$fpdf -> Cell(65,8,$row['Rname'],1,0); 
					$fpdf -> Cell(45,8,$row['Ramount'],1,0);
					$fpdf -> Cell(40,8,$row['Rcost'],1,0);
					$fpdf -> Cell(40,8,$row['EventDate'],1,0);

					$number1 =$row['Ramount'];
					$number2 =$row['Rcost'] ;
					$total =$number1* $number2;
					
					$overal =  $total + $overal ;
				}
			}
			else
			{
				$R0 ="Requirements of this event is not accepted by the Cabinet and Students Representative Parliament (SRP)";
				$fpdf -> Ln(8);
				$fpdf -> SetFont('Times','',12);
				$fpdf -> SetTextColor(0,0,0);
				$fpdf -> Cell(190,8,$R0,1,0); 
			}

			$no = $no +  1;
			$fpdf -> Ln(8);
			$fpdf -> SetFont('Times','B',12);
			$fpdf -> Cell(65,8,'',0,0);
			$fpdf -> Cell(45,8,'',0,0);
			$fpdf -> Cell(40,8,'Total',1,0);
			$fpdf -> Cell(40,8,$overal,1,0);
			$ovarl_total = $overal + $ovarl_total;	
		}
		$Total_cost = $ovarl_total + 20000 + 30000 + 75000;
		$nbd="The Total Proposal Budget in ".$minrow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ".$Total_cost;
		$fpdf -> Ln(15);
		$fpdf -> SetFont('Times','B',12);
		$fpdf -> Cell(190,8,$nbd,0,2);


	$fpdf ->Output();
?>