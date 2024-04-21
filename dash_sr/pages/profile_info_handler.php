<?php
	require_once  'dashbroad.php';
	if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Update') 
	{
		$userID=$_SESSION['username'];
		$Fn =$_POST['first'];
		$Mn =$_POST['middle'];
		$Ln =$_POST['last'];
		$Gnd =$_POST['gender'];
		$pn =$_POST['phone'];

		$upd="update student set FirstName='".$Fn."' , MiddleName='".$Mn."', LastName='".$Ln."' , Gender='".$Gnd."', PhoneNumber ='".$pn."'    where RegNo='".$userID."'";
		$qet=mysqli_query($con,$upd);
			if ($qet) 
			{
				echo "<script> alert('Successfully updated'); </script> .<script>window.location='my_profile_info.php'</script>";
			}
			else
			{
				echo "<script> alert('not updated..'); </script> .<script>window.location='my_profile_info.php'</script>";
			}
	}
	else
	{
		header("location:my_profile_info.php");
	}
?>