<?php
	require_once '../includes/connection.php';

	if (isset($_POST['signin'])) 
	{
		$regno=$_POST['Uname'];
		$first=$_POST['first'];
		$last=$_POST['last'];
		$dep=$_POST['department'];
		$rl=$_POST['role'];

		$sel =mysqli_query($con,"select * from student where RegNo ='".$regno."' && FirstName ='".$first."' && LastName= '".$last."' ");
		$query =mysqli_fetch_array($sel);
		if ($query) 
		{
			$deprt = mysqli_query($con,"select * from depertment where RegNo ='".$regno."' && DepertmentName ='".$dep."'");
			$fetch = mysqli_fetch_array($deprt);
			if ($fetch) 
			{
				$serole = mysqli_query($con,"select * from userole where UserName = '".$regno."' && Role ='".$rl."' ");
				$userow = mysqli_fetch_array($serole);
				if ($userow) 
				{
					$pass = md5(12345);
					$upd =mysqli_query($con," update userole set Password ='$pass' where UserName ='".$regno."' ");
						if ($upd) 
						{
							echo "<script> alert('YOUR TEMPRERARY PASSWORD IS 12345 PLEASE LOGIN TO CHANGE IT'); </script> .<script>window.location='login.php'</script>";
						}
						else
						{
							echo "<script> alert('INFORMATION  IS NOT CORRECT IN  USEROLE'); </script> .<script>window.location='login.php'</script>";
						}
				}
				else
				{
					echo "<script> alert('INCORRECT USEROLE'); </script> .<script>window.location='login.php'</script>";
				}
			}
			else
			{
				echo "<script> alert('INCORRECT DEPARTMENT NAME'); </script> .<script>window.location='login.php'</script>";
			}
		}
		else
		{
			echo "<script> alert('REGNO OR FIRSTNAME OR LASTNAME IS INCORRECT'); </script> .<script>window.location='login.php'</script>";
		}
	}
	else 
	{
		header("location:login.php");
	}
?>