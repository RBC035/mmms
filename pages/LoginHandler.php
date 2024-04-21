<?php
	require_once '../includes/connection.php';

	if (isset($_POST['login_form']) && $_POST['login_form'] ==='Login') 
	{
		 $username = $_POST['us'];
		 $pass = $_POST['ps'];
		  $password = md5($pass);

		 if (empty($username)) 
		 {
		 	header("location:login.php?User= 0");
		 }
		 else if (empty($password)) 
		 {
		 	header("location:login.php?Pass= 0");
		 }
		 else
		 {
		 	$sl="select UserName from userole where UserName= '$username'";
		 	$qrt=mysqli_query($con,$sl);
		 	$user=mysqli_fetch_array($qrt);

		 	$select="select Password from userole where Password = '$password'";
		 	$query=mysqli_query($con,$select);
		 	$pass=mysqli_fetch_array($query);

		 		if (!$user) 
		 		{
		 			header("location:login.php?User= 1");
		 		}
		 		else if (!$pass) 
		 		{
		 			header("location:login.php?Pass= 1");
		 		}
		 		else
		 		{
		 			$sele="select * from userole where UserName='$username' && Password='$password'";
		 			$qtr=mysqli_query($con,$sele);
		 			$rw=mysqli_num_rows($qtr);
		 				if (($rw) > 0) 
		 				{
		 					$fect=mysqli_fetch_array($qtr);
		 					$_SESSION['username'] = $fect['UserName'];
		 					$_SESSION['password'] = $fect['Password'];
		 					$_SESSION['Status'] = $fect['Role'];
		 						if ($_SESSION['Status'] == "Admin") 
								{
									header("location:../dash_admin/pages/index.php");
								}
								if ($_SESSION['Status'] == "Dean of student") 
								{
									header("location:../dash_dean/pages/index.php");
								}
								if ($_SESSION['Status'] == "President") 
								{
									header("location:../dash_president/pages/index.php");
								}
								if ($_SESSION['Status'] == "Vice President") 
								{
									header("location:../dash_president/pages/index.php");
								}
								if ($_SESSION['Status'] == "Prime minister") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Loan") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Security") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Finance") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Women") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Information") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Health") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "Minister of Education") 
								{
									header("location:../dash_prime/pages/index.php");
								}
								if ($_SESSION['Status'] == "CR") 
								{
									header("location:../dash_sr/pages/index.php");
								}
								if ($_SESSION['Status'] == "DSR") 
								{
									header("location:../dash_sr/pages/index.php");
								}
								else
								{
									echo "<script> alert('Alert: YOU ARE NOT ALLOWED TO LOGIN DUE TO EXITING YOUR LEADERSHIP IN MASO GOVERNMENT'); </script> .<script>window.location='login.php'</script>";
								}		 				
		 				}
		 				else
		 				{
		 					header("location:login.php?Pass= 2");
		 				}

		 		}
		 }
	}
	else
	{
		header("location:login.php");
	}
?>