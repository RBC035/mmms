<?php
	require_once 'dashbroad.php';
	$userID=$_GET['Add'];

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
									<h3 class="panel-title">Add requirement</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
										<a href="minister_loan_event.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
									</div>
								</div>
								<div class="panel-body">
									<span class="text-danger ">
										<?php
											if (isset($_GET['number']) && $_GET['number']== "0") 
												{
													echo "Amount can`t start with 0 or negtive number";
												}
										?>
									</span>
										<form method="post" action="add_min_event_handler.php" autocomplete="off">
											<div class="form-group">
			                                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                                       Add requirement name
			                                        </label>
			                                        <input type="text" name="requirementID"class="form-control" title="Please enter event name.." placeholder="Please enter requirement name" required>
			                                        <input type="text" name="ID" value="<?php echo $userID; ?>" hidden>
			                                </div>
		                                	<div class="form-group">
			                                    <span >
			                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                                       Requirement amount
			                                        </label>
			                                        <input type="number" name="kiwango"  class="form-control" placeholder="Enter requirement ammount" title="Ammount can start with 0 or negtive number"  pattern="[1-9]{1}[0-9]+" required>
			                                     </span>
		                                	</div>
		                                	<div class="form-group">
			                                    <span >
			                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                                        Requirement cost
			                                        </label>
			                                        <input type="tel" name="ammount"  class="form-control" placeholder="Enter  how much does it cost" pattern="[1-9]{1}[0-9]+" title="Ammount can`t start with 0" maxlength="7" required>
			                                     </span>
		                                	</div>
		                                	<div class="form-group">
		                                    <input type="submit" name="requirement" value="Add requirement" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
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