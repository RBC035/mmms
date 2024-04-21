<?php
	require_once '../../includes/connection.php';
					$user=$_SESSION['username'];
	// kupata department
				$dept=mysqli_query($con,"select * from depertment where RegNo ='".$user."'");
				$fet1=mysqli_fetch_array($dept);
				$department=$_SESSION['dep']=$fet1['DepertmentName'];
?>
<div class="panel-heading" style="margin-top: 180px;">
	<div class="right">
		<span class="label label-primary" style="padding-top: 15px; padding-bottom: 5px; border-radius: 15px;"> 
		</span>
	</div>
</div>&nbsp;&nbsp;&nbsp;&nbsp;
<div>
	<table>
		<thead>
			<tr style="color: #00008B; font-size: 33px; font-family: times new roman; font-weight: bold; " >
				<th></th>&nbsp;&nbsp;&nbsp;&nbsp;
				<th >THE </th>
				<th>MWALIMU</th>
				<th>NYERERE </th>
				<th> MEMORIAL</th>
				<th> ACADEMY</th>
			</tr>
		</thead>
	</table>&nbsp;&nbsp;
	<table>
		<thead>
			<tr>
				<th style="color: white;">fgdhgfhghjhjjz</th>
				<th style=" font-size: 18px; text-align: right;  font-family: times new roman; ">CLASS </th>
				<th style=" font-size: 18px; text-align: right;  font-family: times new roman; ">REPRESENTATIVE</th>
				<th style=" font-size: 18px; text-align: right; font-family: times new roman; ">STD REPORT IN</th>
				<th style=" font-size: 18px; text-align: center;  font-family: times new roman; "><?php echo $_SESSION['dep']; ?></th>
				<th style=" font-size: 18px; text-align: left;  font-family: times new roman; ">DEPARTMENT</th>
				<th style="color: white;">ghfhghgjjhkh</th>
				<th style="color: white;">ghfhghgjjhkhhk</th>
				<th style="color: white;">ghfhghgjjhkh</th>
			</tr>
		</thead>
	</table>
	<table>
		<thead >
			<tr style="color: black; text-align: center; border: 1px solid #CCCCE8;  font-family: times new roman; font-size: 16px;">
				<th >Reg number</th>
				<th>FullName</th>
				<th>Gender</th>
				<th>PhoneNumber</th>
				<th>Semister</th>
				<th>Level</th>
				<th>AcademicYear</th>
				<th>Department</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$filename ="Execel";

				// kupata academic year
				$crsele =mysqli_query($con,"select * from student where RegNo ='".$user."'");
				$crow=mysqli_fetch_array($crsele);
				$ac = $crow['AcademicYear'];

				// kupata program name
				$program = mysqli_query($con,"select * from program where  RegNo ='".$user."'");
				$querypro = mysqli_fetch_array($program); 

				// code to fecth
				$query=mysqli_query($con,"select student .* , program .* from student , program where student.RegNo = program.RegNo && 	ProgramName='".$querypro['ProgramName']."' && AcademicYear ='".$ac."' && StudentStatus='Enable' && Semister = '".$crow['Semister']."' && Level ='".$crow['Level']."'");
					while($row=mysqli_fetch_array($query))
						{
			?>
			<tr style=" color: #000080; font-size: 15px; border: 1px solid #CCCCE8;  font-family: times new roman; ">
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $row['FirstName'].', '.$row['MiddleName'].', '.$row['LastName']; ?></td>
				<td><?php echo $row['Gender']; ?></td>
				<td><?php echo $row['PhoneNumber']; ?></td>
				<td><?php echo $row['Semister']; ?></td>
				<td><?php echo $row['Level']; ?></td>
				<td><?php echo $ac; ?></td>
				<td><?php echo $department; ?></td>
			</tr>
			<?php
			// Genrating Execel  filess
				header("Content-type: application/octet-stream");
				header("Content-Disposition: attachment; filename=".$filename."-Report-".$department.".xls");
				header("Pragma: no-cache");
				header("Expires: 0");
					}
			?>
		</tbody>
	</table>
</div>