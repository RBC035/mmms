<?php
		include 'dashbroad.php';

		$userID=$_GET['Change'];
		$sele="select * from selectedleader where LeaderID ='$userID'";
		$ql=mysqli_query($con,$sele);
		$row=mysqli_fetch_assoc($ql);
		$query=mysqli_query($con,"select * from minister where LeaderID ='$userID'");
		$fet=mysqli_fetch_assoc($query);

?>
<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form method="post" action="minister_upt.php" autocomplete="off">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Change minister role information</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
													 <a href="Prime minister.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
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
								                           Select user privillege
								                    </label>
								                   	<select name="privillege"   class="form-control" >
								                        <option><?php echo $fet['MinisterPossition'] ;?></option>
								                        <option value="Prime minister">Prime minister</option>
								                        <option value="Minister of Loan">
								                       		 Minister of Loan
								                    	</option>
								                        <option value="Minister of Security">
								                        	Minister of Security
								                    	</option>
								                        <option value="Minister of Education">
								                        	Minister of Education
								                        </option>
								                        <option value="Minister of Health">
								                       		 Minister of Health
								                    	</option>
								                        <option value="Minister of Finance">
								                        	Minister of Finance
								                        </option>
								                        <option value="Minister of Information">
								                        	Minister of Information
								                        </option>
								                        <option value="Minister of Women">
								                        	Minister of Women
								                    	</option>
								                    </select>
								                    <input type="hidden" name="ld"  class="form-control"  readonly="readonly" value="<?php echo $fet['MinisterID'] ;?>">
				                            	</div>
				                            	<div class="form-group">
	                                   			<input type="submit" name="Add_role" value="Change" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
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