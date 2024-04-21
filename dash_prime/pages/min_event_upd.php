<?php
		require_once '../../includes/connection.php';
		if (isset($_POST['EventChange']))  
	{
		$userID=$_POST['ID'];
		$event=$_POST['event'];
		$query = mysqli_query($con,"update event set EventName ='".$event."' where EventID ='".$userID."'");
		if ($query) 
		{
			echo "<script> alert('Succesfully event change'); </script> .<script>window.location='minister_loan_event.php'</script>";
		}
		else
		{
			echo "<script> alert('Error-> Event is not change'); </script> .<script>window.location='minister_loan_event.php'</script>";
		}
	}
	else
	{
		header("location:index.php");
	}
?>