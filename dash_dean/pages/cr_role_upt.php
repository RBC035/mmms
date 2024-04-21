<?php
	require_once '../../includes/connection.php';
		if (isset($_POST['update_std'])  && $_POST['update_std'] ==='Update')
			{
				$reg=$_POST['regno'];
				$st=$_POST['Status'];
				$sel=$_POST['years'];

				$firstLetter = $st[0];
				$crole = strtoupper($st);

				if ($firstLetter == 'F') 
				{
					echo "<script> alert('ALRET => PLEASE REMOVE $crole FIRST'); </script> .<script>window.location='CR.php'</script>";
				}
				else
				{
					$query =mysqli_query($con,"update cr set CrStatus='".$st."', SelectedYear='".$sel."' where RegNo ='".$reg."'");
					if ($query) 
					{
						$DurationUpdate = mysqli_query($con, "update duration set ElectedYear ='$sel' where LeaderID = '$reg'");
						
						echo "<script> alert('Successfully  updated'); </script> .<script>window.location='CR.php'</script>";
					}
					else
					{
						echo "<script> alert('not updated..'); </script> .<script>window.location='CR.php'</script>";
					}
				}
			}
			else
			{
				header("location:CR.php");
			}
?>