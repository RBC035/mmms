<?php
	require_once '../../includes/connection.php';

	$role = mysqli_query($con,"select * from userole where ID = '".$_GET['Change']."'");
	$std = mysqli_fetch_assoc($role);
	$status =$std['Role'];

	// status from cr table
	$cr = mysqli_query($con,"select * from cr where RegNo ='".$status['UserName']."'");
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
			$upd = mysqli_query($con,"update cr set CrStatus='".$cromove."' where RegNo ='".$status['UserName']."'");
			header("location:leader_role.php");
		}
		else
		{
			echo "<script> alert('Error: something goes wrong on leader_role_edt page'); </script> .<script>window.location='leader_role.php'</script>";
		}
	}
	else
	{
		$former = "Former ".$std['Role'];

		$former = "Former ".$std['Role'];
		$crformer = "Former ".$crow['CrStatus'];

		$updat = mysqli_query($con,"update userole set Role ='".$former."' where ID = '".$_GET['Change']."'");
		if ($updat) 
		{
			$upd = mysqli_query($con,"update cr set CrStatus='".$crformer."' where RegNo ='".$status['UserName']."'");
			header("location:leader_role.php");
		}
		else
		{
			echo "<script> alert('Error: something goes wrong on leader_role_edt page'); </script> .<script>window.location='leader_role.php'</script>";
		}
	}

?>