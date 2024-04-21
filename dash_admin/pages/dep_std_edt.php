<?php
		include 'dashbroad.php';

		$userID=$_GET['Change'];
		$query=mysqli_query($con,"select * from depertment where RegNo ='$userID'");
		$row=mysqli_fetch_assoc($query);

?>

<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form method="post" action="dep_std_updt.php" autocomplete="off">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Department Information</h3>
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
				                            	</div>
				                            	<div class="form-group">
									                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                        Select department
									                </label>
									                <select name="Department" class="form-control" >
								                        <option><?php echo $row['DepertmentName'] ?></option>
								                        <option value="Socialstudy">Social study</option>
								                        <option value="Economics">Economics</option>
								                        <option value="Education">Education</option>
								                        <option value="Gender">Gender</option>
								                        <option value="ICT">ICT</option>
								                    </select>
	                                			</div>
	                                			<div class="form-group">
									               <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                       Select department location
									                </label>
									                 <select name="Deplocation" class="form-control" >
								                        <option><?php echo $row['Location'] ?></option>
								                        <option value="Gfloor">Ground floor</option>
								                        <option value="SecondFloor">Second floor</option>
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