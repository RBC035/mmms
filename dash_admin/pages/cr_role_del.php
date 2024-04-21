<?php
	require_once  '../../includes/connection.php';


	// status from userole
	$role = mysqli_query($con,"select * from userole where ID = '".$_GET['Ddelete']."'");
	$std = mysqli_fetch_assoc($role);
	$status =$std['Role'];

	// status from cr table
	$cr = mysqli_query($con,"select * from cr where RegNo ='".$std['UserName']."'");
	$crow = mysqli_fetch_assoc($cr);
	$crow['CrStatus'];

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

		$upd = mysqli_query($con,"update userole set Role ='".$remove."' where ID = '".$_GET['Ddelete']."'");
			if ($upd) 
			{
				$upd = mysqli_query($con,"update cr set CrStatus='".$cromove."' where RegNo ='".$std['UserName']."'");
				
				// to get start date
				$DurationSelect = mysqli_query($con,"select * from duration where LeaderID ='".$std['UserName']."'");
				$DurationQuery = mysqli_fetch_array($DurationSelect);

				$DurationUpdate = mysqli_query($con,"update duration set  EnDate ='".$DurationQuery['StartDate']."', Reason ='Continue' where LeaderID ='".$std['UserName']."'");

					header("location:CR.php");
			}
			else
			{
				echo "<script> alert('Error: something goes wrong on leader_role_edt page'); </script> .<script>window.location='CR.php'</script>";
			}
	}
	else
	{
		$former = "Former ".$std['Role'];
		$crformer = "Former ".$crow['CrStatus'];

		$updat = mysqli_query($con,"update userole set Role ='".$former."' where ID = '".$_GET['Ddelete']."'");
			if ($updat) 
			{
				$upd = mysqli_query($con,"update cr set CrStatus='".$crformer."' where RegNo ='".$std['UserName']."'");
				
				header("location:CR.php");
			}
			else
			{
				echo "<script> alert('Error: something goes wrong on leader_role_edt page'); </script> .<script>window.location='CR.php'</script>";
			}
	}

	/*$del=mysqli_query($con,"delete from cr where RegNo ='".$userID."'");
	if ($del) 
	{
		$query =mysqli_query($con,"delete from userole where UserName ='".$userID."'");

		echo "<script> alert('Successfully deleted'); </script> .<script>window.location='CR.php'</script>";
	}
	else
	{
		echo "<script> alert('Error: cr roleis not deleted'); </script> .<script>window.location='CR.php'</script>";	
	}*/

?>