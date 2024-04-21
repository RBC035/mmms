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
		$staddress = $_POST['address'];
		$gender = $_POST['gender'];
		// mwisho wa form input 
		$userID =$_SESSION['username'];
		$crsele=mysqli_query($con,"select * from student where RegNo='".$userID."'");
		$crfecth=mysqli_fetch_array($crsele);
		$year = $crfecth['AcademicYear']; 
		$level = $crfecth['Level'];
		$semister = $crfecth['Semister'];
		$helth = 'HealthInfo';
		$profile ='picha2.jpg';

		// department info
		$crdp =mysqli_query($con,"select * from depertment where RegNo='".$userID."'");
		$crow=mysqli_fetch_array($crdp);
		$dpId=$crow['DepertmentName'];
		$dplocation = $crow['Location'];

		//program info
		$crpro = mysqli_query($con,"select * from program where RegNo='".$userID."'");
		$prow=mysqli_fetch_array($crpro);
		$pname =$prow['ProgramName']; 

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
					$ins = "insert into student (RegNo, FirstName, MiddleName, LastName, Gender, PhoneNumber, AcademicYear, Semister, Level, HealthInfo, ProfilePicture, StudentStatus) values ('$user','$first','$middle','$last','$gender','$stphone','$year','$semister','$level','$helth','$profile','Enable')";
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