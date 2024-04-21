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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Dean of student</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Former dean of student</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<div class="panel-heading">
										<div class="left">
											<span class="label label-success lb-style-st-1"> 
												<a href="index.php" style="color:white" class="fa fa-arrow-left "> Dashbroad  &nbsp;<i class="fa fa-home"></i></a>  
											</span>
										</div>
										<div class="right">
											<div class="row">
												<div class="col-md-9"></div>
												<div class="col-md-2">
													<div class=" modal-dialog modal-md">
														<span class="label label-primary lb-style-st-1"> 
															<a href="registration.php"  data-toggle="modal" data-target=".bd-example-modal-sm" style="color:white" class="fa fa-plus "> Add dean
																<span class="fa fa-user-circle"></span>
															</a>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<table class="table  table-bordered table-hover" id="dataTables-example" >
											<thead>
												<tr style="color: black; text-align: center;">
													<th>s/n</th>
													<th>Reg number</th>
													<th>Staff ID</th>
													<th>Privillage</th>
													<th>Password</th>
													<th style="text-align: center;"> Edit</th>
													<th style="text-align: center;"> Disable</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select * from userole where Role ='Dean of student'");
														while($row=mysqli_fetch_array($query))
															{
																$StaffSelect = mysqli_query($con,"select * from dean where RegNo = '".$row['UserName']."'");
																while ($StaffQuery = mysqli_fetch_array($StaffSelect)) 
																{

												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['UserName']; ?></td>
													<td><?php echo $StaffQuery['SaffID']; ?></td>
													<td><?php echo $row['Role']; ?></td>
													<td><?php echo $row['Password']; ?></td>
													<td>
														<a href="add_dean_edt.php?Change=<?php echo $row['ID']; ?>">
															<span class="fa fa-send " style="padding-left: 43%; color: #000080;" title="Edit">
															</span>
														</a>
													</td>
													<td>
														<a href="add_dean_del.php?Ddelete=<?php echo $row['ID'];   ?>" onclick="return confirm('Are you sure want to disable this dean of student..?')">
															<span class="fa fa-trash " style="color: #FF0000; padding-left: 35%;" title="Disable">
																                                                        
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
													<th>Reg number</th>
													<th>Privillage</th>
													<th>Password</th>
													<th style="text-align: center;">Add</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select * from userole where Role ='Former Dean of student'");
													if (mysqli_num_rows($query)>0) 
													{
											
														while($row=mysqli_fetch_array($query))
															{

												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['UserName']; ?></td>
													<td><?php echo $row['Role']; ?></td>
													<td><?php echo $row['Password']; ?></td>
													<td>
														<a href="add_dean_edt1.php?Add=<?php echo $row['ID']; ?>">
															<span class="fa fa-check-square-o fa-lg " style="padding-left: 38%; color: #000080;" title="Add">
															</span>
														</a>
												</tr>

												<?php
													$no = $no +  1;
														}
													}
													else
													{
												?>
													<tbody>
														<tr>
															<td>0</td>
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

	<!-- model plugin  -->
	<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-md" >
  			<div class="row">
  				<div class="col-md-2"></div>
  					<div class="col-md-7">
  						<div class="panel" style="border-radius: 15px; box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);">
  							<div class="panel-heading" >
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true" title="Cancel">
										<b style="color: #000080; font-size: 25px; ">
												                      &times;</b>
									</span>
								</button>
								<h3 class="panel-title" style="text-align: center; color: #000080;">
								<span  class="fa fa-group fa-lg" > </span> &nbsp;Add dean of student</h3>
							</div>
							<div class="panel-body">
								<form method="post" action="add_dean.php" autocomplete="off">
									<div class="form-group">
										<span  class="fa fa-user" style=" color: #000080;" > 
											<label style=" font-family: Times new roman; font-weight: bold; ">
												Staff ID
											</label>
										</span>
										<input type="text" name="Staff"  class="form-control"  placeholder="Please enter staff ID.." required title="Please enter staff ID.">
									</div>
									<div class="form-group">
										<input type="submit" name="signin" value="Register" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
									</div>
								</form>
							</div>
  						</div>
  					</div>
  				<div class="col-md-2"></div>
  			</div>
  		</div>
	</div>

<?php
	include '../include/footer_dataTables.php';
?>