<?php
		require_once '../../includes/connection.php';
		$userID=$_GET['Ddelete'];

		$del=mysqli_query($con,"delete from event where 	EventID='".$userID."' ");
		if (!$del) 
		{
			echo "<script> alert('Event budget isnot deleted'); </script> .<script>window.location='index.php'</script>";
		}
		else
		{
			echo "<script> alert('Succesfully event budget deleted'); </script> .<script>window.location='minister_loan_event.php'</script>";
		}
?>