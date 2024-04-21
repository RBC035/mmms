<?php
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
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Add event</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
										<a href="minister_loan_event.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
									</div>
								</div>
								<div class="panel-body">
									<form method="post" action="add_min_event_handler.php" autocomplete="off">
										<div class="form-group">
			                                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                    Add event name
			                                </label>
			                                        <input type="text" name="eventID"class="form-control" title="Please enter event name.." placeholder="Please enter event name.." required>
			                            </div>
		                                <div class="form-group">
		                                    <input type="submit" name="EventName" value="Add event requirement" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
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