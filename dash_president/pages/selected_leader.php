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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Seleted leader page</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Former leader page</a></li>
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
													<th>ElectedYear</th>
													<th>Status</th>
													<th>Department</th>
									                <th>Position</th>
									                <th> Edit</th>
									                <th> Add</th>
									                <th>Disable</th>
												 </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
													$id=$_SESSION['username'];

													$LeaderSelect = mysqli_query($con,"select * from selectedleader where RegNo ='$id'");
													$LeaderQuery = mysqli_fetch_array($LeaderSelect);

													$query=mysqli_query($con,"select * from selectedleader where RegNo !='$id' && Possition !='President' && Possition !='Vice President' && Possition !='Former DSR' && ElectedYear ='".$LeaderQuery['ElectedYear']."'");
															while($row=mysqli_fetch_array($query))
															{
																$dep =mysqli_query($con,"select * from depertment where RegNo ='".$row['RegNo']."'");
																while ($drow=mysqli_fetch_array($dep)) 
																{
																?>
																<tr style="color: #000080; font-size: 14px;">
																	<td><?php echo $no ?></td>
																	<td><?php echo $row['RegNo']; ?></td>
																	<td><?php echo $row['ElectedYear']; ?></td>
																	<td><?php echo $row['Status']; ?></td>
																	<td><?php echo $drow['DepertmentName']; ?> </td>
																	<td><?php echo $row['Possition']; ?></td>
																	<td>
															             <a href="selected_edt.php?Change=<?php echo $row['RegNo']; ?>">
															                    <span class="fa fa-send " style="padding-left: 31%; color: #000080;" title="Edit">
															                                                        
															                     </span>
															            </a>
															        </td>
															        <td>
																	 	<a href="selected_add.php?Add=<?php echo $row['LeaderID']; ?>">
																			<span class="fa fa-plus " style="padding-left: 29%; color: #000080;" title="Add minister">
																			</span>
																		</a>
																	</td>
															        <td>
																		<a href="selected__del_duration.php?Ddelete=<?php echo $row['LeaderID'];   ?>" onclick="return confirm('Are you sure want to disable this leader..?')">
																			<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
																				                                                        
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
													<th>Full Name</th>
													<th>PhoneNumber</th>
													<th>ElectedYear</th>
													<th>Status</th>
													<th>Department</th>
									                <th>Position</th>
									                <th> Add</th>
												 </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
													$id=$_SESSION['username'];
													$query=mysqli_query($con,"select * from selectedleader where RegNo !='$id' && Possition !='President' && Possition !='Vice President' && Possition !='DSR'  && ElectedYear ='".$LeaderQuery['ElectedYear']."'");
													if (mysqli_num_rows($query)>0) 
													{
															while($row=mysqli_fetch_array($query))
															{
																$std = mysqli_query($con,"select * from student where RegNo ='".$row['RegNo']."'");
																  while ($stdrow = mysqli_fetch_array($std)) 
																  {
																  
																	$dep =mysqli_query($con,"select * from depertment where RegNo ='".$row['RegNo']."'");
																	while ($drow=mysqli_fetch_array($dep)) 
																	{
																?>
																<tr style="color: #000080; font-size: 14px;">
																	<td><?php echo $no ?></td>
																	<td><?php echo $row['RegNo']; ?></td>
																	<td><?php echo $stdrow['FirstName'].", ".$stdrow['MiddleName'].", ".$stdrow['LastName']; ?></td>
																	<td><?php echo $stdrow['PhoneNumber'] ?></td>
																	<td><?php echo $row['ElectedYear']; ?></td>
																	<td><?php echo $row['Status']; ?></td>
																	<td><?php echo $drow['DepertmentName']; ?> </td>
																	<td><?php echo $row['Possition']; ?></td>
															        <td>
																		<a href="selected_del_remove.php?Ddelete=<?php echo $row['LeaderID'];   ?>">
																			<span class="fa fa fa-check-square-o fa-lg" style=" color:#000080;padding-left: 15%;" title="Delete">
																				                                                        
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