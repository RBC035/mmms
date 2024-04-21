<?php
	require_once  '../../includes/connection.php';

	if (isset($_POST['Add_role'])  && $_POST['Add_role'] ==='Change')
	{
		$userID =$_POST['regno'];
		$prive =$_POST['privillege'];
		$ID =$_POST['ld'];

		$firstCharacter = $prive[0];
		$minister =  strtoupper($prive);

		if ($firstCharacter == 'F') 
		{
			echo "<script> alert('ALERT => PLEASE REMOVE $minister FIRST'); </script> .<script>window.location='Prime minister.php'</script>";
		}
		else
		{ 
			$query =mysqli_query($con,"update minister set MinisterPossition ='".$prive."' where MinisterID ='".$ID."'");
			if ($query) 
			{
				$queryupd=mysqli_query($con,"update userole set Role ='".$prive."' where UserName ='".$userID."'");
				echo "<script> alert('Successfully updated'); </script> .<script>window.location='Prime minister.php'</script>";
			}
			else
			{
				echo "<script> alert('not updated..'); </script> .<script>window.location='Prime minister.php'</script>";
			}
		}
	}
	else
	{
		header("location:Prime minister.php");
	}
 
?>