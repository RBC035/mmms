<?php
require_once '../../includes/connection.php';
		$userID=$_GET['Ddelete'];

		$RequirementSelect = mysqli_query($con,"select * from requirement where Rid ='$userID'");
		$RequirementQuery = mysqli_fetch_array($RequirementSelect);
		$event= $RequirementQuery['EventID'];

		$del=mysqli_query($con,"delete from requirement where 	Rid='".$userID."' ");
		if (!$del) 
		{
			echo "<script> alert('Event requirement isnot deleted'); </script> .<script>window.location='view_requirement.php?View=$event'</script>";
		}
		else
		{
			echo "<script> alert('Succesfully requirement deleted'); </script> .<script>window.location='view_requirement.php?View=$event'</script>";
		}
?>