<?php
	require_once  'dashbroad.php';
	if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Update') 
	{
		$userID=$_SESSION['username'];
		$Fn =$_POST['first'];
		$Mn =$_POST['middle'];
		$Ln =$_POST['last'];
		$Gnd =$_POST['gender'];

		$upd="update student set FirstName='".$Fn."' , MiddleName='".$Mn."', PhoneNumber = '".$_POST['phone']."', LastName='".$Ln."' , Gender='".$Gnd."'    where RegNo='".$userID."'";
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