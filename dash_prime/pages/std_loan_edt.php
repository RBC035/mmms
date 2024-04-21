<?php
		require_once '../../includes/connection.php';
		$userID=$_GET['Change'];

		$sel=mysqli_query($con,"select * from loan where LoanID='".$userID."' ");
		$row=mysqli_fetch_assoc($sel);
		$row['LoanCategory'];

		// check the specific loan to update
		if ($row['LoanCategory'] != 'HESLB') 
		{
			$upd=mysqli_query($con,"update loan set LoanCategory='HESLB' where LoanID='".$userID."' ");
				if (!$upd) 
				{
					echo "<script> alert('Loan info isnot changed..'); </script> .<script>window.location='student_loan.php'</script>";
				}
				else
				{
					echo "<script> alert('Succesfully loan info changed..'); </script> .<script>window.location='student_loan.php'</script>";
				}
		}
		else
		{
			$upd=mysqli_query($con,"update loan set LoanCategory='ZHESLB' where LoanID='".$userID."' ");
				if (!$upd) 
				{
					echo "<script> alert('Loan info isnot changed..'); </script> .<script>window.location='student_loan.php'</script>";
				}
				else
				{
					echo "<script> alert('Succesfully loan info changed..'); </script> .<script>window.location='student_loan.php'</script>";
				}
		}

?>