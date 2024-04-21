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
						<div class="col-md-3"></div>
						<div class="col-md-5">
							<div class="panel panel-profile">
								<div class="clearfix">
									<!-- TABBED CONTENT -->
									<div class="custom-tabs-line tabs-line-bottom left-aligned">
										<ul class="nav" role="tablist">
											<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Student Information</a></li>
											<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Upload Information</a></li>
										</ul>
									</div>
									<div class="tab-content">
										<div class="tab-pane fade in active" id="tab-bottom-left1">
											<form method="post" action="add_student_handler.php" autocomplete="off">
												<div class="row">
													<div class="col-md-1"></div>
													<div class="col-md-10">
														<div class="panel-heading">
															<h3 class="panel-title" ></h3>
														</div>
														<div class="panel-body">
															<span class="text-danger" > 
																<?php   
																	if (isset($_GET['Alert']) && $_GET['Alert']== "0") 
																		{
																			echo "Student is not added.";
																		}
																?>
															</span>
															<div class="form-group">
														       	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
														                         Reg number
														        </label>
														        <input type="text" name="regno"  class="form-control" placeholder="Enter reg number">
														        <span class="text-danger" > 
												                    <?php   
												                        if (isset($_GET['reg']) && $_GET['reg']== "0") 
												                            {
												                                echo "Please fill username.";
												                            }
												                        if (isset($_GET['reg']) && $_GET['reg']== "1") 
												                            {
												                                echo "Username is already registerd.";
												                            }
												                    ?>
												                </span>
									                            </div>
									                            <div class="form-group">
														            <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
														                        First name
														            </label>
														            <input type="text" name="first"  class="form-control" placeholder="First name">
														                <span class="text-danger" > 
												                            <?php   
												                              if (isset($_GET['Ft']) && $_GET['Ft']== "0") 
												                              {
												                                echo "Please fill first name.";
												                              }
												                            ?>
												                        </span>
						                                		</div>
						                                		<div class="form-group">
														            <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
														                        Middle name
														            </label>
														            <input type="text" name="middle"  class="form-control" placeholder="Middle name">
														                <span class="text-danger" > 
												                            <?php   
												                              if (isset($_GET['Md']) && $_GET['Md']== "0") 
												                              {
												                                echo "Please fill middle name.";
												                              }
												                            ?>
												                        </span>
						                                		</div>
						                                		<div class="form-group">
														            <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
														                        Last name
														            </label>
														            <input type="text" name="last"  class="form-control" placeholder="Last name">
														                <span class="text-danger" > 
												                            <?php   
												                              if (isset($_GET['Lt']) && $_GET['Lt']== "0") 
												                              {
												                                echo "Please fill last name.";
												                              }
												                            ?>
												                        </span>
						                                		</div>
						                                		<div class="form-group">
														            <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
														                        Phone number
														            </label>
														            <input type="tel" name="phone"  class="form-control" value="+255" pattern="[+255]{4} [1-9]{3} [0-9]{3} [0-9]{3}" title="PhoneNo must be like +255 777 567 786" required maxlength="16">
						                                		</div>
						                                		<div class="form-group">
														            <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
														                       Select gender
														            </label>
														            <select name="gender"   class="form-control" >
														                    <option></option>
														                    <option value="Male">Male</option>
														                     <option value="Female">Female</option>
														            </select>
														            <span class="text-danger" > 
												                        <?php   
												                            if (isset($_GET['Gnd']) && $_GET['Gnd']== "0") 
												                              {
												                                echo "Please fill gender.";
												                              }
												                        ?>
												                    </span>
						                                		</div>
						                                		<div class="form-group">
												                   <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
												                           Select academic Years
												                    </label>
												                   	<select name="years"   class="form-control" >
												                        <option></option>
												                        <option value="2021/2022">2021/2022</option>
												                        <option value="2020/2021">2020/2021</option>
												                        <option value="2019/2020">2019/2020</option>
												                        <option value="2018/2019">2018/2019</option>
												                        <option value="2017/2018">2017/2018</option>
												                        <option value="2016/2017">2016/2017</option>
												                        <option value="2015/2016">2015/2016</option>
												                    </select>
												                    <span class="text-danger" > 
												                        <?php   
													                        if (isset($_GET['Yeah']) && $_GET['Yeah']== "0") 
													                            {
													                                echo "Please select academic year.";
													                            }
												                        ?>
											                        </span>
					                                			</div>
					                                			<div class="form-group">
													                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
													                            Select  std level
													                </label>
													                <select name="level" class="form-control" >
													                    <option></option>
													                    <option value="Certificate">Certificate</option>
													                    <option value="Diploma">Diploma</option>  
													                    <option value="Degree">Degree</option>
													                </select>
													                <span class="text-danger" > 
													                    <?php   
														                    if (isset($_GET['Stage']) && $_GET['Stage']== "0") 
														                        {
														                           echo "Please select student level.";
														                        }
													                    ?>
												                    </span>
						                                		</div>
						                                		<div class="form-group">
													                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
													                            Select  std semister
													                </label>
													                <select name="semister" class="form-control" >
													                    <option></option>
													                    <option value="SemisterOne">Semister One</option>
													                    <option value="SemisterTwo">Semister Two</option>  
													                </select>
						                                		</div>
						                                		<div class="form-group">
					                                   				<input type="submit" name="add_std" value="Save" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
					                               				</div>
														</div>
													</div>
													<div class="col-md-1"></div>
												</div>
											</form>
										</div>
										<div class="tab-pane fade" id="tab-bottom-left2">
											<div class="row">
												<div class="col-md-1"></div>
												<div class="col-md-10">
													<div class="panel-heading">
														<h3 class="panel-title" ></h3>
													</div>
													<div class="panel-body">
														<form method="post" enctype="multipart/form-data" action="upload_form.php">
															<div class="form-group">
																<input type="file" name="excel" accept=".csv" class="form-control">
																<span class="text-danger" > 
											                        <?php   
												                        if (isset($_GET['Filempty']) && $_GET['Filempty']== "0") 
												                            {
												                                echo "Please upload student file.";
												                            }
												                        if (isset($_GET['userFile']) && $_GET['userFile']== "0") 
												                            {
												                                echo "Student regno is already added.";
												                            }
											                        ?>
									                        	</span>
															</div>
															<div class="form-group">
						                                   		<input type="submit" name="import" value="Upload" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
						                               		</div>
														</form>
													</div>
												</div>
											</div>
										<!-- END TABBED CONTENT -->
								</div>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
