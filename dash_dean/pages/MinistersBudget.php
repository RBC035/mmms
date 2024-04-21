<?php
require_once 'dashbroad.php';

	$ID = $_GET['ID'];
	if ($ID == 0) 
	{
		$msrLoan =mysqli_query($con,"select * from minister  where 	MinisterPossition ='Minister of Loan' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{
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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral = 0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											 // total overole
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
												echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
											?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
		else
		{
?>
			<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of loan budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}
	if ($ID == 1) 
	{
		$msrLoan =mysqli_query($con,"select * from minister where 	MinisterPossition ='Minister of Health' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$LoanRow['MinisterPossition']." ,".$LoanRow['MinisterID'];
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{
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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral = 0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
												echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
											?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
		else
		{
?>
			<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of health budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php	
		}
	}
	if ($ID == 2) 
	{
		$msrLoan =mysqli_query($con,"select * from minister where 	MinisterPossition ='Minister of Finance' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$LoanRow['MinisterPossition']." ,".$LoanRow['MinisterID'];
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{
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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral = 0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
													echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
												?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php			
		}
		else
		{
?>
			<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of finance budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}
	if ($ID == 3) 
	{
		$msrLoan =mysqli_query($con,"select * from minister where 	MinisterPossition ='Minister of Women' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$LoanRow['MinisterPossition']." ,".$LoanRow['MinisterID'];
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{

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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral = 0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
													echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
												?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
		else
		{
?>
			<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of women budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php			
		}
	}
	if ($ID == 4) 
	{
		$msrLoan =mysqli_query($con,"select * from minister where 	MinisterPossition ='Minister of Security' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$LoanRow['MinisterPossition']." ,".$LoanRow['MinisterID'];
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{
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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral = 0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
													echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
												?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
		else
		{
?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of security budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php

		}
	}
	if ($ID == 5) 
	{
		$msrLoan =mysqli_query($con,"select * from minister where 	MinisterPossition ='Minister of Education' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$LoanRow['MinisterPossition']." ,".$LoanRow['MinisterID'];
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{
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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral =0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
													echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
												?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
		else
		{
?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of education budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php

		}
	}
	if ($ID == 6) 
	{
		$msrLoan =mysqli_query($con,"select * from minister where 	MinisterPossition ='Minister of Information' order by MinisterID desc limit 1");
		$LoanRow= mysqli_fetch_assoc($msrLoan);
		$LoanRow['MinisterPossition']." ,".$LoanRow['MinisterID'];
		$eventBlock = mysqli_query($con,"select * from event where MinisterID ='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
		$eRow= mysqli_fetch_assoc($eventBlock);
		if ($enums= mysqli_num_rows($eventBlock)>0) 
		{
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
									<?php
										// to get electedYear and std regno
										$seleader=mysqli_query($con,"select * from selectedleader where LeaderID ='".$LoanRow['LeaderID']."'");
										$leaderow=mysqli_fetch_array($seleader);
									?>
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">
										<span style="color: black; font-size: 20px;">
											<?php echo 'The Budget Report of '. $LoanRow['MinisterPossition'].' In Academic Year '.$leaderow['ElectedYear']; ?>	
										</span>
									</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										$no = 1;
										// total overal
										$TotalOveral = 0;
										$eventquery = mysqli_query($con,"select * from event where MinisterID='".$LoanRow['MinisterID']."' && Estatus= 'RELEASED'");
										while ($fetchev=mysqli_fetch_array($eventquery)) 
										{
									?>
									<div class="panel-heading">
										<b><span style="color: black;"><?php echo $no.") ".$fetchev['EventName']; ?></span></b>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-md-10">
												<table class="table  table-bordered table-hover">
													<thead>
														<tr style="color: black; text-align: center;">
															<th>s/n</th>
															<th>Requirement Name</th>
															<th>Requirement Amount</th>
															<th>Requirement Cost</th>
														</tr>
													</thead>
													<?php
														$no2 = 1;
														// over role variable
														$overal = 0;
														$query=mysqli_query($con,"select event .* , requirement .* from event , requirement where event.EventID = requirement.EventID && MinisterID='".$LoanRow['MinisterID']."' && EventName='".$fetchev['EventName']."' && Rstatus='RELEASED'");
														if (mysqli_num_rows($query)>0) 
														{
															while($row=mysqli_fetch_array($query))
															{
													?>
													<tbody>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no2;?></td>
															<td><?php echo $row['Rname']; ?></td>
															<td><?php echo $row['Ramount']; ?></td>
															<td><?php echo $row['Rcost']; ?></td>
														</tr>
													</tbody>
													<?php
																$no2 = $no2 +1;
																$number1 =$row['Ramount'];
																$number2 =$row['Rcost'] ;
																$total =$number1* $number2;
																
																$overal =  $total + $overal ;
															}
														}
														else
														{
													?>
													<tfoot> 
														<tr style="color: #000080; font-size: 14px;">
															<td>
																Requirements
															</td>
															<td>of this event is not accepted by the Cabinet</td>
															<td>and Students Representative</td>
															<td>Parliament (SRP)</td>
														</tr>
													</tfoot> 
													<?php
														}
													?>
													<table class="table table-hover">
														<tbody>
															<tr style="color: #000080; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
															<tr style="color: #fff; font-size: 14px;">
																<td>
																	<div class="row">
																		<div class="col-md-7"></div>
																		<div class="col-md-4">Total:</div>
																		<div class="col-md-8"></div>
																	</div>
																</td>
																<td>
																	<div class="row">
																		<div class="col-md-4">
																			<?php echo $overal;?>	
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</table>
											</div>
										</div>
									</div>
									<?php
											$no = $no +  1;
											$TotalOveral = $overal + $TotalOveral;
										}
									?>
									<div class="row">
										<div class="col-md-9">
											<b style="color: black; margin-left: 20px;">
												<?php
													echo "The Total Budget in ".$LoanRow['MinisterPossition']." in academic yaer ".$leaderow['ElectedYear']." is ". $TotalOveral;
												?>
											</b>
										</div>
										<div class="col-md-3">
											<div class="panel" style="border-radius: 0px 30px 30px 30px; background-color: #0000CC;">
												<div class="panel-body text-primary">
													<dfn style="font-size: 17px; ">
														<a href="budget_report.php?ID=<?php echo $LoanRow['MinisterID']; ?>" target="_blank" style="color: white;" >
														<i class="fa fa-check-circle fa-2x "></i>
														Print budget report &nbsp;
														<i class="fa fa-download"></i>
														</a>
													</dfn>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php			
		}
		else
		{
?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<div class="panel" style="border-radius: 0px 35px 30px 30px;">
								<div class="panel-body text-primary">
									<dfn style="font-size: 17px; ">
										<i class="fa fa-info-circle fa-2x "></i>
										The minister of Information, Arts, Culture and Sports budget is not accepted by the Cabinet and Students’ Representative Parliament (SRP) Once it will be accepted, it will appear here..
									</dfn>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}


?>