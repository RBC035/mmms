<?php
	require_once  '../../includes/connection.php';

	$UserSelect = mysqli_query($con,"select * from userole where ID = '".$_GET['Ddelete']."'");
	$UserQuery = mysqli_fetch_array($UserSelect);
	$Crole = $UserQuery['Role'];

	$FirstLetter = $Crole[0];

	if ($FirstLetter == 'F') 
	{
		//echo "remove form former cr<br>";
		$cremove = substr($Crole, 7 , 30);

		$UserUpdate = mysqli_query($con,"update userole set Role = '".$cremove."' where ID = '".$_GET['Ddelete']."'");
		if ($UserUpdate)
		 {
			header("location:CR.php");
		}
		else
		{
			echo "<script> alert('Error: cr roleis not deleted'); </script> .<script>window.location='CR.php'</script>";
		}
	}
	else
	{
		//echo "add to be former cr<br>";
		$crFormer = "Former ".$UserQuery['Role'];

		$UserUpdate = mysqli_query($con,"update userole set Role = '".$crFormer."' where ID = '".$_GET['Ddelete']."'");
		if ($UserUpdate)
		 {
			header("location:CR.php");
		}
		else
		{
			echo "<script> alert('Error: cr roleis not deleted'); </script> .<script>window.location='CR.php'</script>";
		}

	}
	/*$del =mysqli_query($con,"delete from userole where ID ='".$userID."'");
	if ($del) 
	{
		echo "<script> alert('Successfully deleted'); </script> .<script>window.location='CR.php'</script>";
	}
	else
	{
		echo "<script> alert('Error: user is not deleted'); </script> .<script>window.location='CR.php'</script>";
	}*/
?>