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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Class representatives page</a></li>
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
													<th>Gender</th>
													<th>SelectedYear</th>
													<th>Status</th>
													<th> Semister</th>
											        <th>Level</th>
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
															<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no ?></td>
															<td><?php echo $row['RegNo']; ?></td>
															<td><?php  echo $row['FirstName']." ".$row['MiddleName']." ".$row['LastName']; ?></td>
															<td><?php echo $row['Gender']; ?></td>
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
														<td><?php echo $row['Semister']; ?></td>
														<td><?php echo $row['Level']; ?></td>
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
									                         	<a href="cr_former_duration.php?Ddelete=<?php echo $userQuery['ID'];   ?>" onclick="return confirm('Are you sure want to disable this cr..?')">
									                            	<span class="fa fa-trash " style="color: #FF0000; padding-left: 25%;" title="Delete">
									                                                        
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