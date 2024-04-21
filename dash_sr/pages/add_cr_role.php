<?php
	require_once '../../includes/connection.php';
	$userID =$_GET['Add'];

	$LeaderSelect = mysqli_query($con, "select * from selectedleader where RegNo = '".$_SESSION['username']."'");
	$LeaderQuery = mysqli_fetch_assoc($LeaderSelect);
	$year = $LeaderQuery['ElectedYear'];

	$sel=mysqli_query($con,"select * from cr where RegNo = '".$userID."'");
	$query=mysqli_fetch_assoc($sel);
	if (!$query) 
	{
		$ins=mysqli_query($con,"insert into cr values ('$userID','CR','$year')");
		if ($ins) 
		{
			$pass = md5(9999);
			$queryrole =mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$userID','$pass','CR')");

			$Duration = mysqli_query($con,"insert into duration (LeaderID ,ElectedYear, StartDate,EnDate,Reason) values ('$userID','$year',NOW(),NOW(),'Continue')");

			echo "<script> alert('Successfully added'); </script> .<script>window.location='student.php'</script>";
		}
		else
		{
			echo "<script> alert('Error: CR role isn`t added'); </script> .<script>window.location='student.php'</script>";
		}
	}
	else
	{
		if ($query['CrStatus'] ==='CR') 
		{
			$updcr=mysqli_query($con,"update cr set CrStatus='Assistance' where RegNo = '".$userID."'");
			echo "<script> alert('Successfully added'); </script> .<script>window.location='student.php'</script>";
		}
		else
		{
			$updcr=mysqli_query($con,"update cr set CrStatus='CR' where RegNo = '".$userID."'");
			echo "<script> alert('Successfully added'); </script> .<script>window.location='student.php'</script>";
		}
	}
?>