<?php
	require_once 'dashbroad.php';
	$userID=$_GET['Change'];

	$query=mysqli_query($con,"select * from event where EventID = '$userID' ");
	$row=mysqli_fetch_array($query);
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
									<form method="post" action="min_event_upd.php">
										<div class="form-group">
			                                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                     Change event name
			                                </label>
			                                <input type="text" name="event"class="form-control" value="<?php echo $row['EventName']; ?>">
			                                <input type="hidden" name="ID"class="form-control" value="<?php echo $userID; ?>" >
			                            </div>
		                   		       	<div class="form-group">
		                                	<input type="submit" name="EventChange" value="Change requirement" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
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