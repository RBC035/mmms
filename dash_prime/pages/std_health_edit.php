<?php
	require_once '../../includes/connection.php';
		$userID=$_GET['Change'];
		$upd=mysqli_query($con,"update student set HealthInfo='HANA' where RegNo='".$userID."' ");
			if (!$upd) 
				{
					echo "<script> alert('Health info isnot changed..'); </script> .<script>window.location='student_health.php'</script>";
				}
				else
				{
					echo "<script> alert('Succesfully Health info changed..'); </script> .<script>window.location='student_health.php'</script>";
				}
?>