<?php
	require_once '../../includes/connection.php';
		$userID=$_GET['Change'];

		$sel=mysqli_query($con,"select * from userole where ID='".$userID."' ");
		$row=mysqli_fetch_assoc($sel);

		if ($row['Password'] != '81dc9bdb52d04dc20036dbd8313ed055') 
		{
			$ps = md5(1234);
			$upd=mysqli_query($con,"update userole set Password='$ps' where ID='".$userID."'");
			if (!$upd) 
				{
					echo "<script> alert('Error info is not updated..'); </script> .<script>window.location='registration.php'</script>";
				}
				else
				{
					// echo "<script> alert('Succesfully updated info..'); </script> .<script>window.location='registration.php'</script>";
					header("location:registration.php");
				}
		}
		else
		{
			$create="0123456789";
			$pass= substr(str_shuffle($create), 0,3);
			$ps = md5($pass);
			$upd=mysqli_query($con,"update userole set Password='".$ps."' where ID='".$userID."'");
			if (!$upd) 
				{
					echo "<script> alert('Error info is not updated..'); </script> .<script>window.location='registration.php'</script>";
				}
				else
				{
					// echo "<script> alert('Succesfully updated info..'); </script> .<script>window.location='registration.php'</script>";
					header("location:registration.php");
				}
		}

?>