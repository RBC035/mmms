<?php
		include 'dashbroad.php';
		include '../include/header_dataTables.php'; 
?>
<div id="wrapper">
	<div class="main">
		<!-- <div class="main-content"> -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Select students report</h3>
							</div>
							<div class="panel-body" style="max-height: 550px; overflow-y: auto;">
									<ul class="list-unstyled activity-timeline nav nav-bg-cl">
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-group activity-icon"></i>
											<a href="report-all-std.php">All student report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-hospital-o activity-icon"></i>
											<a href="report-all-loan.php" >Student loan report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-medkit activity-icon"></i>
											<a href="report-all-health.php">Student Health Insurance report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-female activity-icon"></i>
											<a href="report-all-women.php">Student women report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-ambulance activity-icon"></i>
											<a href="report-all-no-health.php" >Student who don't have health insurance</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-gg activity-icon"></i>
											<a href="report-all-c-cr.php" >Current cr report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-ge activity-icon"></i>
											<a href="report-all-c-dsr.php" >Current dsr report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-drupal activity-icon"></i>
											<a href="report-all-c-minister.php" >Current minister report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-gg-circle activity-icon"></i>
											<a href="report-all-c-president.php" >Current president report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-graduation-cap activity-icon"></i>
											<a href="report-all-c-prime.php" >Current prime minister report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-user activity-icon"></i>
											<a href="report-all-c-vice.php" >Current vice president report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-gg activity-icon"></i>
											<a href="report-all-f-cr.php">Former cr report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-gg-circle activity-icon"></i>
											<a href="report-all-f-dsr.php">Former dsr report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-money activity-icon"></i>
											<a href="report-all-f-minister.php">Former minister report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-file-pdf-o activity-icon"></i>
											<a href="report-all-f-president.php">Former president report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-reddit activity-icon"></i>
											<a href="report-all-f-prime.php">Former prime minister report</a>
										</li>
										<li  style="margin-bottom : 5px;">
											<i class="fa fa-adn activity-icon"></i>
											<a href="report-all-f-vice.php">Former vice president report</a>
										</li>
									</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="main-content">
							<div class="panel">
								<div class="panel-heading">
									<div class="right">
										<span class="label label-primary" style="padding: 9px;"> 
											<a href="report_pre.php?ID=1" target="_blank" style="color:white; font-size: 15px" class="fa fa-download"> Print report &nbsp; <i class="fa fa-file-pdf-o"></i></a>
										</span>
									</div>
									<h3>FORMER PRESIDENT REPORT IN MASO GOVERNMENT</h3>
								</div>
								<div class="panel-body">
									<table class="table  table-bordered table-hover" id="dataTables-example" >
										<thead>
											<tr style="color: black; text-align: center;">
												<th>s/n</th>
												<th>Reg number</th>
												<th>FullName</th>
												<th>StartDate</th>
												<th>EndDate</th>
												<th>Duration</th>
												<th>Description</th>
											</tr>
										</thead>
										<tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && Possition ='Former President' &&  StudentStatus='Enable'");
													while ($row= mysqli_fetch_array($query)) 
													{
												?>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no ?></td>
															<td><?php echo $row['RegNo']; ?></td>
															<td><?php echo $row['FirstName']." ".$row['MiddleName']." ".$row['LastName']; ?></td>
												<?php
														$DurationSelect =  mysqli_query($con,"select * from duration where LeaderID = '".$row['LeaderID']."'");
													while ($DurationQuery = mysqli_fetch_array($DurationSelect)) 
													{
														$startDate = $DurationQuery['StartDate'];
														$endDate = $DurationQuery['EnDate'];

														$diff = abs(strtotime($endDate)-strtotime($startDate));

														$years = floor($diff / (365*60*60*24));
														$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
														$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

														$monthDay = $years." Year, ".$months." Month, ".$days." Days";
													
												?>
																<td><?php echo $startDate; ?></td>
																<td><?php echo $endDate; ?> </td>
																<td><?php echo $monthDay; ?></td>
																<td><?php echo $DurationQuery['Reason']; ?></td>
															</tr>
												<?php
															$no = $no + 1;
														}
														
													}
												?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</div>
</div>
<?php
	include '../include/footer_dataTables.php';
?>