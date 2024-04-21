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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">View minister events</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<div class="panel-body">
										<table class="table  table-bordered table-hover" id="dataTables-example" >
											<thead>
												<tr style="color: black; text-align: center;">
													<th>s/n</th>
													<th>Full Name</th>
													<th>Minister Possition</th>
													<th>Elected Year</th>
													<th>Event Name</th>
													<th>Event Date</th>
													<th>View Event</th>
												</tr>
											</thead>
											<tbody>
												<!-- <?php
													//$no = 1;
													//$query=mysqli_query($con,"select * from student ");
														//while($row=mysqli_fetch_array($query))
															{

												?> -->
												<tr style="color: #000080; font-size: 14px;">
													<td><!-- <?php //echo $no ?> -->1</td>
													<td><!-- <?php //echo $row['RegNo']; ?> -->2</td>
													<td><!-- <?php //echo $row['FirstName']; ?> -->3</td>
													<td><!-- <?php //echo $row['LastName']; ?> -->4</td>
													<td><!-- <?php// echo $row['AcademicYear']; ?> -->5</td>
													<td><!-- <?php //echo $row['Level']; ?> -->6</td>
													<td>
													 	<a href="view_event.php?Add=<!-- <?php// echo $row['RegNo']; ?> -->">
															<span class="fa fa-eye " style="padding-left: 29%; color: red;" title="View requirement">
															</span>
														</a>
													</td>
												</tr>
												<?php
													//$no = $no +  1;
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