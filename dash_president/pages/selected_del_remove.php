<?php
	require_once  '../../includes/connection.php';

	$LeaderSelect = mysqli_query($con,"select * from selectedleader where LeaderID='".$_GET['Ddelete']."'");
	$LeaderQuery = mysqli_fetch_array($LeaderSelect);

	$LeaadeRemove = substr($LeaderQuery['Possition'], 7 , 15);

		//echo "yupo katika uwaziri";
		$LeaderUpdate = mysqli_query($con," update selectedleader set Possition ='".$LeaadeRemove."' where LeaderID='".$_GET['Ddelete']."'");
		if ($LeaderUpdate) 
		{
			// to get start date
				$DurationSelect = mysqli_query($con,"select * from duration where LeaderID ='".$_GET['Ddelete']."'");
				$DurationQuery = mysqli_fetch_array($DurationSelect);

				$DurationUpdate = mysqli_query($con,"update duration set  EnDate ='".$DurationQuery['StartDate']."', Reason ='Continue' where LeaderID ='".$_GET['Ddelete']."'");

			// echo "<script> alert('Successfully added'); </script> .<script>window.location='selected_leader.php'</script>";
				header("location:selected_leader.php");
		}
		else
		{
			echo "<script> alert('Error: user is not added'); </script> .<script>window.location='selected_leader.php'</script>";
		}
?>