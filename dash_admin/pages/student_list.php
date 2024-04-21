
<div class="panel-heading">
	<div class="left">
		<span class="label label-success lb-style-st-1"> 
			<a href="index.php" style="color:white" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
		</span>
	</div>
	<div class="right">
		<span class="label label-primary lb-style-st-1"> 
			<a href="add_student.php" style="color:white" class="fa fa-plus "> Add student &nbsp; <i class="fa fa-user-circle"></i></a>
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
				<th> Edit</th>
				<th> Add</th>
				<th> Disable</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$query=mysqli_query($con,"select * from student ");
					while($row=mysqli_fetch_array($query))
						{

			?>
			<tr style="color: #000080; font-size: 14px;">
				<td><?php echo $no ?></td>
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $row['FirstName']; ?></td>
				<td><?php echo $row['LastName']; ?></td>
				<td><?php echo $row['AcademicYear']; ?></td>
				<td>
					<a href="add_std_edt.php?Change=<?php echo $row['RegNo']; ?>">
						<span class="fa fa-send " style="padding-left: 29%; color: #000080;" title="Edit">
						</span>
					</a>
				</td>
				<td>
				 	<a href="std_role.php?Add=<?php echo $row['RegNo']; ?>">
						<span class="fa fa-plus " style="padding-left: 29%; color: #000080;" title="Add role">
						</span>
					</a>
				</td>
				<td>
				<?php
						$status = $row['StudentStatus'];
						$first = $status[0];
						if ($first == 'E') 
						{

				?>
					<a href="add_std_del.php?Ddelete=<?php echo $row['RegNo'];   ?>" onclick="return confirm('Are you sure want to disable this student..?')">
						<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
							                                                        
						</span>
					</a>
				<?php
						}
						else
						{
				?>
						<a href="add_std_del.php?Ddelete=<?php echo $row['RegNo'];?>">
						<span class="fa fa-trash" style="color: #000000; padding-left: 25%;" title="Delete">
							                                                        
						</span>
					</a>
				<?php
						}
				?>
				</td>
			</tr>
			<?php
				$no = $no +  1;
					}
			?>

		</tbody>
	</table>
</div>