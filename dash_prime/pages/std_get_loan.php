<?php
		require_once '../../includes/connection.php';
		// first select for minister
if ($_SESSION['Status'] === 'Minister of Loan') 
	{
		$userID=$_GET['Add'];
		// to get level of std
		$std =mysqli_query($con,"select * from  student where RegNo ='".$userID."'");
		$level=mysqli_fetch_assoc($std);
		$level['Level'];
		// kuangalia mwanafunzi wa degree pekeake
		if ($level['Level'] != 'Degree') 
		{
			echo "<script> alert('HANA VIGEZO VYA KUPATA MKOPO.'); </script> .<script>window.location='index.php'</script>";
		}
		else
		{
			$seleloan =mysqli_query($con,"select * from loan where RegNo ='".$userID."'");
			$row=mysqli_fetch_assoc($seleloan);
			if (!$row)
			{
				$ins = "insert into loan (RegNo,LoanCategory,Date) values ('$userID','ZHESLB',NOW())";
				$query =mysqli_query($con,$ins);
				if ($query) 
				{
					echo "<script> alert('Succesfully std added.'); </script> .<script>window.location='student_loan.php'</script>";
				}
				else
				{
					echo "<script> alert('Student loan isnot added.'); </script> .<script>window.location='student_loan.php'</script>";
				}
			}
			else
			{
				echo "<script> alert('Student alredady has a loan..'); </script> .<script>window.location='student_loan.php'</script>";
			}
		}
	}
	else
	{
		echo $userID1=$_GET['Add'];
		$value ='Has';
		$upd="update student set HealthInfo='".$value."' where RegNo='".$userID1."'";
		$query=mysqli_query($con,$upd);
		if ($query) 
		{
			echo "<script> alert('Succesfully std added.'); </script> .<script>window.location='student_health.php'</script>";
		}
		else
		{
			echo "<script> alert('Student isnot added.'); </script> .<script>window.location='student_health.php'</script>";
		}

	}

			
?>