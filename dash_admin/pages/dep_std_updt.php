<?php
	require_once  'dashbroad.php';
	if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Change') 
	{
		$userID=$_POST['regno'];
		$dept =$_POST['Department'];
		$location =$_POST['Deplocation'];

		$upd="update  depertment set DepertmentName='".$dept."' , Location='".$location ."' where RegNo='".$userID."'";
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