<?php
	require_once  'dashbroad.php';
	if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Update') 
	{
		$userID=$_POST['regno'];
		$Fn =$_POST['first'];
		$Mn =$_POST['middle'];
		$Ln =$_POST['last'];
		$Gnd =$_POST['gender'];
		$academic=$_POST['years'];

		$upd="update student set FirstName='".$Fn."' , MiddleName='".$Mn."', LastName='".$Ln."' , Gender='".$Gnd."' , AcademicYear='".$academic."'   where RegNo='".$userID."'";
		$qet=mysqli_query($con,$upd);
			if ($qet) 
			{
				echo "<script> alert('Successfully updated'); </script> .<script>window.location='student.php'</script>";
			}
			else
			{
				echo "<script> alert('not updated..'); </script> .<script>window.location='student.php'</script>";
			}
	}
	else
	{
		header("location:student.php");
	}
?>