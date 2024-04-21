<?php
	
	if ($_SESSION['Status'] === 'CR') 
	{
?>
<div class="panel-heading">
	<div class="left">
			<span class="label label-success" style="font-size: 19px;"> 
				<a href="index.php" style="color:white;" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
			</span>
	</div>
	<div class="right">
		<span class="label label-primary" style="font-size: 19px;"> 
				<a href="add_student.php" style="color:white;" class="fa fa-plus "> Add students&nbsp;&nbsp; <i class="fa fa-user-circle"></i></a>  
			</span>
	</div>
</div>
<div class="panel-body">
	<table class="table  table-bordered table-hover" id="dataTables-example" >
		<thead>
			<tr style="color: black; text-align: center;">
				<th>s/n</th>
				<th>Reg number</th>
				<th>FirstName</th>
				<th>LastName</th>
				<th>Gender</th>
				<th>AcademicYear</th>
				<th>Department</th>
				<th>PhoneNumber</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$user=$_SESSION['username'];

				// kupata cr academic year
				$crsele =mysqli_query($con,"select * from student where RegNo ='".$user."'");
				$crow=mysqli_fetch_array($crsele);
				$ac = $crow['AcademicYear'];

				// kupata program name
				$program = mysqli_query($con,"select * from program where  RegNo ='".$user."'");
				$querypro = mysqli_fetch_array($program); 

				// kupata department
				$dept=mysqli_query($con,"select * from depertment where RegNo ='".$user."'");
				$fet1=mysqli_fetch_array($dept);
				$department=$fet1['DepertmentName'];

				$query=mysqli_query($con,"select student .* , program .* from student , program where student.RegNo = program.RegNo && 	ProgramName='".$querypro['ProgramName']."' && StudentStatus='Enable' && Semister = '".$crow['Semister']."' && Level ='".$crow['Level']."'");
					while($row=mysqli_fetch_array($query))
						{
							if ($row['AcademicYear'] === $ac) 
							{
			?>
			<tr style="color: #000080; font-size: 14px;">
				<td><?php echo $no ?></td>
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $row['FirstName']; ?></td>
				<td><?php echo $row['LastName']; ?></td>
				<td><?php echo $row['Gender']; ?></td>
				<td><?php echo $row['AcademicYear']; ?></td>
				<td><?php echo $department; ?></td>
				<td><?php echo $row['PhoneNumber']; ?></td>
				<td>
					<a href="add_std_edt.php?Change=<?php echo $row['RegNo']; ?>">
						<span class="fa fa-send " style="padding-left: 10%; color: #000080;" title="Edit">
						</span>
					</a>
				</td>
			</tr>
			<?php
				$no = $no +  1;
						}
					}
			?>

		</tbody>
	</table>
</div>
<?php
}
else
{
?>
<div class="panel-heading">
	<div class="left">
			<span class="label label-success" style="font-size: 19px;"> 
				<a href="index.php" style="color:white;" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
			</span>
	</div>
	<div class="right">
		<span class="label label-primary" style="font-size: 19px;"> 
				<a href="add_student.php" style="color:white;" class="fa fa-plus "> Add students&nbsp;&nbsp; <i class="fa fa-user-circle"></i></a>  
			</span>
	</div>
</div>
<div class="panel-body">
	<table class="table  table-bordered table-hover" id="dataTables-example" >
		<thead>
			<tr style="color: black; text-align: center;">
				<th>s/n</th>
				<th>Regnumber</th>
				<th>FirstName</th>
				<th>LastName</th>
				<th>AcademicYear</th>
				<th>Department</th>
				<th>PhoneNumber</th>
				<th>Edit</th>
				<th>Add</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$user=$_SESSION['username'];

				// kupata department
				$dept=mysqli_query($con,"select * from depertment where RegNo ='".$user."'");
				$fet1=mysqli_fetch_array($dept);
				$department=$fet1['DepertmentName'];

				$query=mysqli_query($con,"select student .* , depertment .* from student , depertment where student.RegNo = depertment.RegNo && DepertmentName='$department' && StudentStatus='Enable'");
					while($row=mysqli_fetch_array($query))
						{
			?>
			<tr style="color: #000080; font-size: 14px;">
				<td><?php echo $no ?></td>
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $row['FirstName']; ?></td>
				<td><?php echo $row['LastName']; ?></td>
				<td><?php echo $row['AcademicYear']; ?></td>
				<td><?php echo $row['DepertmentName']; ?></td>
				<td><?php echo $row['PhoneNumber']; ?></td>
				<td>
					<a href="add_std_edt.php?Change=<?php echo $row['RegNo']; ?>">
						<span class="fa fa-send " style="padding-left: 10%; color: #000080;" title="Edit">
						</span>
					</a>
				</td>
				<td>
					<a href="add_cr_role.php?Add=<?php echo $row['RegNo']; ?>">
						<span class="fa fa-plus " style="padding-left: 29%; color: #000080;" title="Add role">
						</span>
					</a>
				</td>
			</tr>
			<?php
				$no = $no +  1;
					}
			?>

		</tbody>
	</table>
</div>
<?php
}
?>