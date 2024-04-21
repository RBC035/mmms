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
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Class representative page</a></li>
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
													<!-- <th>UserName</th> -->
													<th>FullName</th>
													<th>PhoneNumber</th>
													<th>SelectedYear</th>
													<th>Program name</th>
													<th>Status</th>
											        <th>Level</th>
											        <th> Semister</th>
									            </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
														$query=mysqli_query($con,"select student .* , cr  .* from student , cr  where student.RegNo =  cr.RegNo && StudentStatus='Enable' && CrStatus != 'Former CR' && CrStatus != 'Former Assistance' ");
														while($row=mysqli_fetch_array($query))
														{
															$prog =mysqli_query($con,"select * from program where RegNo ='".$row['RegNo']."'");
															while ($prow=mysqli_fetch_array($prog)) 
															{
													?>
														<tr style="color: #000080; font-size: 14px;">
															<td><?php echo $no ?></td>
														<!-- 	<td><?php echo $row['RegNo']; ?></td> -->
															<td><?php echo $row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName']; ?></td>
															<td><?php echo $row['PhoneNumber']; ?></td>
															<td><?php echo $row['SelectedYear']; ?></td>
															<td><?php echo $prow['ProgramName']; ?></td>
															<td><?php echo $row['CrStatus']; ?></td>
															<td><?php echo $row['Level']; ?></td>
															<td><?php echo $row['Semister']; ?></td>
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
	include '../../dash_admin/include/footer_dataTables.php';
?>