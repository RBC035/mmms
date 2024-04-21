<?php
		include 'dashbroad.php';

		$userID=$_GET['Change'];
		$query=mysqli_query($con,"select * from  program where Pid ='$userID' ");
		$row=mysqli_fetch_assoc($query);

?>

<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form method="post" action="program_updt.php" autocomplete="off">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Program Information</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
													 <a href="student.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
												</div>
											</div>
											<div class="panel-body">
												<div class="form-group">
									               	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                         Reg number
									                </label>
									                <input type="text" name="regno"  class="form-control"  readonly="readonly" value="<?php echo $row['RegNo'] ;?>">
									                <input type="hidden" name="ProID"  class="form-control"  readonly="readonly" value="<?php echo $row['Pid'] ;?>">
				                            	</div>
				                            	<div class="form-group">
								                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                            Select std course
								                   	</label>
								                    <select name="program"   class="form-control" >
								                        <option><?php echo $row['ProgramName'] ?></option>
								                        <option value="Accountancy">Accountancy</option>
								                        <option value="Business Administration">Business Administration</option>
								                        <option value="Procurement and Supply">Procurement and Supply</option>
								                        <option value="Economic Development">Economic Development</option>
								                        <option value="Social Studies">Social Studies</option>
								                        <option value="Human Resource">Human Resource</option>
								                        <option value="Record Management">Record Management</option>
								                        <option value="Library Management">Library Management</option>
								                        <option value="Management of Social Development"> Management of Social Development</option>
								                        <option value="Education">Education</option>
								                        <option value="Gender Issues Development">Gender Issues Development</option>
								                        <option value="Community Development">Community Development</option>
								                        <option value="Youth Work">Youth Work</option>
								                        <option value="ICT">ICT</option>
								                    </select>
	                                			</div>
	                                			<div class="form-group">
	                                   			<input type="submit" name="update_std" value="Change" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
	                               				</div>
											</div>
										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>