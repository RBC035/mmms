<?php 
	require_once '../../includes/connection.php';
	$userID = $_GET['Reject'];
	$query = mysqli_query($con,"update event set Estatus ='BLOCK' where EventID ='".$userID."'");
	if ($query)
	 {
		header("location:minister_accepetd_event.php");
	}
	else
	{
		echo "<script> alert('Error: Event status doesn't change in rejected'); </script> .<script>window.location='minister_accepetd_event.php'</script>";
	}
 ?>