<?php
	require_once '../../includes/connection.php';
	$user=$_GET['Ddelete'];

	$dele="delete from depertment where RegNo='".$user."'";
	$query=mysqli_query($con,$dele);
		if ($query) 
		{
			echo "<script> alert('Successfully deleted'); </script> .<script>window.location='student.php'</script>";
		}
		else
		{
			echo "<script> alert('Error:3 Department is not deleted'); </script> .<script>window.location='student.php'</script>";

		}
?>