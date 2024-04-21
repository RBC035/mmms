<div class="panel-heading">
	<div class="left">
		<span class="label label-primary" style="font-size: 19px;"> 
			<a href="index.php" style="color:white;" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
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
				<th> AcademicYear</th>
				<th> Level</th>
				<th> Phone</th>
				<th> Gender</th>
				<th> Add</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$query=mysqli_query($con,"select * from student where StudentStatus = 'Enable'");
					while($row=mysqli_fetch_array($query))
						{

			?>
			<tr style="color: #000080; font-size: 14px;">
				<td><?php echo $no ?></td>
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $row['FirstName']; ?></td>
				<td><?php echo $row['LastName']; ?></td>
				<td><?php echo $row['AcademicYear']; ?></td>
				<td><?php echo $row['Level']; ?></td>
				<td><?php echo $row['PhoneNumber']; ?></td>
				<td><?php echo $row['Gender']; ?></td>
				<td>
				 	<a href="std_role.php?Add=<?php echo $row['RegNo']; ?>">
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