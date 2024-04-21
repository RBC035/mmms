<?php
	require_once 'dashbroad.php';
	$userID=$_GET['View'];
	$requirement =mysqli_query($con,"select * from requirement where Rid = '".$userID."'");
	$row = mysqli_fetch_array($requirement);
	
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
									<h3 class="panel-title">Change requirement</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
										<a href="view_requirement.php?View=<?php  echo $row['EventID'];?>" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
									</div>
								</div>
								<div class="panel-body">
										<form method="post" action="view_requirement_upd.php" autocomplete="off">
											<div class="form-group">
			                                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                                       Requirement name
			                                        </label>
			                                        <input type="text" name="requirementID"class="form-control" title="Please enter event name.." value="<?php echo $row['Rname']; ?>"required>
			                                        <input type="text" name="ID" value="<?php echo $userID; ?>" hidden>
			                                        <input type="text" name="Event" value="<?php echo $row['EventID']; ?>" hidden>
			                                </div>
		                                	<div class="form-group">
			                                    <span >
			                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                                       Requirement amount
			                                        </label>
			                                        <input type="number" name="kiwango"  class="form-control" value="<?php echo $row['Ramount']; ?>" title="Ammount can start with 0 or negtive number" required>
			                                     </span>
		                                	</div>
		                                	<div class="form-group">
			                                    <span >
			                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
			                                                        Requirement cost
			                                        </label>
			                                        <input type="tel" name="ammount"  class="form-control" value="<?php echo $row['Rcost']; ?>" pattern="[1-9]{1}[0-9]+" title="Ammount can`t start with 0" maxlength="7" required>
			                                     </span>
		                                	</div>
		                   		            <div class="form-group">
		                                    <input type="submit" name="Requirement" value="Change requirement" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
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