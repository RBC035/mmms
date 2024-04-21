<?php
	require_once '../../includes/connection.php';
	if (isset($_POST['import'])  && $_POST['import'] ==='Upload') 
	{
		$file = $_FILES['excel']['tmp_name'];
		if ($_FILES['excel']['size'] > 0)
		{
			$name = fopen($file, "r" );
			while (($cols = fgetcsv($name, 10000, ",")) !== FALSE)
			{
				$queryselect = mysqli_query($con,"select RegNo from student where RegNo = '$cols[0]'");
				$row =  mysqli_fetch_assoc($queryselect);
				if (!$row)
				{
					if (empty($cols[0]) || empty($cols[1]) || empty($cols[2]) || empty($cols[3]) || empty($cols[4]) || empty($cols[5]))
					{
						echo "<script> alert('Alert: Document problem error: #5 => empty space.!'); </script> .<script>window.location='add_student.php'</script>";
					}
					else
					{
						// from userole 
						$userID =$_SESSION['username'];
						$crsele=mysqli_query($con,"select * from student where RegNo='".$userID."'");
						$crfecth=mysqli_fetch_array($crsele);
						$year = $crfecth['AcademicYear']; 
						$level = $crfecth['Level'];
						$semister = $crfecth['Semister'];

						// department info..
						$crdp =mysqli_query($con,"select * from depertment where RegNo='".$userID."'");
						$crow=mysqli_fetch_array($crdp);
						$dpId=$crow['DepertmentName'];
						$dplocation = $crow['Location'];

						// program info ..
						$crpro = mysqli_query($con,"select * from program where RegNo='".$userID."'");
						$prow=mysqli_fetch_array($crpro);
						$pname =$prow['ProgramName']; 


						$ins = "insert into student (RegNo, FirstName, MiddleName, LastName, Gender, PhoneNumber, AcademicYear, Semister, Level, HealthInfo, ProfilePicture, StudentStatus ) values ('$cols[0]','$cols[1]','$cols[2]','$cols[3]','$cols[4]','$cols[5]','$year','$semister','$level','HealthInfo','picha2.jpg','Enable')";
						$query = mysqli_query($con,$ins);
						if (!$query) 
							{
								echo "<script> alert('Error: students is`nt registered..'); </script> .<script>window.location='add_student.php'</script>";
							}
							else
							{
								//Program table
								$querypro=mysqli_query($con,"insert into program (RegNo,ProgramName) values ('$cols[0]','$pname')");
								// Depertment table
									$qurydep=mysqli_query($con,"insert into depertment (RegNo, DepertmentName,Location) values ('$cols[0]','$dpId','$dplocation')");
									header("location:student.php");
							}
					}
				}
				else
				{
					header("location:add_student.php?userFile= 0");
				}
			}
		}
		else
		{
			header("location:add_student.php?Filempty= 0");
		}
	}
	else
	{
		header("location:add_student.php");
	}
?>