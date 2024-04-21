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
									                <th> Disable</th>
												 </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo ");
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
															             <a href="selected_edt.php?Change=<?php echo $row['LeaderID']; ?>">
															                    <span class="fa fa-send " style="padding-left: 31%; color: #000080;" title="Edit">
															                                                        
															                     </span>
															            </a>
															        </td>
															        <td>
															        <?php
															        	$Leader = $row['Possition'];
															        	$FirstLetter = $Leader[0];

															        	if ($FirstLetter == 'F') 
															        	{
															        ?>
															        	  <a href="selected__del.php?Ddelete=<?php echo $row['LeaderID'];   ?>">
																			<span class="fa fa fa-close fa-md " style="padding-left: 25%; color:#FF0000;" title="Add former">
																			</span>
																		  </a>
																	<?php
															        	}
															        	else
															        	{
															        ?>
																		<a href="selected__del_duration.php?Ddelete=<?php echo $row['LeaderID'];   ?>" onclick="return confirm('Are you sure want to disable this leader..?')">
																			<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
																				                                                        
																			</span>
																		</a>
																	</td>
																</tr>
												<?php
																		}
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
													<th>Reg number</th>
													<th>Password</th>
													<th>Privillage</th>
													<th>Edit</th>
													<th> Disable</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select * from userole except select * from userole where Role ='Admin'  except select * from userole where Role ='CR'  except select * from userole where Role ='Former CR' except select * from userole where Role ='Former Dean of student' except select * from userole where Role ='Dean of student'");
														while($row=mysqli_fetch_array($query))
															{

												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['UserName']; ?></td>
													<td><?php echo $row['Password']; ?></td>
													<td><?php echo $row['Role']; ?></td>
													<td>
														<a href="selected_role_edt.php?Change=<?php echo $row['ID']; ?>">
															<span class="fa fa-send " style=" color: #000080; padding-left: 20px;" title="Edit">
															</span>
														</a>
													</td>
													<td>
													<?php
														$Leaderole = $row['Role'];
														$FirstLetter = $Leaderole[0];

														if ($FirstLetter == 'F') 
														{
													?>
															 <a href="selected_role_del.php?Ddelete=<?php echo $row['ID'];   ?>">
																<span class="fa fa fa-check-square-o " style="padding-left: 25%; color:#000080;" title="Add former">
																</span>
															</a>
													<?php
														}
														else
														{
													?>
														<a href="selected_role_del.php?Ddelete=<?php echo $row['ID'];   ?>" onclick="return confirm('Are you sure want to disable leader role..?')">
															<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Disable">
																                                                        
															</span>
														</a>
													</td>
												</tr>
												<?php
													$no = $no +  1;
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
	include '../include/footer_dataTables.php';
?>