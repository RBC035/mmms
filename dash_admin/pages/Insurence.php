	<div class="panel-heading">
		<div class="left">
			<span class="label label-success lb-style-st-1"> 
				<a href="index.php" style="color:white" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
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
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					$query=mysqli_query($con,"select * from student where HealthInfo ='Has'");
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
				</tr>
				<?php
						$no = $no +  1;
						}
				?>

			</tbody>
		</table>
	</div>