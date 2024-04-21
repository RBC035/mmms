<?php
		require_once '../../includes/connection.php';
		$userID=$_GET['Ddelete'];

		$del=mysqli_query($con,"delete from loan where 	LoanID='".$userID."' ");
		if (!$del) 
		{
			echo "<script> alert('Loan info isnot deleted'); </script> .<script>window.location='index.php'</script>";
		}
		else
		{
			echo "<script> alert('Succesfully loan info deleted'); </script> .<script>window.location='index.php'</script>";
		}
?>