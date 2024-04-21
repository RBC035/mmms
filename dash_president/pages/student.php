<?php
	include '../../dash_admin/include/header_dataTables.php';
	require_once 'dashbroad.php';

?>

	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- TABBED CONTENT -->
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Student list</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Health Insurence</a></li>
									<li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Loan </a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<?php
										include 'student_list.php';
									?>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<?php
										include 'Insurence.php';
									?>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left3">
									<?php
										include 'Loan.php';
									?>
								</div>
							</div>
								<!-- END TABBED CONTENT -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	include '../../dash_admin/include/footer_dataTables.php';
?>