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
				<th>FullName</th>
				<th>PhoneNumber</th>
				<th>Gender</th>
				<th>AcademicYear</th>
				<th>Program</th>
				<th>Edit</th>
				<!-- <th style="text-align: center;">Delete</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$query=mysqli_query($con,"select * from  program ");
					while($row=mysqli_fetch_array($query))
						{
							$StudentSelect = mysqli_query($con,"select * from student where RegNo='".$row['RegNo']."'");
							while ($StudentQuery = mysqli_fetch_array($StudentSelect)) 
							{
			?>
			<tr style="color: #000080; font-size: 14px;">
				<td><?php echo $no ?></td>
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $StudentQuery['FirstName'].", ".$StudentQuery['MiddleName'].", ".$StudentQuery['LastName']; ?></td>
				<td><?php echo $StudentQuery['PhoneNumber']; ?></td>
				<td><?php echo $StudentQuery['Gender']; ?></td>
				<td><?php echo $StudentQuery['AcademicYear']; ?></td>
				<td><?php echo $row['ProgramName']; ?></td>
				<td>
					<a href="program_edt.php?Change=<?php echo $row['Pid']; ?>">
						<span class="fa fa-send " style="padding-left: 5%; color: #000080;" title="Edit">
						</span>
					</a>
				</td>
				<!-- <td>
					<a href="program_del.php?Ddelete=<?php echo $row['Pid'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
						<span class="fa fa-trash " style="color: #FF0000; padding-left: 44%;" title="Delete">
							                                                        
						</span>
					</a>

				</td> -->
			</tr>
			<?php
				$no = $no +  1;
						}
					}
			?>

		</tbody>
	</table>
</div>