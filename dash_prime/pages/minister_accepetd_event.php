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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">View minister event</a></li>
								</ul>
							</div>
							<div class="panel-heading">
								<div class="left">
									<span class="label label-primary" style="font-size: 19px;"> 
										<a href="index.php" style="color:white;" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
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
													<th>EventName</th>
													<th>Date</th>
													<th>EventStatus</th>
													<th>Total Cost</th>
													<th>View</th>
													<th>Accept</th>
													<th>Reject</th>				
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$userID=$_SESSION['username'];
													// to get leaderID
													$seleader=mysqli_query($con,"select * from selectedleader where RegNo ='".$userID."'");
													$leaderow=mysqli_fetch_array($seleader);
												 	$leader= $leaderow['LeaderID']; 

													// to get ministerID
													$selmin=mysqli_query($con,"select * from minister where LeaderID ='".$leader."'");
													$minrow=mysqli_fetch_array($selmin);
													$mini= $minrow['MinisterID'];

													$query=mysqli_query($con,"select * from event where MinisterID='".$mini."'");
														while($row=mysqli_fetch_array($query))
															{
																$requirement =mysqli_query($con,"select * from requirement where EventID = '".$row['EventID']."'");
																// overal
																$overal = 0;

															while ($requirow = mysqli_fetch_array($requirement)) 
															{
																$number1 =$requirow['Ramount'];
																$number2 =$requirow['Rcost'] ;
																$total =$number1* $number2;
																$overal =  $total + $overal ;
															}	
															if ($row['Estatus'] == 'BLOCK') 
															{	
																$st = '<span class="label label-danger" style="font-size:14px; ">REJECTED</span>';
															}
															if ($row['Estatus'] == 'RELEASED') 
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
													<td><?php echo $row['EventName']; ?></td>
													<td><?php echo $row['EventDate']; ?> </td>
													<td><?php echo $st; ?> </td>
													<td> <?php echo $overal; ?></td>
													<td>
														<?php
																$Eid =$_SESSION['EID'] = $row['EventID'];
														?>
														<a href="view_accept_requirement.php?View=<?php echo $Eid; ?>">
															<span class="fa fa-eye fa-lg" style="padding-left: 29%; color:	#333300;" title="view requirement">
															</span>
														</a>
													</td>
													<td>
														<a href="accept_event.php?Accept=<?php echo $row['EventID']; ?>">
															<span class="fa fa-check-square-o fa-lg" style="padding-left: 34%; color: #000080;" title="Accepted event">
															</span>
														</a>
													</td>
													<td>
														<?php
																$Eid =$_SESSION['EID'] = $row['EventID'];
														?>
														<a href="reject_event.php?Reject=<?php echo $Eid; ?>">
															<span class="fa fa-close fa-lg " style="padding-left: 18%; color:#FF3300;" title="Rejected event">
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