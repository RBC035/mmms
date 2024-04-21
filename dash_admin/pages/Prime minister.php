
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
					<div class="row">
						<div class="col-md-12">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ministers page</h3>
								</div>
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
											<th>FullName</th>
											<th>ElectedYear</th>
											<th>Status</th>
											<th>PhoneNumber</th>
											<th>Edit</th>
											<th>Disable</th>
							            </tr>
							        </thead>
									<tbody>
										<?php
										$no = 1;
											$query=mysqli_query($con,"select * from minister");
											while($row=mysqli_fetch_array($query))
											{
												$selc=mysqli_query($con,"select * from selectedleader where LeaderID ='".$row['LeaderID']."'");
												while ($fet=mysqli_fetch_array($selc)) 
												{
													$student=mysqli_query($con,"select * from student where RegNo ='".$fet['RegNo']."'");
													while ($st=mysqli_fetch_array($student)) 
													{
												
												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $fet['RegNo']; ?></td>
													<td><?php echo $st['FirstName']." ".$st['MiddleName']." ".$st['LastName']; ?></td>
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
														<?php
															$minister = $row['MinisterPossition'];
															$character = $minister[0];
															if ($character == 'F') 
															{
														?>
														 	<a href="minister_del_remove.php?Ddelete=<?php echo $row['MinisterID']; ?>">
																<span class="fa fa fa-close fa-md " style="padding-left: 25%; color:#FF0000;" title="Add former">
																</span>
															</a>
														<?php
															}
															else
															{
														?>
														<a href="minister_del_duration.php?Ddelete=<?php echo $row['MinisterID'];   ?>" onclick="return confirm('Are you sure want to disable this minister..?')">
																<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
																				                                                        
																</span>
														</a>
														<?php
															}
														?>
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
			</div>
		</div>
	</div>

<?php
	include '../include/footer_dataTables.php';
?>
	