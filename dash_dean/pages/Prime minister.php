
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
					<div class="row">
						<div class="col-md-12">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ministers page</h3>
								</div>
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
											<th>FirstName</th>
											<th>ElectedYear</th>
											<th>Status</th>
									        <th>LastName</th>
									        <th> Level</th>
									        <th> Semister</th>
							            </tr>
							        </thead>
									<tbody>
										<?php
										$no = 1;
											$query=mysqli_query($con,"select * from minister where MinisterPossition != 'Former Minister of Education' && MinisterPossition != 'Former Prime minister' && MinisterPossition != 'Former Minister of Finance' && MinisterPossition != 'Former Minister of Health' && MinisterPossition != 'Former Minister of Loan' && MinisterPossition != 'Former Minister of Women' && MinisterPossition != 'Former Minister of Information' && MinisterPossition != 'Former Minister of Security'");
											while($row=mysqli_fetch_array($query))
											{
												$selc=mysqli_query($con,"select * from selectedleader where LeaderID ='".$row['LeaderID']."'");
												while ($fet=mysqli_fetch_array($selc)) 
												{
													$student=mysqli_query($con,"select * from student where RegNo ='".$fet['RegNo']."' && StudentStatus ='Enable'");
													while ($st=mysqli_fetch_array($student)) 
													{
												
												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $fet['RegNo']; ?></td>
													<td><?php echo $st['FirstName']; ?></td>
													<td><?php echo $fet['ElectedYear']; ?></td>
													<td><?php echo $row['MinisterPossition']; ?></td>
													<td><?php echo $st['LastName']; ?></td>
													<td><?php echo $st['Level']; ?></td>
													<td><?php echo $st['Semister']; ?></td>
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
	include '../../dash_admin/include/footer_dataTables.php';
?>
	