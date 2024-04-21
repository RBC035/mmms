
<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
					<div class="col-md-2"> 
						<div class="row">
							<div class="col-md-6 navbar-right">
								<div class="navbar-btn">
									<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
								</div>
							</div>
						</div>
					</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
							<span class="fa fa-user"> Welcom,
								<?php
									if (isset($_SESSION['username']))
									{
										echo $_SESSION['Status'];
								?>
							</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu" style="background-color:  rgb(149, 221, 255);">
								<li><a href="my_profile_info.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="change_user_pass.php"><i class="lnr lnr-cog"></i> <span>Change password</span></a></li>
								<li>
									<?php
										echo "<a href='../../pages/Logouthandler.php'><i class='lnr lnr-exit'></i> <span>Logout</span></a>";
									?>
								</li>
<?php
	}
	else
	{
		header("location:../../pages/login.php");
	}

?>
	
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav nav-bg-cl">
						<li><a href="index.php" class="active"><i class="fa fa-home"></i> <span>Dashboard</span></a>
						</li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-group"></i> <span>Students info</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="student_all.php"><i class="fa fa-id-card-o"></i> <span>All student</span></a></li>
									<li><a href="student_health.php"><i class="fa fa-medkit"></i> <span>Std Health</span></a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
										<i class="fa fa-file-text-o"></i><span>Health reports</span></a>
											<ul class="dropdown-menu  nav" style="border: 0px solid black; width: 100%;">
												<li><a href="report_helth.php" target="_blank"><i class="fa fa-file-pdf-o"></i> <span>Health Report</span></a></li>
												<li><a href="report_helth_no.php" target="_blank"><i class="fa fa-file-code-o"></i> <span>Std Report</span></a></li>
											</ul>
									</li>
								</ul>
							</div>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
								<i class="fa fa-wpforms"></i> <span>Msr Budgets</span></a>
									<ul class="dropdown-menu  nav" style="border: 0px solid black; width: 100%;">
										<li><a href="MinistersBudget.php?ID=<?php echo 0; ?>"><i class="fa fa-money"></i> <span>Ms Loan Budget</span></a></li>
										<!-- <li><a href="MinistersBudget.php?ID=<?php echo 1; ?>"><i class="fa fa-medkit"></i> <span>Ms Health Budget</span></a></li> -->
										<li><a href="MinistersBudget.php?ID=<?php echo 2; ?>"><i class="fa fa-usd"></i> <span>Ms Finance Budget</span>
										<li><a href="MinistersBudget.php?ID=<?php echo 3; ?>"><i class="fa fa-female "></i> <span>Ms Women Budget</span></a></li></a></li>
										<li><a href="MinistersBudget.php?ID=<?php echo 4; ?>"><i class="fa fa-lock"></i> <span>Ms Security Budget</span></a></li>
										<li><a href="MinistersBudget.php?ID=<?php echo 5; ?>"><i class="fa fa-book"></i> <span>MsEducationBudget</span></a></li>
										<li><a href="MinistersBudget.php?ID=<?php echo 6; ?>"><i class="fa fa-soccer-ball-o"></i> <span>MsInformationBudget</span></a></li>
									</ul>
						</li>
						<li><a href="Massege.php"><i class="fa fa-envelope"></i> <span>Massege</span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
							<i class="fa fa-wpforms"></i><span>Events</span></a>
								<ul class="dropdown-menu  nav" style="border: 0px solid black; width: 100%;">
									<li><a href="minister_loan_event.php"><i class="fa fa-file-text-o"></i> <span>Events List</span></a></li>
									<li><a href="budget.php" target="_blank"><i class="fa fa-file-pdf-o"></i> <span>Proposal Budget</span></a></li>
									<li><a href="minister_accepetd_event.php"><i class="fa fa-file-zip-o"></i> <span>Events Budget List</span></a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
							<i class="fa fa-cog"></i><span>Settings</span></a>
								<ul class="dropdown-menu  nav" style="border: 0px solid black; width: 100%;">
									<li><a href="Academic_info.php"> <span class="icon"><i class="fa fa-book"></i></span>Academic info</a>
									</li>
									<li><a href="my_profile_info.php"> <span class="icon"><i class="fa fa-address-book"></i></span>My profile info</a>
									</li> 
									<li><a href="change_user_pass.php" class=""><i class="fa fa-cogs"></i> <span>Change password</span></a></li>
								</ul>
						</li>
						<li>
						<a href='../../pages/Logouthandler.php'><i class='lnr lnr-exit'></i> <span>Logout</span></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
<?php
	include '../../dash_admin/include/footer.php';

?>