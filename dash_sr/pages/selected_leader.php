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
													<th>FullName</th>
									                <th>PhoneNumber</th>
									                <th>Gender</th>
									                <th>Department</th>
													<th>ElectedYear</th>
									                <th>Position</th>
									                <th>Status</th>
												 </tr>
									        </thead>
									        <tbody>
												<?php
													$no = 1;
													$query=mysqli_query($con,"select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && Possition !='Former President' && StudentStatus='Enable'  && Possition !='Former DSR'");
															while($row=mysqli_fetch_array($query))
															{
																$dep =mysqli_query($con,"select * from depertment where RegNo ='".$row['RegNo']."'");
																while ($drow=mysqli_fetch_array($dep)) 
																{
																?>
																<tr style="color: #000080; font-size: 14px;">
																	<td><?php echo $no ?></td>
																	 <td><?php echo $row['FirstName'].", ".$row['MiddleName'].", ".$row['LastName']; ?></td>
																	 <td><?php echo $row['PhoneNumber']; ?></td>
																	 <td><?php echo $row['Gender']; ?></td>
																	 <td><?php echo $drow['DepertmentName']; ?> </td>
																	<td><?php echo $row['ElectedYear']; ?></td>
																	<td><?php echo $row['Possition']; ?></td>
																	<td><?php echo $row['Status']; ?></td>
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