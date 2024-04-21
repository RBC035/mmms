<?php

	require_once '../../includes/connection.php';
	if (isset($_POST['changeps'])) 
	{
		if (empty($_POST['Currentps']) || empty($_POST['Newps']) || empty($_POST['ConfirmNewps'])) 
		{
			header("location:change_user_pass.php?EMPTYSPACE= 0");
		}
		else
		{
			$id=$_SESSION['username'];
			$current=md5($_POST['Currentps']);
			$new=$_POST['Newps'];
			$confirm=$_POST['ConfirmNewps'];

			$sele="select Password from userole where Password='$current' && UserName ='$id'";
			$qrt=mysqli_query($con,$sele);
			$seach=mysqli_fetch_assoc($qrt);
				if ($seach)
				{
					if ($new ==  $confirm) 
					{
						$conf = md5($confirm);
						$upd="update userole set Password='$conf' where UserName ='$id'";
						$qrty=mysqli_query($con,$upd);
							if ($qrty) 
							{
								echo "<script> alert('Succesfully password change'); </script> .<script>window.location='index.php'</script>";
							}
							else
							{
								header("location:change_user_pass.php?WRONG= 1");
							}
					}
					else
					{
						header("location:change_user_pass.php?CONFIRM= 0");
					}
				}
				else
				{
					header("location:change_user_pass.php?OLD= 1");
				}


		}
	}
	else
	{
		header("location:change_user_pass.php");
	}


?>