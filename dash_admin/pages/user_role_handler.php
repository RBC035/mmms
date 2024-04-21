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
			$date = date('Y-m-d');
			// To check which role that wanted to register as a leader
			if ($priv =='CR') 
			{
				// echo "register cr";
				// to check cr already registered or not in this academic year
				$crSelect = mysqli_query($con,"select * from cr where RegNo ='$userID' && SelectedYear ='$elected'");
				$crQuery = mysqli_fetch_array($crSelect);
				if ($crQuery) 
				{
					echo "<script> alert('Alert: CR ROLE IS ALREADY REGISTERED IN THIS ACADEMIC YEAR.!'); </script> .<script>window.location='student.php'</script>";
				}
				else
				{

					// echo "cr is not registered in this academic year";
					$crInsert = mysqli_query($con,"insert into cr values ('$userID','CR','$elected')");
					if ($crInsert) 
					{
						$userInsert = mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID','$ps','CR')");

						$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, 	StartDate,EnDate,Reason) values ('$userID','$elected',NOW(),NOW(),'Continue')");

						echo "<script> alert('Successfully cr registered'); </script> .<script>window.location='student.php'</script>";
						// echo "imekubali";
					}
					else
					{
						echo "<script> alert('Error: CR role isn`t registered'); </script> .<script>window.location='student.php'</script>";
					}
				}
			}
			else
			{
				// echo "register for dsr or president or vice president";
				$leaderSelect = mysqli_query($con,"select * from selectedleader where RegNo ='$userID' && ElectedYear = '$elected'");
				if (mysqli_fetch_array($leaderSelect)) 
				{
					echo "<script> alert('Alert: LEADER IS ALREADY REGISTERED IN THIS ACADEMIC YEAR.!'); </script> .<script>window.location='student.php'</script>";
				}
				else
				{
					// echo "not yet registered";
					$leaderInsert = mysqli_query($con,"insert into selectedleader (RegNo,Possition,ElectedYear,Status) values ('$userID','$priv','$elected','$ldstatuz')");
					if ($leaderInsert) 
					{

						$userInsert = mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID','$ps','$priv')");

						$leaderSelect = mysqli_query($con,"select * from selectedleader order by LeaderID desc limit 1");
						$leaderQuery = mysqli_fetch_array($leaderSelect);

						$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, StartDate,EnDate,Reason) values ('".$leaderQuery['LeaderID']."','$elected',NOW(),NOW(),'Continue')");
						
						echo "<script> alert('Successfully added'); </script> .<script>window.location='student.php'</script>";
					}
					else
					{
						echo "<script> alert('Error: Leader role isn`t registered'); </script> .<script>window.location='student.php'</script>";
					}
				}
			}
		}
	}
	else
	{
		header("location:std_role.php");
	}

?>