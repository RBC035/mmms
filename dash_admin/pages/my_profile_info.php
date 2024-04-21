<?php
		include 'dashbroad.php';
		$user=$_SESSION['username'];

		$sele="select * from userole where UserName='".$user."'";
		$qry=mysqli_query($con,$sele);

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
									<h3 class="panel-title"> My account information</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
										<a href="index.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
									</div>
								</div>
								<?php
										while ($row=mysqli_fetch_assoc($qry)) 
										{
											$us=$row['UserName'];
											$ps=$row['Password'];

								?>
							<div class="panel-body">
								<form>
									 <div class="form-group">
                                    <span >
                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
                                                        User name
                                        </label>
                                        <input type="text" class="form-control" value=" <?php  echo $us ?>"  readonly="readonly">
                                     </span>
                                </div>
                                <div class="form-group">
                                    <span >
                                        <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
                                                       Password
                                        </label>
                                        <input type="text"  class="form-control"  value=" <?php  echo $ps ?>" readonly="readonly" >
                                     </span>
                                </div>
								</form>
							</div>
							</div>
							<!-- END TASKS -->
						</div>
						<div class="col-md-3"></div>
					</div>
<?php
        }
?> 
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->