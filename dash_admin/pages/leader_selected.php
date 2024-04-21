<?php
	include '../include/header_dataTables.php';
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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Seleted leader page</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Seleted leader  role</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<div class="panel-heading">
										<div class="left">
											<span class="label label-primary lb-style-st-1"> 
												<a href="index.php" style="color:white" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
											</span>
										</div>
									</div>
									<div class="panel-body">
										<table class="table  table-bordered table-hover" id="dataTables-example" >
											<thead>
									            <tr style="color: black; text-align: center;">
									            	<th>s/n</th>
													<th>UserName</th>
													<th>ElectedYear</th>
													<th>Status</th>
									                <th>Position</th>
									                <th> Edit</th>
									                <th> Delete</th>
												 </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select * from selectedleader where Status='Selected' ");
															while($row=mysqli_fetch_array($query))
															{

																?>
																<tr style="color: #000080; font-size: 14px;">
																	<td><?php echo $no ?></td>
																	<td><?php echo $row['RegNo']; ?></td>
																	<td><?php echo $row['ElectedYear']; ?></td>
																	<td><?php echo $row['Status']; ?></td>
																	<td><?php echo $row['Possition']; ?></td>
																	<td>
															             <a href="selected_edt.php?Change=<?php echo $row['RegNo']; ?>">
															                    <span class="fa fa-send " style="padding-left: 31%; color: #000080;" title="Edit">
															                                                        
															                     </span>
															            </a>
															        </td>
															        <td>
																		<a href="selected__del.php?Ddelete=<?php echo $row['RegNo'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
																			<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
																				                                                        
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
								<div class="tab-pane fade" id="tab-bottom-left2">
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
												<tr style="color: black; ">
													<th>s/n</th>
													<th style="text-align: center;">Reg number</th>
													<th style="text-align: center;">Password</th>
													<th style="text-align: center;">Privillage</th>
													<th style="text-align: center;">Edit</th>
													<th style="text-align: center;"> Delete</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select * from userole except select * from userole where Role ='Admin'  except select * from userole where Role ='CR'");
														while($row=mysqli_fetch_array($query))
															{

												?>
												<tr style="color: #000080; font-size: 14px; text-align: center;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['UserName']; ?></td>
													<td><?php echo $row['Password']; ?></td>
													<td><?php echo $row['Role']; ?></td>
													<td>
														<a href="selected_role_edt.php?Change=<?php echo $row['UserName']; ?>">
															<span class="fa fa-send " style=" color: #000080;" title="Edit">
															</span>
														</a>
													</td>
													<td>
														<a href="selected_role_del.php?Ddelete=<?php echo $row['UserName'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
															<span class="fa fa-trash " style="color: #FF0000;" title="Delete">
																                                                        
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
	include '../include/footer_dataTables.php';
?>