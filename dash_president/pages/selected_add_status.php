<?php
	require_once  '../../includes/connection.php';
	if (isset($_POST['Add_role'])  && $_POST['Add_role'] ==='Add')
	{
		$leader =$_POST['ld'];
		$status =$_POST['privillege'];
		$userID =$_POST['regno'];

		$studentSelect = mysqli_query($con,"select * from student where RegNo = '$userID'");
		$studentQuery = mysqli_fetch_array($studentSelect);

		$first = $studentQuery['FirstName'];
		$last= $studentQuery['LastName'];

		$character0 = $first[0];
		$character1 = $first[1];
		$character2 = $last[0];
		$character3 = $last[1];

		$four="0123456789";
		$fourNumber= substr(str_shuffle($four), 0,4);
		$two="0123456789";
		$twoNumber= substr(str_shuffle($two), 0,2);

		$userNo = $character0.$character1.$character2.$character3.$fourNumber.$twoNumber;
		$userName = strtoupper($userNo);

		$MinisterSelect = mysqli_query($con,"select * from minister where LeaderID = '$leader'");
		$MinisterQuery = mysqli_fetch_assoc($MinisterSelect);

		if ($MinisterQuery) 
		{
			// echo "tear waziri yupo";

			$PresidentSelect = mysqli_query($con,"select * from selectedleader where RegNo = '".$_SESSION['username']."'");
			$PresidentQuery = mysqli_fetch_assoc($PresidentSelect);

			$LeaderSelect = mysqli_query($con,"select * from selectedleader where LeaderID = '$leader'");
			$LeaderQuery = mysqli_fetch_assoc($LeaderSelect);

			if ($PresidentQuery['ElectedYear'] == $LeaderQuery['ElectedYear']) 
			{
				// echo "huwezi kuruhusiwa kumuekea tena";
				echo "<script> alert('YOU CAN`T ADD THIS LEADER BECAUSE HE IS ALREADY ADDED IN THIS ACADEMIC YEAR'); </script> .<script>window.location='selected_leader.php'</script>";
			}
			else
			{

					$InsertMinister1 = mysqli_query($con," insert into minister (MinisterID,LeaderID,MinisterPossition) values ('$userName','$leader','$status')");
					if ($InsertMinister1) 
					{
						$ps= md5(1234);
						$InsertUser = mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID', '$ps','$status')");

						$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, StartDate,EnDate,Reason) values ('$userName','".$LeaderQuery['ElectedYear']."',NOW(),NOW(),'Continue')");

						echo "<script> alert('Successfully added..'); </script> .<script>window.location='selected_leader.php'</script>";
						// echo "imekubali";
					}
					else
					{
						echo "<script> alert('Error minister is not added..'); </script> .<script>window.location='selected_leader.php'</script>";
					}
			}
		}
		else
		{
			// echo "huyu waziri hayupo";

			$LeaderSelect1 = mysqli_query($con,"select * from selectedleader where LeaderID = '$leader'");
			$LeaderQuery1 = mysqli_fetch_assoc($LeaderSelect1);

				$InsertMinister1 = mysqli_query($con," insert into minister (MinisterID,LeaderID,MinisterPossition) values ('$userName','$leader','$status')");
				if ($InsertMinister1) 
				{
					$ps= md5(1234);
					$InsertUser = mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID', '$ps','$status')");

					$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, StartDate,EnDate,Reason) values ('$userName','".$LeaderQuery1['ElectedYear']."',NOW(),NOW(),'Continue')");

					echo "<script> alert('Successfully added..'); </script> .<script>window.location='selected_leader.php'</script>";
					// echo "imekubali";
				}
				else
				{
					echo "<script> alert('Error minister is not added..'); </script> .<script>window.location='selected_leader.php'</script>";
				}
		}


	}
	else
	{
		header("location:selected_leader.php");
	}
?>