<?php
		include 'dashbroad.php';
		$user=$_SESSION['username'];
		$sel =mysqli_query($con,"select * from student where RegNo='$user'");
		$row=mysqli_fetch_assoc($sel);

?>

<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form method="post" action="profile_info_handler.php" autocomplete="off">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Personal Information</h3>
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
									                <input type="text" name="regno"  class="form-control"  readonly="readonly" value="<?php echo $row['RegNo'] ;?>">
				                            	</div>
				                            	<div class="form-group">
									                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                        First name
									                </label>
									                <input type="text" name="first"  class="form-control" value="<?php echo $row['FirstName'] ;?>">
	                                			</div>
	                                			<div class="form-group">
									               <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                        Middle name
									                </label>
									                <input type="text" name="middle"  class="form-control" value="<?php echo $row['MiddleName'] ;?>">
	                                			</div>
	                                			<div class="form-group">
									               	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                        Last name
									                </label>
									                <input type="text" name="last"  class="form-control" value="<?php echo $row['LastName'] ;?>">
	                                			</div>
	                                			<div class="form-group">
									               	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                        Phone number
									                </label>
									                <input type="tel" name="phone"  class="form-control" pattern="[+255]{4} [1-9]{3} [0-9]{3} [0-9]{3}" title="PhoneNo must be like +255 777 567 786" maxlength="16" value="<?php echo $row['PhoneNumber'] ;?>">
	                                			</div>
	                                			<div class="form-group">
									                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                       Select gender
									                </label>
									                <select name="gender"   class="form-control" >
									                    <option><?php echo $row['Gender'] ;?></option>
									                    <option value="Male">Male</option>
									                     <option value="Female">Female</option>
									                </select>
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