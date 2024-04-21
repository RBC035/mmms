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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Ministers page</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Former ministers page</a></li>
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
													<th>UserName</th>
													<th>FullName</th>
													<th>ElectedYear</th>
													<th>Status</th>
											        <th>PhoneNumber</th>
											        <th> Edit</th>
											        <th> Disable</th>
												 </tr>
									        </thead>
									        <tbody>
											<?php
												$no = 1;

												$LeaderSelect = mysqli_query($con,"select * from selectedleader where RegNo='".$_SESSION['username']."'");
												$LeaderQuery = mysqli_fetch_array($LeaderSelect);

													$query=mysqli_query($con,"select * from minister where MinisterPossition != 'Former Minister of Loan' && MinisterPossition != 'Former Minister of Health' && MinisterPossition != 'Former Prime minister' && MinisterPossition != 'Former Minister of Finance' && MinisterPossition != 'Former Minister of Women' && MinisterPossition != 'Former Minister of Education' && MinisterPossition != 'Former Minister of Information' && MinisterPossition != 'Former Minister of Security'");
													while($row=mysqli_fetch_array($query))
													{
														$selc=mysqli_query($con,"select * from selectedleader where LeaderID ='".$row['LeaderID']."' && ElectedYear ='".$LeaderQuery['ElectedYear']."'");
														while ($fet=mysqli_fetch_array($selc)) 
														{
															$student=mysqli_query($con,"select * from student where RegNo ='".$fet['RegNo']."'");
															while ($st=mysqli_fetch_array($student)) 
															{
														
														?>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no ?></td>
															<td><?php echo $fet['RegNo']; ?></td>
															<td><?php echo $st['FirstName'].", ".$st['MiddleName'].", ".$st['LastName']; ?></td>
															<td><?php echo $fet['ElectedYear']; ?></td>
															<td><?php echo $row['MinisterPossition']; ?></td>
															<td><?php echo $st['PhoneNumber']; ?></td>
															<td>
																<a href="minister_edt.php?Change=<?php echo $row['LeaderID']; ?>">
																	<span class="fa fa-send " style="padding-left: 29%; color: #000080;" title="Edit">
																	</span>
																</a>
															</td>
															<td>
																<a href="minister_del_duration.php?Ddelete=<?php echo $row['MinisterID'];   ?>" onclick="return confirm('Are you sure want to disable this minister..?')">
																	<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
																		                                                        
																	</span>
																</a>
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
								<div class="tab-pane fade" id="tab-bottom-left2">
									<div class="panel-heading">
										<div class="left">
											<span class="label label-success" style="font-size: 19px;"> 
												<a href="index.php" style="color:white;" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
											</span>
										</div>
									</div>
									<div class="panel-body">
										<table class="table  table-bordered table-hover" id="dataTables-example" >
											<thead>
									            <tr style="color: black; text-align: center;">
									            	<th>s/n</th>
													<th>UserName</th>
													<th>FullName</th>
													<th>ElectedYear</th>
													<th>Status</th>
											        <th>PhoneNumber</th>
											        <th>Add</th>
												 </tr>
									        </thead>
									        <tbody>
											<?php
												$no = 1;

												$LeaderSelect = mysqli_query($con,"select * from selectedleader where RegNo='".$_SESSION['username']."'");
												$LeaderQuery = mysqli_fetch_array($LeaderSelect);

													$query=mysqli_query($con,"select * from minister where MinisterPossition != 'Minister of Loan' && MinisterPossition != 'Minister of Health' && MinisterPossition != 'Prime minister' && MinisterPossition != 'Minister of Finance' && MinisterPossition != 'Minister of Women' && MinisterPossition != 'Minister of Education' && MinisterPossition != 'Minister of Information' && MinisterPossition != 'Minister of Security'");
												if (mysqli_num_rows($query)>0) 
												{
												
													while($row=mysqli_fetch_array($query))
													{
														$selc=mysqli_query($con,"select * from selectedleader where LeaderID ='".$row['LeaderID']."' && ElectedYear ='".$LeaderQuery['ElectedYear']."'");
														while ($fet=mysqli_fetch_array($selc)) 
														{
															$student=mysqli_query($con,"select * from student where RegNo ='".$fet['RegNo']."'");
															while ($st=mysqli_fetch_array($student)) 
															{
														
														?>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no ?></td>
															<td><?php echo $fet['RegNo']; ?></td>
															<td><?php echo $st['FirstName'].", ".$st['MiddleName'].", ".$st['LastName']; ?></td>
															<td><?php echo $fet['ElectedYear']; ?></td>
															<td><?php echo $row['MinisterPossition']; ?></td>
															<td><?php echo $st['PhoneNumber']; ?></td>
															<td>
																<a href="minister_del_remove.php?Ddelete=<?php echo $row['MinisterID']; ?>">
																	<span class="fa fa fa-check-square-o fa-lg" style=" color:#000080;padding-left: 15%;" title="Add">
																				                                                        
																	</span>
																</a>
															</td>
														</tr>
												<?php
													$no = $no +  1;
															}
														}

													}
												}
												else
												{
												?>
													<tbody>
														<tr>
															<td>No data available in table</td>
														</tr>
													</tbody>
												<?php
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