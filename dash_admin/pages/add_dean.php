<?php
	require_once  '../../includes/connection.php';

	if (isset($_POST['signin']) && $_POST['signin'] ==='Register') 
	{
		$StaffID = $_POST['Staff'];

		$StaffSelect = mysqli_query($con,"select * from dean where SaffID ='$StaffID'");
		$StaffQuery = mysqli_fetch_array($StaffSelect);
		if ($StaffQuery) 
		{
			echo "<script> alert('Alert: #20 Staff ID is already registered..'); </script> .<script>window.location='registration.php'</script>";
		}
		else
		{
			$create="0123456789";
			$start= substr(str_shuffle($create), 0,2);
			$dt =date('Y');
			$same = $dt - 2000;
			$user ="MMMS/ZNZ.DEAN/00".$start."/".$same;
			$pass= substr(str_shuffle($create), 0,3);
			$ps = md5($pass);

			$StaffUser = mysqli_query($con,"select * from dean where RegNo = '$user'");
			$StaffQuery1 = mysqli_fetch_array($StaffUser);
			if ($StaffQuery1) 
			{
			 	echo "<script> alert('Alert: #22 Reg No is already registered..'); </script> .<script>window.location='registration.php'</script>";
			}
			else
			{
				$StaffInsert = mysqli_query($con,"insert into dean (SaffID, RegNo) values ('$StaffID','$user')");
				if ($StaffInsert) 
				{
					$UserInsert = mysqli_query($con,"insert into userole (UserName,Password,Role) values ('$user','$ps','Dean of student')");

					echo "<script> alert('Succesfully registered'); </script> .<script>window.location='registration.php'</script>";
				}
				else
				{
					echo "<script> alert('Error: #23 UserName is not registered'); </script> .<script>window.location='registration.php'</script>";
				}
			} 

		}
	}
	else
	{
		echo "<script> alert('Error: #21 on button clicked'); </script> .<script>window.location='registration.php'</script>";
	}
?>