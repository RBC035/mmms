<?php
	require_once  '../../includes/connection.php';

	if (isset($_POST['Add'])) 
	{
		$DurationUpdate = mysqli_query($con,"update duration set  EnDate = NOW(), Reason ='".$_POST['reason1']."' where LeaderID ='".$_POST['ID']."'");
		if ($DurationUpdate) 
			{
				$LeaderSelect = mysqli_query($con,"select * from selectedleader where LeaderID='".$_POST['ID']."'");
				$LeaderQuery = mysqli_fetch_array($LeaderSelect);

				$FormerDsr = "Former ".$LeaderQuery['Possition'];

				$LeaderUpdate = mysqli_query($con," update selectedleader set Possition ='".$FormerDsr."' where LeaderID='".$_POST['ID']."'");
				if ($LeaderUpdate) 
				{
					// $userUpdate = mysqli_query($con,"update userole set Role = '$FormerDsr' where UserName = '"..$LeaderQuery['RegNo']."'");
					echo "<script> alert('Successfully leader disable'); </script> .<script>window.location='selected_leader.php'</script>";
				}
				else
				{
					echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='selected_leader.php'</script>";
				}
			}
			else
			{
					echo "<script> alert('Error:43 something wrong on duration handler page'); </script> .<script>window.location='selected_leader.php'</script>";
			}
	}
	else
	{
		echo "<script> alert('Error : Something wrong...'); </script> .<script>window.location='selected_leader.php'</script>";
	}
?>