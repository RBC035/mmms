<?php
	require_once '../../includes/connection.php';

	$userID=$_SESSION['username'];

	// to get leaderID
	$seleader=mysqli_query($con,"select * from selectedleader where RegNo ='".$userID."'");
	$leaderow=mysqli_fetch_array($seleader);
	$leader= $leaderow['LeaderID'];

	// to get ministerID
	$selmin=mysqli_query($con,"select * from minister where LeaderID ='".$leader."'");
	$minrow=mysqli_fetch_array($selmin);
	$mini= $minrow['MinisterID'];
	if (isset($_POST['EventName'])) 
		{
			if (!empty($_POST['eventID'])) 
			{
				$event=$_POST['eventID'];
				$ins="insert into event (MinisterID,EventName,EventDate,Estatus) values ('$mini','$event',NOW(),'BLOCK')";
				$query =mysqli_query($con,$ins);
				if ($query) 
				{
					$eventName =mysqli_query($con,"select * from event order by EventID desc limit 1");
					$Erow = mysqli_fetch_array($eventName);
					$ID = $Erow['EventID'];
					//header("location:minister_loan_event.php");
					header("location:add_requirement.php?Add=$ID");
				}
				else
				{
					echo "<script> alert('Error: event wasnot added..'); </script> .<script>window.location='minister_loan_event.php'</script>";
				}
			}
			else
			{
				echo "<script> alert('Please enter event name....!'); </script> .<script>window.location='index.php'</script>";
			}
		}
		if (isset($_POST['requirement'])) 
		{
			$requirement=$_POST['requirementID'];
			$eventID=$_POST['ID'];
			$cost=$_POST['ammount'];
			$number=$_POST['kiwango'];

			if ($number > 0) /*&&  ($number !='-1') &&  ($number !='-2') &&  ($number !='-3') &&  ($number !='-4') &&  ($number !='-5')  &&  ($number !='e') &&  ($number !='-6') &&  ($number !='-7') &&  ($number !='-8') &&  ($number !='-9') &&  ($number !='-10') &&  ($number !='-11') &&  ($number !='-12') &&  ($number !='-13') &&  ($number !='-14') &&  ($number !='-15') &&  ($number !='-16') &&  ($number !='-17') &&  ($number !='-18') &&  ($number !='-19') &&  ($number !='-20')  &&  ($number !='-21') &&  ($number !='-22')  &&  ($number !='-23') &&  ($number !='-24')  &&  ($number !='-25') &&  ($number !='-26')  &&  ($number !='-27') &&  ($number !='-28')  &&  ($number !='-29') &&  ($number !='-30')) */
			{
				$ins = mysqli_query($con,"insert into requirement (EventID,Rname,Rcost,Ramount,Rstatus) values ('$eventID','$requirement','$cost','$number','BLOCK')");
				if ($ins)
				{
					//echo "<script> alert('Succesfully requirement added ...!'); </script> .<script>window.location='view_requirement.php'</script>";
					header("location:view_requirement.php?View=$eventID");
				} 
				else
				{
					echo "<script> alert('Error: requirement is not added ...!'); </script> .<script>window.location='minister_loan_event.php'</script>";
				}
			}
			else
			{
				header("location:add_requirement.php?number= 0");
			}

		}
		else
		{
			echo "next one";
		}

?>