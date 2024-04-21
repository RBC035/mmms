<?php

	require_once 'dashbroad.php';
	include 'index.php';
?>
?>
<!DOCTYPE html>
<html>
<head>
	<title>MMMS</title>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#myModal1").modal('show');
			});
	</script>
</head>
<body >

<div id="myModal1" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-md" >
  			<div class="row">
  				<div class="col-md-2"></div>
  					<div class="col-md-7">
  						<div class="panel" style="border-radius: 15px; box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);">
  							<div class="panel-heading" >
  								<div class="right">
  									<a href="Prime minister.php">
	  									<span  title="Cancel">
											<b style="color: #000080; font-size: 25px; ">
													                      &times;</b>
										</span>
	  								</a>
  								</div>
								<h3 class="panel-title" style=" color: #000080;">
								<span  class="fa fa-gg-circle fa-lg" > </span> &nbsp;Add former reason</h3>
							</div>
							<div class="panel-body">
								<form method="post" action="minister_del.php" autocomplete="off">
									<div class="form-group">
										<span  class="fa fa-registered" style=" color: #000080;" > 
											<label style=" font-family: Times new roman; font-weight: bold; ">
												Select reason
											</label>
										</span>
										<select name="reason1"   class="form-control" required title="Add reason for former leader">
											<option></option>
										 	<option value="Discontinued">Discontinue (DISCO)</option>
											<option value="Terminated">Terminated</option>
											<option value="Absconded">Absconded</option>
											<option value="Postponed">Postponed</option>
											<option value="Death">Death</option>
										</select>
										<input type="text" name="ID" value="<?php echo $_GET['Ddelete']; ?>" hidden>
									</div>
									<div class="form-group">
										<input type="submit" name="Add" value="Add reason" class="form-control btn btn-primary" style=" font-family: Times new roman; font-weight: bold;">
									</div>
								</form>
							</div>
  						</div>
  					</div>
  				<div class="col-md-2"></div>
  			</div>
  		</div>
	</div>
</body>
</html>
