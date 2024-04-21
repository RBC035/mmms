<?php
	include '../../dash_admin/include/header_dataTables.php';
	require_once 'dashbroad.php';
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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Student Health</a></li>
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
													<th>Gender</th>
													<th> AcademicYear</th>
													<th>Semister</th>
													<th> Level</th>
													<th> Phone</th>
												<!-- 	<th> Gender</th> -->
												</tr>
											</thead>
											<tbody>
												<?php
											$no = 1;
											$query=mysqli_query($con,"select * from student where HealthInfo ='Has' && StudentStatus ='Enable'");
												while($row=mysqli_fetch_array($query))
													{

										?>
										<tr style="color: #000080; font-size: 14px;">
											<td><?php echo $no ?></td>
											<td><?php echo $row['RegNo']; ?></td>
											<td><?php echo $row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName']; ?></td>
											<td><?php echo $row['Gender']; ?></td>
											<td><?php echo $row['AcademicYear']; ?></td>
											<td><?php echo $row['Semister']; ?></td>
											<td><?php echo $row['Level']; ?></td>
											<td><?php echo $row['PhoneNumber']; ?></td>
										<!-- 	<td><?php echo $row['Gender']; ?></td> -->
										</tr>
										<?php
											$no = $no +  1;
												}
										?>
											</tbody>
										</table>
									</div>
									<div>
										<span class="label label-danger" style="font-size: 19px;"> 
												<a href="report_health.php" target="_blank" style="color:white;" class="fa fa-download "> Print doc &nbsp;<i class="fa fa-file-pdf-o"></i></a>  
										</span>
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