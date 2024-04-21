<?php
	require_once '../../includes/connection.php';
	if (isset($_POST['Add'])) 
	{

		$UserSelect = mysqli_query($con,"select * from userole where ID = '".$_POST['ID']."'");
		$UserQuery = mysqli_fetch_array($UserSelect);

		$DurationUpdate = mysqli_query($con,"update duration set  EnDate = NOW(), Reason ='".$_POST['reason1']."' where LeaderID ='".$UserQuery['UserName']."'");
		if ($DurationUpdate) 
			{
				$cr = mysqli_query($con,"select * from cr where RegNo ='".$UserQuery['UserName']."'");
				$crow = mysqli_fetch_assoc($cr);

				$crformer = "Former ".$crow['CrStatus'];

				$updat = mysqli_query($con,"update userole set Role ='Former CR' where ID = '".$_POST['ID']."'");
				if ($updat) 
				{
					$letter= $crow['CrStatus'];
					echo $first = $letter[0]; 
					if ($first === 'F') 
					{
						$crole = $crow['CrStatus'];
						$cromove = substr($crole, 7 , 15);

						$upd = mysqli_query($con,"update cr set CrStatus='".$cromove."' where RegNo ='".$std['UserName']."'");
						
						header("location:former_cr.php");
					}
					else
					{
						$upd = mysqli_query($con,"update cr set CrStatus='".$crformer."' where RegNo ='".$UserQuery['UserName']."'");
					
						header("location:former_cr.php");
					}
				}
				else
				{
					echo "<script> alert('Error: something goes wrong on userole query'); </script> .<script>window.location='former_cr.php'</script>";
				}

			 	//header("location:former_cr.php");
			}
			else
			{
				echo "<script> alert('Error:43 something wrong on duration handler page'); </script> .<script>window.location='former_cr.php'</script>";
			}
	}
	else
	{
		echo "<script> alert('Error : Something wrong...'); </script> .<script>window.location='former_cr.php'</script>";
	}
?>