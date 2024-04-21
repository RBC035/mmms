<?php
	include 'dashbroad.php';
	$userID=$_GET['Change'];

	$sel =mysqli_query($con,"select * from userole where ID ='".$userID."'");
	$row=mysqli_fetch_assoc($sel);
?>
<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form method="post" action="selected_role_updt1.php" autocomplete="off">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Change user password</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
													 <a href="selected_leader.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
												</div>
											</div>
											<div class="panel-body">
												<div class="form-group">
									               	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                         Reg number
									                </label>
									                <input type="text" name="regno1"  class="form-control"  readonly="readonly" value="<?php echo $row['UserName'] ;?>">
									                <input type="hidden" name="regno"  class="form-control"  readonly="readonly" value="<?php echo $row['ID'] ;?>">
				                            	</div>
	                                			<div class="form-group">
									                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                       Password
									                </label>
									               <input type="text" name="pass"  class="form-control"  value="<?php echo $row['Password'] ;?>">
	                                			</div>
	                                			<div class="form-group">
	                                   			<input type="submit" name="update_std" value="Update" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
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