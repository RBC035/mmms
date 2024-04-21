<?php
	include '../../dash_admin/include/header_dataTables.php';
	require_once 'dashbroad.php';
	$id=$_SESSION['username'];

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
									<!--li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Seleted leader  role</a></li-->
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
													<th>SelectedYear</th>
													<th>Status</th>
									                <th>Position</th>
									                <th> Edit</th>
									                <th> Add</th>
									                <th> Delete</th>
												 </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;

													$LeaderSelect = mysqli_query($con,"select * from selectedleader where RegNo ='".$_SESSION['username']."'");
													$LeaderQuery = mysqli_fetch_array($LeaderSelect);

													$query=mysqli_query($con,"select * from selectedleader where Status = 'Selected' && RegNo !='$id' && Possition !='President' && Possition !='Vice President'  && ElectedYear ='".$LeaderQuery['ElectedYear']."'");
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
																	 	<a href="selected_add.php?Add=<?php echo $row['LeaderID']; ?>">
																			<span class="fa fa-plus " style="padding-left: 29%; color: #000080;" title="Add minister">
																			</span>
																		</a>
																	</td>
															        <td>
																		<a href="selected__del.php?Ddelete=<?php echo $row['LeaderID'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
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