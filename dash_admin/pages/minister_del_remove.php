<?php
	require_once  '../../includes/connection.php';

	$MinisterSelect = mysqli_query($con,"select * from minister where MinisterID ='".$_GET['Ddelete']."'");
	$MinisterQuery = mysqli_fetch_array($MinisterSelect);

	$LeaderSelect = mysqli_query($con,"select * from selectedleader where LeaderID ='".$MinisterQuery['LeaderID']."'");
	$LeaderQuery = mysqli_fetch_array($LeaderSelect);

	$UserSelect = mysqli_query($con,"select * from userole where UserName = '".$LeaderQuery['RegNo']."'");
	$UserQuery = mysqli_fetch_array($UserSelect);

	$MinisteRemove = substr($MinisterQuery['MinisterPossition'], 7 , 30);

	if ($MinisterQuery['MinisterPossition'] == $UserQuery['Role']) 
	{
		// echo "badilisha zote 2".$MinisteRemove.", ".$MinisteRemove;

		$MinisterUpdate = "update minister set MinisterPossition = '".$MinisteRemove."' where MinisterID ='".$_GET['Ddelete']."'";
		$MinistersQuery = mysqli_query($con,$MinisterUpdate);
		if ($MinisterUpdate) 
		{
			$UserUpdate = "update userole set Role = '".$MinisteRemove."' where UserName = '".$UserQuery['UserName']."'";
			$UsersQuery = mysqli_query($con,$UserUpdate);

			// to get start date
				$DurationSelect = mysqli_query($con,"select * from duration where LeaderID ='".$_GET['Ddelete']."'");
				$DurationQuery = mysqli_fetch_array($DurationSelect);

				$DurationUpdate = mysqli_query($con,"update duration set  EnDate ='".$DurationQuery['StartDate']."', Reason ='Continue' where LeaderID ='".$_GET['Ddelete']."'");

			// echo "<script> alert('Successfully added'); </script> .<script>window.location='Prime minister.php'</script>";
				header("location:Prime minister.php");
		}
		else
		{
			echo "<script> alert('Error: user is not added'); </script> .<script>window.location='Prime minister.php'</script>";
		}

	}
	else
	{
		// echo "badilisha 1".$MinisteRemove;
		$MinisterUpdate = mysqli_query($con,"update minister set MinisterPossition ='".$MinisteRemove."' where MinisterID='".$_GET['Ddelete']."'");
		if ($MinisterUpdate) 
		{
			// to get start date
			$DurationSelect = mysqli_query($con,"select * from duration where LeaderID ='".$_GET['Ddelete']."'");
			$DurationQuery = mysqli_fetch_array($DurationSelect);

			$DurationUpdate = mysqli_query($con,"update duration set  EnDate ='".$DurationQuery['StartDate']."', Reason ='Continue' where LeaderID ='".$_GET['Ddelete']."'");

			 // echo "<script> alert('Successfully added'); </script> .<script>window.location='Prime minister.php'</script>";
			header("location:Prime minister.php");
		}
		else
		{
			echo "<script> alert('Error: user is not added'); </script> .<script>window.location='Prime minister.php'</script>";

		}
	}
?>