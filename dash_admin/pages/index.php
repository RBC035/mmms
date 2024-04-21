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
					<!-- OVERVIEW -->
					<div class="panel panel-headline ">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><a href="student.php" class=""><i class="fa fa-graduation-cap"></i></a></span>
										<p>
											<?php
												$student = "select * from student ";
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
											$select = "select * from selectedleader ";
											$query = mysqli_query($con,$select);
											$row = mysqli_num_rows($query);
											?>
											<span class="number"><?php echo $row; ?></span>
											<span class="title">Selected Leaders</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><a href="Prime minister.php" class=""> 
											<i class="fa fa-users"></i></a></span>
										<p>
											<?php
												$prime = "select * from minister";
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
										<span class="icon"><a href="CR.php" class="">
											<i class="fa fa-cogs"></i></span></a>
										<p>
											<?php
												$vicepre = "select * from cr ";
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