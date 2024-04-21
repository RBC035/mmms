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

			echo "<script> alert('Successfully minister disable'); </script> .<script>window.location='Prime minister.php'</script>";
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
			
			 echo "<script> alert('Successfully minister disable'); </script> .<script>window.location='Prime minister.php'</script>";
		}
		else
		{
			echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='Prime minister.php'</script>";

		}
	}

	/*// kupata leaderID 
	$sel =mysqli_query($con,"select * from minister where MinisterID ='".$userID."'");
	$row=mysqli_fetch_array($sel);
	$leaderID =$row['LeaderID'];

	// kupata regno
	$selreg=mysqli_query($con,"select * from selectedleader where LeaderID ='".$leaderID."'");
	$fet=mysqli_fetch_array($selreg);
	$regno =$fet['RegNo'];

	// kwa ajili ya kufuta kwenye minister table

	// kwa ajili ya kubadilisha MinisterPossition ila bad hijakailika
		// $upd =mysqli_query($con,"update  minister set MinisterPossition ='Retired' where MinisterID ='".$userID."' ");

	$del =mysqli_query($con,"delete from minister where MinisterID ='".$userID."' ");
	if ($del) 
	{
		$del =mysqli_query($con,"update userole set Role='DSR' where UserName ='".$regno."'");

		echo "<script> alert('Successfully deleted'); </script> .<script>window.location='Prime minister.php'</script>";
	}
	else
	{
		echo "<script> alert('Error: minister role is not deleted'); </script> .<script>window.location='Prime minister.php'</script>";
	}*/

?>