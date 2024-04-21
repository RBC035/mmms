<?php
 	require_once  '../../includes/connection.php';

	$MinisterSelect = mysqli_query($con,"select * from minister where MinisterID ='".$_POST['ID']."'");
	$MinisterQuery = mysqli_fetch_array($MinisterSelect);

	$LeaderSelect = mysqli_query($con,"select * from selectedleader where LeaderID ='".$MinisterQuery['LeaderID']."'");
	$LeaderQuery = mysqli_fetch_array($LeaderSelect);

	$UserSelect = mysqli_query($con,"select * from userole where UserName = '".$LeaderQuery['RegNo']."'");
	$UserQuery = mysqli_fetch_array($UserSelect);

	$FormerMinister = "Former ".$MinisterQuery['MinisterPossition'];

	if ($MinisterQuery['MinisterPossition'] == $UserQuery['Role']) 
	{
		 // echo "weka zote (2) ".$FormerMinister.", ".$FormerMinister;

		$MinisterUpdate = "update minister set MinisterPossition = '".$FormerMinister."' where MinisterID ='".$_POST['ID']."'";
		$MinistersQuery = mysqli_query($con,$MinisterUpdate);
		if ($MinisterUpdate) 
		{
			$DurationUpdate = mysqli_query($con,"update duration set  EnDate = NOW(), Reason ='".$_POST['reason1']."' where LeaderID ='".$_POST['ID']."'");

			$UserUpdate = "update userole set Role = '".$FormerMinister."' where UserName = '".$UserQuery['UserName']."'";
			$UsersQuery = mysqli_query($con,$UserUpdate);

			// echo "<script> alert('Successfully deleted'); </script> .<script>window.location='Prime minister.php'</script>";
			header("location:Prime minister.php");
			
		}
		else
		{
			echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='Prime minister.php'</script>";
		}

	}
	else
	{
		// echo "weka moja tu!(1) " .$FormerMinister;

		$MinisterUpdate = mysqli_query($con,"update minister set MinisterPossition ='".$FormerMinister."' where MinisterID='".$_POST['ID']."'");
		if ($MinisterUpdate) 
		{
			$DurationUpdate = mysqli_query($con,"update duration set  EnDate = NOW(), Reason ='".$_POST['reason1']."' where LeaderID ='".$_POST['ID']."'");
			
			 // echo "<script> alert('Successfully deleted'); </script> .<script>window.location='Prime minister.php'</script>";
			header("location:Prime minister.php");
		}
		else
		{
			echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='Prime minister.php'</script>";

		}
	}


?>