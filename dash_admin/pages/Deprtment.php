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
				<th>AcademicYear</th>
				<th> Department</th>
				<th>Location</th>
				<th style="text-align: center;">Edit</th>
				<!-- <th style="text-align: center;">Delete</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$query=mysqli_query($con,"select student .* , depertment .* from student , depertment where student.RegNo = depertment.RegNo ");
					while($row=mysqli_fetch_array($query))
						{

			?>
			<tr style="color: #000080; font-size: 14px;">
				<td><?php echo $no ?></td>
				<td><?php echo $row['RegNo']; ?></td>
				<td><?php echo $row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName']; ?></td>
				<td><?php echo $row['AcademicYear']; ?></td>
				<td><?php echo $row['DepertmentName']; ?></td>
				<td><?php echo $row['Location']; ?></td>
				<td>
					<a href="dep_std_edt.php?Change=<?php echo $row['RegNo']; ?>">
						<span class="fa fa-send " style="padding-left: 40%; color: #000080;" title="Edit">
						</span>
					</a>
				</td>
				<!-- <td>
					<a href="dep_std_del.php?Ddelete=<?php echo $row['RegNo'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
						<span class="fa fa-trash " style="color: #FF0000; padding-left: 40%;" title="Delete">
							                                                        
						</span>
					</a>

				</td> -->
			</tr>
			<?php
				$no = $no +  1;
					}
			?>

		</tbody>
	</table>
</div>