<?php
		include 'dashbroad.php';

		$userID=$_GET['Change'];
		$sele="select * from selectedleader where RegNo ='$userID'";
		$ql=mysqli_query($con,$sele);
		$row=mysqli_fetch_assoc($ql);

?>

<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<form method="post" action="selected_updt.php" autocomplete="off">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-5">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-10">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title" >Leader Information </h3>
												<div class="right">
													<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up" title="Hide page"></i></button>
													 <a href="selected_leader.php" title="Close page"><button type="button"> <i class="lnr lnr-cross" ></i></button></a>
												</div>
											</div>
											<div class="panel-body">
												<div class="form-group">
									               	<label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
									                         Reg number
									                </label>
									                <input type="text" name="regno"  class="form-control"  readonly="readonly" value="<?php echo $row['RegNo'] ;?>">
									                  <input type="hidden" name="ID"  class="form-control"  readonly="readonly" value="<?php echo $row['LeaderID'] ;?>" >
				                            	</div>
				                            	<div class="form-group">
									                <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                           Select user privillege
								                    </label>
								                   	<select name="privillege"   class="form-control" >
								                        <option><?php echo $row['Possition'] ?></option>
								                        <!-- <option value="Prime minister">Prime minister</option> -->
								                       <!--  <option value="Spiker">Spiker</option>
								                        <option value="Spiker">Deputy Spiker</option> -->
								                        <option value="DSR">Depertment Representative</option>
								                    </select> 
	                                			</div>
	                                			<div class="form-group">
								                   <label style=" font-family: Times new roman; font-weight: bold; color: #000080;">
								                           Select elected year
								                    </label>
								                   	<select name="Elected"   class="form-control" >
								                        <option><?php echo $row['ElectedYear'] ?></option>
								                        <option value="2021/2022">2021/2022</option>
								                        <option value="2020/2021">2020/2021</option>
								                        <option value="2019/2020">2019/2020</option>
								                        <option value="2018/2019">2018/2019</option>
								                        <option value="2017/2018">2017/2018</option>
								                        <option value="2016/2017">2016/2017</option>
								                        <option value="2015/2016">2015/2016</option>
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