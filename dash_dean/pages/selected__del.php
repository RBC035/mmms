<?php
	require_once  '../../includes/connection.php';

	$LeaderSelect = mysqli_query($con,"select * from selectedleader where LeaderID = '".$_GET['Ddelete']."'");
	$LeaderQuery = mysqli_fetch_assoc($LeaderSelect);
	$LeaderPossition = $LeaderQuery['Possition'];

	$FirstLetter = $LeaderPossition[0];

	if ($FirstLetter == 'F') 
	{
		//echo "odoa kwenye fomer leader<br>";
		$Leaderemove = substr($LeaderPossition, 7 , 30);

		$LeaderUpdate = mysqli_query($con,"update selectedleader set Possition = '".$Leaderemove."'  where LeaderID = '".$_GET['Ddelete']."'");
		if ($LeaderUpdate) 
		{
		// to get start date
				$DurationSelect = mysqli_query($con,"select * from duration where LeaderID ='".$_GET['Ddelete']."'");
				$DurationQuery = mysqli_fetch_array($DurationSelect);

				$DurationUpdate = mysqli_query($con,"update duration set  EnDate ='".$DurationQuery['StartDate']."', Reason ='Continue' where LeaderID ='".$_GET['Ddelete']."'");

			header("location:selected_leader.php");
		}
		else
		{
			echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='selected_leader.php'</script>";
		}
	}
	else
	{
		//echo "weka kwenye former leander <br>";
		$LeaderFormer = "Former ".$LeaderQuery['Possition'];

		$LeaderUpdate = mysqli_query($con,"update selectedleader set Possition = '".$LeaderFormer."'  where LeaderID = '".$_GET['Ddelete']."'");
		if ($LeaderUpdate) 
		{
			header("location:selected_leader.php");
		}
		else
		{
			echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='selected_leader.php'</script>";
		}
	}
?>