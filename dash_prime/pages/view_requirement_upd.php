<?php
require_once '../../includes/connection.php';
	if (isset($_POST['Requirement'])) 
	{
		$userID=$_POST['ID'];
		$requirement=$_POST['requirementID'];
		$cost=$_POST['ammount'];
		$number=$_POST['kiwango'];
		$event=$_POST['Event'];


		/*if (($number != '0') &&  ($number !='-1') &&  ($number !='-2') &&  ($number !='-3') &&  ($number !='-4') &&  ($number !='-5') &&  ($number !='-6') &&  ($number !='-7') &&  ($number !='-8') &&  ($number !='-9') &&  ($number !='-10') &&  ($number !='-11') &&  ($number !='-12') &&  ($number !='-13') &&  ($number !='-14') &&  ($number !='-15') &&  ($number !='-16') &&  ($number !='-17') &&  ($number !='-18') &&  ($number !='-19') &&  ($number !='-20')  &&  ($number !='-21') &&  ($number !='-22')  &&  ($number !='-23') &&  ($number !='-24')  &&  ($number !='-25') &&  ($number !='-26')  &&  ($number !='-27') &&  ($number !='-28')  &&  ($number !='-29') &&  ($number !='-30'))*/
		if ($number > 0)
		{
			$upd = "update requirement set Rname='".$requirement."', Rcost='".$cost."', 	Ramount='".$number."' where Rid='".$userID."'";
			$query=mysqli_query($con,$upd);
			if ($query) 
			{
				// echo "<script> alert('Succesfully requirement change'); </script> .<script>window.location='minister_loan_event.php?View=$event'</script>";
				echo "<script> alert('Succesfully requirement change'); </script> .<script>window.location='view_requirement.php?View=$event'</script>";
			}
			else
			{
				echo "<script> alert('Error: requirement is not  change'); </script> .<script>window.location='minister_loan_event.php'</script>";
			}
		}
		else
		{
		 	echo "<script> alert('Amount can`t start with 0 or negtive number'); </script> .<script>window.location='minister_loan_event.php'</script>";
		 }

	}
	else
	{
		header("location:index.php");
	}
?>