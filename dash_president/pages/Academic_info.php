<?php
		include 'dashbroad.php';
		$user=$_SESSION['username'];
		$sel =mysqli_query($con,"select * from program where RegNo='$user'");
		$rer=mysqli_fetch_assoc($sel);
		$_SESSION['program'] =$rer['ProgramName']; 
		$query=mysqli_query($con,"select *  from student   where RegNo='$user' ");
		$row=mysqli_fetch_assoc($query);
		$dep = mysqli_query($con,"select * from depertment where RegNo='$user'");
		$drow = mysqli_fetch_assoc($dep);


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
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Academic Information</h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
													 <a href="index.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
												</div>
											</div>
											<div class="panel-body">
												<div class="form-group">
									               	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                       Reg number
									                </label>
									                <input type="text"   class="form-control" value="<?php echo $user ;?>" readonly="readonly" >
	                                			</div>
												<div class="form-group">
								                   <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                          Academic Year
								                    </label>
								                     <input type="text"  class="form-control" value="<?php echo $row['AcademicYear'] ;?>" readonly="readonly" >
	                                			</div>
	                                			<div class="form-group">
								                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                          Department name
								                    </label>
								                     <input type="text"  class="form-control" value="<?php echo $drow['DepertmentName'] ;?>" readonly="readonly" >
	                                			</div>
	                                			<div class="form-group">
								                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                           Course name
								                   	</label>
								                   	 <input type="text"  class="form-control" value="<?php echo $_SESSION['program'] ;?>" readonly="readonly" >
	                                			</div>
	                                			<div class="form-group">
								                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                           Academic level
								                    </label>
								                    <input type="text"  class="form-control" value="<?php echo $row['Level'] ;?>" readonly="readonly" >
	                                			</div>
	                                			<div class="form-group">
								                    <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                           Academic semister
								                    </label>
								                    <input type="text"  class="form-control" value="<?php echo $row['Semister'] ;?>" readonly="readonly" >
	                                			</div>
											</div>
										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
							</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>