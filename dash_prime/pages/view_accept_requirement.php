<?php
	include '../../dash_admin/include/header_dataTables.php';
	require_once 'dashbroad.php';
	//$userID = $_SESSION['EID'];
	$userID=$_GET['View'];
	
	$queryev=mysqli_query($con,"select * from event where EventID='".$userID."'");
	$rowe = mysqli_fetch_array($queryev);

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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" style="font-weight: bold; color: blue; font-family: Times new roman; font-size: 18px;"><?php echo $rowe['EventName']; ?></a></li>
								</ul>
							</div>
							<div class="panel-heading">
								<div class="left">
									<span class="label label-success" style="font-size: 20px;"> 
										<a href="minister_accepetd_event.php" style="color:white" class="fa fa-arrow-left "> Back to event</a>
									</span>
								</div>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<div class="panel-body">
										<table class="table  table-bordered table-hover" id="dataTables-example" >
											<thead>
												<tr style="color: black; text-align: center;">
													<th>s/n</th>
													<th>Requirement Name</th>
													<th>Requirement amount</th>
													<th>Requirement status</th>
													<th>Cost</th>
													<th>Accept</th>
													<th>Reject</th>					
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$requirement =mysqli_query($con,"select * from requirement where EventID = '".$userID."'");

															while ($row = mysqli_fetch_array($requirement)) 
															{
																if ($row['Rstatus'] == 'BLOCK') 
															{	
																$st = '<span class="label label-danger" style="font-size:14px; ">REJECTED</span>';
															}
															if ($row['Rstatus'] == 'RELEASED') 
															{
																$st ='<span class="label label-success" style="font-size:14px;">ACCEPTED</span>';
															}
															else
															{
																$st = '<span class="label label-danger" style="font-size:14px;">REJECTED</span>';
															}
												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['Rname']; ?></td>
													<td><?php echo $row['Ramount']; ?> </td>
													<td><?php echo $st; ?> </td>
													 <td> <?php echo $row['Rcost']; ?></td>
													<td>
														<a href="accept_requirement.php?Accept=<?php echo $row['Rid']; ?>">
															<span class="fa fa-check-square-o fa-lg" style="padding-left: 34%; color: #000080;" title="Accepted requirement">
															</span>
														</a>
													</td>
													<td>
														<a href="reject_requirement.php?Reject=<?php echo $row['Rid'];   ?>">
															<span class="fa fa-close fa-lg " style="padding-left: 18%; color:#FF3300;" title="Rejected requirement">
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