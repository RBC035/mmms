<?php
	require_once '../../includes/connection.php';

	$DepartmentSelect = mysqli_query($con,"select * from  depertment where RegNo = '".$_SESSION['username']."'");
	$DepartmentQuery = mysqli_fetch_array($DepartmentSelect);

	$UserSelect = mysqli_query($con,"select * from userole where ID = '".$_GET['Change']."'");
	$UserQuery = mysqli_fetch_array($UserSelect);

	$DepartmentSelect1 = mysqli_query($con,"select * from  depertment where RegNo = '".$UserQuery['UserName']."'");
	$DepartmentQuery1 = mysqli_fetch_array($DepartmentSelect1);

	if ($DepartmentQuery['DepertmentName'] == $DepartmentQuery1['DepertmentName']) 
	{
		// status from userole
		$role = mysqli_query($con,"select * from userole where ID = '".$_GET['Change']."'");
		$std = mysqli_fetch_assoc($role);
		$status =$std['Role'];

		// status from cr table
		$cr = mysqli_query($con,"select * from cr where RegNo ='".$std['UserName']."'");
		$crow = mysqli_fetch_assoc($cr);

		// to get first character
		$FirstCharacter = $status[0];

		// to check to which character
		if ($FirstCharacter === 'F') 
		{
			$usrole = $std['Role'];
			$remove = substr($usrole, 7 , 30);

			// to remove former from cr
			$crole = $crow['CrStatus'];
			$cromove = substr($crole, 7 , 15);

			$upd = mysqli_query($con,"update userole set Role ='".$remove."' where ID = '".$_GET['Change']."'");
			if ($upd) 
			{
				$upd = mysqli_query($con,"update cr set CrStatus='".$cromove."' where RegNo ='".$std['UserName']."'");
				
				// to get start date
				$DurationSelect = mysqli_query($con,"select * from duration where LeaderID ='".$UserQuery['UserName']."'");
				$DurationQuery = mysqli_fetch_array($DurationSelect);

				$DurationUpdate = mysqli_query($con,"update duration set  EnDate ='".$DurationQuery['StartDate']."', Reason ='Continue' where LeaderID ='".$UserQuery['UserName']."'");
				
				header("location:former_cr.php");
			}
			else
			{
				echo "<script> alert('Error: something goes wrong on leader_role_edt page'); </script> .<script>window.location='former_cr.php'</script>";
			}
		}
		else
		{
			$former = "Former ".$std['Role'];
			$crformer = "Former ".$crow['CrStatus'];

			$updat = mysqli_query($con,"update userole set Role ='".$former."' where ID = '".$_GET['Change']."'");
			if ($updat) 
			{
				$upd = mysqli_query($con,"update cr set CrStatus='".$crformer."' where RegNo ='".$std['UserName']."'");
				
				$pl = $std['UserName'];
				header("location:former_duration.php?ID=$pl");
			}
			else
			{
				echo "<script> alert('Error: something goes wrong on leader_role_edt page'); </script> .<script>window.location='former_cr.php'</script>";
			}
		}
	}
	else
	{
		echo "<script> alert('Alert: You are not allow to change cr status due to different department'); </script> .<script>window.location='former_cr.php'</script>";
	}

?>