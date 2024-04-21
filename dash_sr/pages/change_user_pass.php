<?php
		include 'dashbroad.php';

?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Change password</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
										<a href="index.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
									</div>
								</div>
								<?php
								  if (isset($_GET['EMPTYSPACE']) && $_GET['EMPTYSPACE']== "0") 
								 {
								 	echo "<b style='color: red; margin-left: 110px; font-family: Times new roman;'>"."FILL EMPTY SPACE..!
								"."</b>";
								 }

								  if (isset($_GET['WRONG']) && $_GET['WRONG']== "1") 
								 {
								 	echo "<b style='color: red; margin-left: 60px; font-family: Times new roman;'>"."NEW PASSWORD IS NOT UPDATED..!
								"."</b>";
								 }
								?>
							<div class="panel-body">
								<form method="post" action="change_user_pass_updt.php">
									<div class="form-group">
	                                    <span >
	                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
	                                                        Current password
	                                        </label> 
	                                        <input type="password" name="Currentps"  class="form-control" placeholder="Enter current password">
	                                     </span>
										<span class="text-danger">
											<?php
												if (isset($_GET['OLD']) && $_GET['OLD']== "1") 
												    {
												    	echo "Current password is not match.";
												    }
											?>
										</span>
                                	</div>
                                	<div class="form-group">
	                                    <span >
	                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
	                                                        New password
	                                        </label>
	                                        <input type="password" name="Newps"  class="form-control" placeholder="Enter new password">
	                                     </span>
                                	</div>
                                	<div class="form-group">
	                                    <span >
	                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
	                                                      Confirm  new password
	                                        </label>
	                                        <input type="password" name="ConfirmNewps"  class="form-control" placeholder="Confirm new password">
	                                     </span>
										<span class="text-danger">
											<?php
												if (isset($_GET['CONFIRM']) && $_GET['CONFIRM']== "0") 
												    {
												    	echo "Confirm password is not match.";
												    }
											?>
										</span>
                                	</div>
                                	<div class="form-group">
                                    <input type="submit" name="changeps" value="Change password" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
                               		</div>
								</form>
							</div>
							</div>
							<!-- END TASKS -->
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
