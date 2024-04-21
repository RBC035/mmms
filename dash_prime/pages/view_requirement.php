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
										<a href="minister_loan_event.php" style="color:white" class="fa fa-arrow-left "> Back to event</a>
									</span>
								</div>
								<div class="right">
									<span class="label label-primary" style="font-size: 20px;"> 
										<a href="add_requirement.php?Add=<?php echo $userID; ?>" style="color:white" class="fa fa-plus "> Add requirement</a>
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
													<th>Cost</th>
													<th>Edit</th>
													<th>Delete</th>				
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$requirement =mysqli_query($con,"select * from requirement where EventID = '".$userID."'");

															while ($row = mysqli_fetch_array($requirement)) 
															{
												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['Rname']; ?></td>
													<td><?php echo $row['Ramount']; ?> </td>
													 <td> <?php echo $row['Rcost']; ?></td>
													<td>
														<a href="view_requirement_edit.php?View=<?php echo $row['Rid']; ?>">
															<span class="fa fa-send " style="padding-left: 29%; color:#000080;" title="View requirement">
															</span>
														</a>
													</td>
													<td>
														<a href="view_requirement_del.php?Ddelete=<?php echo $row['Rid'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
															<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete event">
																                                                        
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
									<div style="margin-right: 14px;">
										<span class="label label-danger" style="font-size: 19px;"> 
												<a href="budget_single.php?BID=<?php echo $userID; ?>" target="_blank" style="color:white;" class="fa fa-download "> Print event &nbsp;<i class="fa fa-file-pdf-o"></i></a>  
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