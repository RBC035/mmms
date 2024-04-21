<?php
		require_once  '../../includes/connection.php';

		$userID=$_GET['Add'];
		$SelectLeader = mysqli_query($con,"select * from selectedleader where RegNo = '".$_SESSION['username']."'");
		$LeaderQuery = mysqli_fetch_assoc($SelectLeader);

		$SelectLeader1 = mysqli_query($con,"select * from selectedleader where RegNo='$userID' && ElectedYear ='".$LeaderQuery['ElectedYear']."'");

		$LeaderQuery1 = mysqli_fetch_assoc($SelectLeader1);
		if ($LeaderQuery1) 
		{
			//echo "kiongozo tear yupo katika huu mwaka";
			echo "<script> alert('Alert: USER ROLE IS ALREADY ADDED.!'); </script> .<script>window.location='student.php'</script>";
		}
		else
		{
			// echo "muweka kiongozi ";

			$InsertLeader = mysqli_query($con,"insert into selectedleader (RegNo,Possition,ElectedYear,Status) values ('$userID','DSR','".$LeaderQuery['ElectedYear']."','Selected')");
			if ($InsertLeader) 
			{
				$ps= md5(4444);

				$InsertUser = mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID','$ps','DSR') ");

				$year = $LeaderQuery['ElectedYear'];

				$leaderSelect = mysqli_query($con,"select * from selectedleader order by LeaderID desc limit 1");
				$leaderQuery = mysqli_fetch_array($leaderSelect);

				$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, StartDate,EnDate,Reason) values ('".$leaderQuery['LeaderID']."','$year',NOW(),NOW(),'Continue')");

				echo "<script> alert('Successfully added'); </script> .<script>window.location='student.php'</script>";
			}
			else
			{
				echo "<script> alert('Error: Leader role isn`t added'); </script> .<script>window.location='student.php'</script>";
			}
		}
?>