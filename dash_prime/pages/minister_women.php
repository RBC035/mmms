<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline ">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><a href="student_education.php" class=""><i class="fa fa-graduation-cap"></i></a></span>
										<p>
											<?php
												$student = "select * from student where StudentStatus = 'Enable' ";
												$stdsql = mysqli_query($con,$student);
												$std = mysqli_num_rows($stdsql);
											?>
											<span class="number"><?php echo $std; ?></span>
											<span class="title">Students List</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><a href="selected_leader.php" class=""><i class="fa fa-odnoklassniki"></i></a></span>
										<p>
											<?php
											$select = "select student .* , selectedleader .* from student , selectedleader where student.RegNo = selectedleader.RegNo && not Possition='Former President' && StudentStatus='Enable'  && Possition !='Former DSR'";
											$query = mysqli_query($con,$select);
											$row = mysqli_num_rows($query);
											?>
											<span class="number"><?php echo $row; ?></span>
											<span class="title">DSR</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><a href="minister.php" class=""> 
											<i class="fa fa-users"></i></a></span>
										<p>
											<?php
												$prime = "select * from minister where MinisterPossition != 'Former Minister of Education' && MinisterPossition != 'Former Prime minister' && MinisterPossition != 'Former Minister of Finance' && MinisterPossition != 'Former Minister of Health' && MinisterPossition != 'Former Minister of Loan' && MinisterPossition != 'Former Minister of Women' && MinisterPossition != 'Former Minister of Information' && MinisterPossition != 'Former Minister of Security' ";
												$priqr = mysqli_query($con,$prime);
												$mini = mysqli_num_rows($priqr);	
											?>
											<span class="number"><?php echo $mini; ?></span>
											<span class="title">Ministers</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><a href="CSR.php" class="">
											<i class="fa fa-cogs"></i></span></a>
										<p>
											<?php
												$vicepre = "select student .* , cr  .* from student , cr  where student.RegNo =  cr.RegNo && StudentStatus='Enable' && CrStatus != 'Former CR' && CrStatus != 'Former Assistance'";
												$vicepres = mysqli_query($con,$vicepre);
												$Vice = mysqli_num_rows($vicepres);
												
											?>
											<span class="number"><?php echo $Vice; ?></span>
											<span class="title"> Class Representative</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
