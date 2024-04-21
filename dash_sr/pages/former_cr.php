<?php
	include '../../dash_admin/include/header_dataTables.php';
	require_once 'dashbroad.php';

	$DepartmentSelect = mysqli_query($con,"select * from  depertment where RegNo = '".$_SESSION['username']."'");
	$DepartmentQuery = mysqli_fetch_array($DepartmentSelect);
?>

	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- TABBED CONTENT -->
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Leaders role</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
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
													<th>FullName</th>
													<th> AcademicYear</th>
													<th>Privillage</th>
													<th>PhoneNumber</th>
													<th>Gender</th>
													<th>Change </th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$query1=mysqli_query($con,"select * from userole  where Role ='CR' || Role ='Former CR'");

													while ($row1=mysqli_fetch_array($query1)) 
													{
													$query=mysqli_query($con,"select * from student where RegNo ='".$row1['UserName']."' && StudentStatus='Enable'");

														while($row=mysqli_fetch_array($query))
															{
																$depSelect = mysqli_query($con,"select * from  depertment where RegNo = '".$row1['UserName']."' && DepertmentName = '".$DepartmentQuery['DepertmentName']."'");
																while ( $depQuery = mysqli_fetch_array($depSelect)) 
																{
																

												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['RegNo']; ?></td>
													<td><?php echo $row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName']; ?></td>
													<td><?php echo $row['AcademicYear']; ?></td>
													<td><?php echo $row1['Role']; ?></td>
													<td><?php echo $row['PhoneNumber']; ?></td>
													<td><?php echo $row['Gender']; ?></td>
													<td>
													 	<?php
													 	$status = $row1['Role'];
													 	$FirstCharacter = $status[0];
													 	if ($FirstCharacter === 'F') 
													 	{
													 	?>
														 	<a href="former_cr_edt.php?Change=<?php echo $row1['ID']; ?>">
																<span class="fa fa-close fa-lg " style="padding-left: 25%; color:#FF3300;" title="Remove former">
																</span>
															</a>
													 	<?php
													 	}
													 	else
													 	{
													 	?>
														 	<a href="former_duration.php?Change=<?php echo $row1['ID']; ?>">
																<span class="fa fa fa-check-square-o fa-lg " style="padding-left: 25%; color:#000080;" title="Add former">
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
														}
															}
												?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
								<!-- END TABBED CONTENT -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include '../../dash_admin/include/footer_dataTables.php';
?>