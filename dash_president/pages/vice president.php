
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
									<h3 class="panel-title"> Vice President page</h3>
								</div>
							<div class="panel-body">
								<table class="table  table-bordered table-hover" id="dataTables-example" >
									<thead>
							            <tr style="color: black; text-align: center;">
							            	<th>s/n</th>
											<th>UserName</th>
											<th>FirstName</th>
											<th>MiddleName</th>
											<th>LastName</th>
							                <th>Password</th>
							                <th> Edit</th>
							                <th> Delete</th>
							            </tr>
							        </thead>
									<tbody>
										<?php
										$role = 'vice president';
										$no = 1;
											$query=mysqli_query($con,"select student_list .* , user_role .* from student_list , user_role where student_list.RegNo = user_role.RegNo && Status  = '$role'");
											while($row=mysqli_fetch_array($query))
											{

												?>
												<tr style="color: #000080; font-size: 14px;">
													<td><?php echo $no ?></td>
													<td><?php echo $row['RegNo']; ?></td>
													<td><?php echo $row['FirstName']; ?></td>
													<td><?php echo $row['MiddleName']; ?></td>
													<td><?php echo $row['LastName']; ?></td>
													<td><?php echo $row['Password']; ?></td>
													<td>
											             <a href="vice_role_edt.php?Change=<?php echo $row['ID']; ?>">
											                    <span class="fa fa-send " style="padding-left: 29%; color: #000080;" title="Edit">
											                                                        
											                     </span>
											            </a>
											        </td>
													<td>
							                         	<a href="vice_role_del.php?Ddelete=<?php echo $row['ID'];   ?>" onclick="return confirm('Are you sure want to delete..?')">
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
		</div>
	</div>

<?php
	include '../../dash_admin/include/footer_dataTables.php';
?>
	