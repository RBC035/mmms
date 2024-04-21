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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Class representative page</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">CR role</a></li>
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
													<th>FirstName</th>
													<th>SelectedYear</th>
													<th>Status</th>
											        <th>LastName</th>
											        <th> Edit</th>
											        <th> Disable</th>
									            </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
													$userSelect = mysqli_query($con,"select * from userole  where Role ='CR' || Role ='Former CR'");
													while ($userQuery=mysqli_fetch_array($userSelect)) 
													{

														$query=mysqli_query($con,"select * from student where RegNo ='".$userQuery['UserName']."' && StudentStatus='Enable'");
														while($row=mysqli_fetch_array($query))
														{

													?>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no ?></td>
															<td><?php echo $row['RegNo']; ?></td>
															<td><?php echo $row['FirstName']; ?></td>
													<?php
															$crSelect = mysqli_query($con,"select * from cr where RegNo = '".$userQuery['UserName']."'");
															while ($crQuery = mysqli_fetch_array($crSelect)) 
															{

													?>
															<td><?php echo $crQuery['SelectedYear'];  ?></td>
															<td><?php echo $crQuery['CrStatus']; ?></td>
													<?php
															}
													?>
															<td><?php echo $row['LastName']; ?></td>
															<td>
													             <a href="cr_role_edt.php?Change=<?php echo $row['RegNo']; ?>">
													                    <span class="fa fa-send " style="padding-left: 29%; color: #000080;" title="Edit">
													                                                        
													                     </span>
													            </a>
													        </td>
													        <td>
													        <?php
													        	$crs = $userQuery['Role'];
													        	$first = $crs[0];
													        	if ($first =='F') 
													        	{
													        ?>
													        	<a href="cr_role_del.php?Ddelete=<?php echo $userQuery['ID'];   ?>">
																	<span class="fa fa fa-close fa-lg " style="padding-left: 23%; color:#FF0000;" title="Add former">
																	</span>
																</a>
													        <?php
													        	}
													        	else
													        	{
													        ?>
									                         	<a href="cr_former_duration.php?Ddelete=<?php echo $userQuery['ID'];   ?>" onclick="return confirm('Are you sure want to disable this class representative..?')">
									                            	<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Disable">
									                                                        
									                                </span>
									                             </a>

									                        </td>
														</tr>
														<?php
															}
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
											<span class="label label-success lb-style-st-1"> 
												<a href="index.php" style="color:white" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
											</span>
										</div>
									</div>
									<div class="panel-body">
										<table class="table  table-bordered table-hover" id="dataTables-example" >
											<thead>
												<tr style="color: black;">
													<th>s/n</th>
													<th>Reg number</th>
													<th>FullName</th>
													<th>AcademicYear</th>
													<th>Level</th>
													<th>Gender</th>
													<th>Password</th>
													<th>Privillage</th>
													<th style="text-align: center;">Edit</th>
													<!-- <th style="text-align: center;" > Delete</th> -->
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select * from userole where Role ='CR'  || Role ='Former CR'");
														while($row=mysqli_fetch_array($query))
															{

												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['UserName']; ?></td>
												<?php
													$query1=mysqli_query($con,"select * from student where RegNo ='".$row['UserName']."' && StudentStatus='Enable'");
														while($row1=mysqli_fetch_array($query1))
														{
												?>
														<td><?php echo $row1['FirstName'].", ".$row1['MiddleName'].", ".$row1['LastName']; ?></td>
														<td><?php echo $row1['AcademicYear']; ?></td>
														<td><?php echo $row1['Level']; ?></td>
														<td><?php echo $row1['Gender']; ?></td>
												<?php
														}
												?>
													<td><?php echo $row['Password']; ?></td>
													<td><?php echo $row['Role']; ?></td>
													<td>
														<a href="add_role_edt.php?Change=<?php echo $row['ID']; ?>">
															<span class="fa fa-send " style=" color: #000080; padding-left: 4px;" title="Edit">
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