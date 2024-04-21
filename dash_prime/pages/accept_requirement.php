<?php 
	require_once '../../includes/connection.php';
	$userID = $_GET['Accept'];

	$RequirementSelect = mysqli_query($con,"select * from requirement where Rid ='$userID'");
	$RequirementQuery = mysqli_fetch_array($RequirementSelect);
	$accepted = $RequirementQuery ['EventID'];

	$query = mysqli_query($con,"update  requirement set Rstatus ='RELEASED' where Rid ='".$userID."'");
	if ($query)
	 {
		header("location:view_accept_requirement.php?View=$accepted");
		// header("location:minister_accepetd_event.php");
	}
	else
	{
		 echo "<script> alert('Error: Requirement status doesn't change in accepted'); </script> .<script>window.location='view_accept_requirement.php?View=$accepted'</script>";
		//echo "<script> alert('Error: Event status doesn't change in accepted'); </script> .<script>window.location='minister_accepetd_event.php'</script>";
	}
 ?>