<?php
		require_once  '../../includes/connection.php';
if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Update')
{
	$userID =$_POST['regno'];
	$ps =md5($_POST['pass']);

	$upd =mysqli_query($con,"update userole set Password ='".$ps."' where ID ='".$userID."'");
	if ($upd) 
	{
		echo "<script> alert('Successfully updated'); </script> .<script>window.location='CR.php'</script>";
	}
	else
	{
		echo "<script> alert('not updated..'); </script> .<script>window.location='CR.php'</script>";
	}
}
else
{
	header("location:selected_leader.php");
}

?>