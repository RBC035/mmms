<?php
	require_once '../../includes/connection.php';

	if (isset($_POST['add_std'])  && $_POST['add_std'] ==='Save') 
	{
		// student info
		$user = $_POST['regno'];
		$first = $_POST['first'];
		$middle = $_POST['middle'];
		$last = $_POST['last'];
		$stphone = $_POST['phone'];
		$gender = $_POST['gender'];
		$year = $_POST['years'];
		$level = $_POST['level'];
		$semister = $_POST['semister'];
		$helth = 'HealthInfo';
		$profile ='picha3.jpg';

		// department info
		$dpId='DepetmentID';
		$dplocation = 'Location';

		//program info
		$pname ='Program';

		if (empty($user)) 
		{
			header("location:add_student.php?reg= 0");
		}
		else if (empty($first)) 
		{
			header("location:add_student.php?Ft= 0");
		}
		else if (empty($middle)) 
		{
			header("location:add_student.php?Md= 0");
		}
		else if (empty($last)) 
		{
			header("location:add_student.php?Lt= 0");
		}
		else if (empty($gender)) 
		{
			header("location:add_student.php?Gnd= 0");
		}
		else if (empty($year)) 
		{
			header("location:add_student.php?Yeah= 0");
		}
		else if (empty($level)) 
		{
			header("location:add_student.php?Stage= 0");
		}
		else
		{
			$sele = "select RegNo from student where RegNo = '$user'";
			$query =  mysqli_query($con,$sele);
			$fect =  mysqli_fetch_array($query);
				if (!$fect) 
				{
					$ins = "insert into student (RegNo, FirstName, MiddleName, LastName, Gender, PhoneNumber, StudentStatus, AcademicYear, Semister, Level, HealthInfo, ProfilePicture) values ('$user','$first','$middle','$last','$gender','$stphone','Enable','$year','$semister','$level','$helth','$profile')";
					$query =  mysqli_query($con,$ins);
						if (!$query) 
						{
							header("location:add_student.php?Alert= 0");
						}
						else
						{
							// Depertment table
							$qurydep=mysqli_query($con,"insert into depertment (RegNo, DepertmentName,Location) values ('$user','$dpId','$dplocation ')");

								// Program table
							$querypro=mysqli_query($con,"insert into program (RegNo,ProgramName) values ('$user','$pname')");

							header("location:student.php");
						}
				}
				else
				{
					header("location:add_student.php?reg= 1");
				}
		}
	}
	else
	{
		header("location:add_student.php");
	}

?>