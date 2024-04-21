<?php
	require_once  '../../includes/connection.php';

	if (isset($_POST['Add_role'])  && $_POST['Add_role'] ==='Add')
	{
		if (empty($_POST['privillege']) || empty($_POST['election']) || empty($_POST['ldstatus'])) 
		{
			echo "<script> alert('Alert: FILL EMPTY SPACE..!!'); </script> .<script>window.location='student.php'</script>";
		}
		else
		{
			$userID =$_POST['regno'];
			$priv =$_POST['privillege'];
			$elected =$_POST['election'];
			$ldstatuz =$_POST['ldstatus'];

			$generate="0123012345678945678901230123456789456789";
			$pass= substr(str_shuffle($generate), 0,6);
			$ps = md5($pass);


			$sele = "select * from selectedleader where RegNo ='$userID' && ElectedYear = '$elected'";
			$query = mysqli_query($con,$sele);
			$row = mysqli_fetch_assoc($query);
				if (!$row)
				{
					$ins = "insert into selectedleader (RegNo,Possition,ElectedYear,Status) values ('$userID','		$priv','$elected','$ldstatuz')";
					$queryins = mysqli_query($con,$ins);
					if ($queryins) 
						{
							$queryrole =mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID','$ps','$priv')");

							$leaderSelect = mysqli_query($con,"select * from selectedleader order by LeaderID desc limit 1");
							$leaderQuery = mysqli_fetch_array($leaderSelect);

							$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, StartDate,EnDate,Reason) values ('".$leaderQuery['LeaderID']."','$elected',NOW(),NOW(),'Continue')");

								echo "<script> alert('Successfully added'); </script> .<script>window.location='student.php'</script>";
						}
						else
						{
							echo "<script> alert('Error: Leader role isn`t added'); </script> .<script>window.location='student.php'</script>";
						}
				}
				else
				{
					echo "<script> alert('Alert: USER ROLE IS ALREADY ADDED.!'); </script> .<script>window.location='student.php'</script>";
				}
		}

	}
	else
	{
		header("location:std_role.php");
	}
?>