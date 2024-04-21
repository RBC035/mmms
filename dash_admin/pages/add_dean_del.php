<?php
	require_once '../../includes/connection.php';

	$user=$_GET['Ddelete'];
	
	$UpdateUser = mysqli_query($con,"update userole set Role = 'Former Dean of student' where ID = '$user'");
	if ($UpdateUser) 
	{
		// echo "<script> alert('Successfully deleted'); </script> .<script>window.location='registration.php'</script>";
		header("location:registration.php");
	}
	else
	{
		echo "<script> alert('Error:2 Dean  is not deleted'); </script> .<script>window.location='registration.php'</script>";
	}

?>