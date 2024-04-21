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
						if (empty($cols[0]) || empty($cols[1]) || empty($cols[2]) || empty($cols[3]) || empty($cols[4]) || empty($cols[5]) || empty($cols[6]) || empty($cols[7]) || empty($cols[8]))
						{
							echo "<script> alert('Alert: Document problem error: #5 => empty space.!'); </script> .<script>window.location='add_student.php'</script>";
						}
						else
						{
							$ins = "insert into student (RegNo, FirstName, MiddleName, LastName, Gender, PhoneNumber, AcademicYear, Semister, Level, HealthInfo, ProfilePicture, StudentStatus) values ('$cols[0]','$cols[1]','$cols[2]','$cols[3]','$cols[4]','$cols[5]','$cols[6]','$cols[7]','$cols[8]','HealthInfo','picha3.jpg','Enable')";
								$query = mysqli_query($con,$ins);
								if (!$query) 
								{
									echo "<script> alert('Error: students is`nt registered..'); </script> .<script>window.location='add_student.php'</script>";
								}
								else
								{
									//Program table
									$querypro=mysqli_query($con,"insert into program (RegNo,ProgramName) values ('$cols[0]','$cols[9]')");

									// Depertment table
									$qurydep=mysqli_query($con,"insert into depertment (RegNo, DepertmentName,Location) values ('$cols[0]','$cols[10]','SecondFloor')");
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