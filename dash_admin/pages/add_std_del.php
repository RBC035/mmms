<?php
	require_once '../../includes/connection.php';


	$StudentSelect = mysqli_query($con,"select * from student where RegNo='".$_GET['Ddelete']."'");
	$StudentQuery = mysqli_fetch_array($StudentSelect);

	$status = $StudentQuery['StudentStatus'];
	$first = $status[0];

	if ($first =='E') 
	{
		$StudentUpdate = mysqli_query($con,"update student set StudentStatus = 'Disable' where RegNo='".$_GET['Ddelete']."' ");
		if ($StudentUpdate) 
		{
			header("location:student.php");
		}
		else
		{
			echo "<script> alert('Error:2 Student  is not deleted'); </script> .<script>window.location='student.php'</script>";
		}
	}
	else
	{
		$StudentUpdate = mysqli_query($con,"update student set StudentStatus = 'Enable' where RegNo='".$_GET['Ddelete']."' ");
		if ($StudentUpdate) 
		{
			header("location:student.php");
		}
		else
		{
			echo "<script> alert('Error:2 Student  is not deleted'); </script> .<script>window.location='student.php'</script>";
		}
	}
	/*//Delete userole table
	$querydepartment=mysqli_query($con,"delete from userole where UserName='".$user."'");
	//Delete student table 
	$dele="delete from student where RegNo='".$user."'";
	$query=mysqli_query($con,$dele);
		if ($query) 
		{
			echo "<script> alert('Successfully deleted'); </script> .<script>window.location='student.php'</script>";
		}
		else
		{
			echo "<script> alert('Error:2 foreign key# Student  is not deleted'); </script> .<script>window.location='student.php'</script>";

		}*/
?>