<?php
	require_once '../../includes/connection.php';

	$user=$_GET['Add'];
	
	$UpdateUser = mysqli_query($con,"update userole set Role = 'Dean of student' where ID = '$user'");
	if ($UpdateUser) 
	{
		header("location:registration.php");
		// echo "<script> alert('Successfully added'); </script> .<script>window.location='registration.php'</script>";
		
	}
	else
	{
		echo "<script> alert('Error:2 Dean  is not added'); </script> .<script>window.location='registration.php'</script>";
	}

?>