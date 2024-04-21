<?php
	require_once  '../../includes/connection.php';
if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Update')
{
	$regno = $_POST['regno'];
	$user = $_POST['ID'];
	$pre = $_POST['privillege'];
	$year = $_POST['Elected'];
	$status = $_POST['userstatus'];

	$firstLeatter = $pre[0];

	if ($firstLeatter == 'F') 
	{
		echo "<script> alert('ALERT => PLEASE REMOVE FORMER LEADER FIRST'); </script> .<script>window.location='selected_leader.php'</script>";
	}
	else
	{
		$upd ="update selectedleader set Possition='".$pre."', ElectedYear='".$year."', Status='".$status."' where LeaderID='".$user."'  && RegNo='".$regno."'";
		$query = mysqli_query($con,$upd);
		if ($query) 
		{
			$durationUpdate = mysqli_query($con,"update duration set ElectedYear ='$year' where LeaderID='$user'");
			
			$queryupd=mysqli_query($con,"update userole set Role ='".$pre."' where UserName ='".$regno."'");

			echo "<script> alert('Successfully updated'); </script> .<script>window.location='selected_leader.php'</script>";
		}
		else
		{
			echo "<script> alert('not updated..'); </script> .<script>window.location='selected_leader.php'</script>";
		}
	}
}
else
{
	header("location:selected_leader.php");
}

?>