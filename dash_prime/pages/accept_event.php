<?php 
	require_once '../../includes/connection.php';
	$userID = $_GET['Accept'];

	$query = mysqli_query($con,"update event set Estatus ='RELEASED' where EventID ='".$userID."'");
	if ($query)
	 {
		header("location:minister_accepetd_event.php");
	}
	else
	{
		echo "<script> alert('Error: Event status doesn't change in accepted'); </script> .<script>window.location='minister_accepetd_event.php'</script>";
	}
 ?>