<?php
	require_once  '../../includes/connection.php';

	$UserSelect = mysqli_query($con,"select * from userole where ID = '".$_GET['Ddelete']."'");
	$UserQuery = mysqli_fetch_assoc($UserSelect);
	$Userole = $UserQuery['Role'];

	$FirstLetter = $Userole[0];

	if ($FirstLetter == 'F') 
	{
		// echo "remove former";
		$Useremove = substr($Userole, 7 , 30);

		$UserUpdate = mysqli_query($con,"update userole set Role = '".$Useremove."' where ID = '".$_GET['Ddelete']."'");
		if ($UserUpdate) 
		{
			header("location:selected_leader.php");
		}
		else
		{
			echo "<script> alert('Error: userole is not deleted'); </script> .<script>window.location='selected_leader.php'</script>";
		}
	}
	else
	{
		//echo "add former";
		$UserFormer = "Former ".$UserQuery['Role'];

		$UserUpdate = mysqli_query($con,"update userole set Role = '".$UserFormer."' where ID = '".$_GET['Ddelete']."'");
		if ($UserUpdate) 
		{
			header("location:selected_leader.php");
		}
		else
		{
			echo "<script> alert('Error: userole is not deleted'); </script> .<script>window.location='selected_leader.php'</script>";
		}

	}

	/*$del =mysqli_query($con,"delete from userole where UserName ='".$userID."'");
	if ($del) 
	{
		echo "<script> alert('Successfully deleted'); </script> .<script>window.location='selected_leader.php'</script>";
	}
	else
	{
		echo "<script> alert('Error: userole is not deleted'); </script> .<script>window.location='selected_leader.php'</script>";

	}*/
?>