<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MMMS | Charting sms</title>
  <link rel="stylesheet" href="../../includes/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>

	<body>
		<div class="wrapper">
			<section class="users">
				<header>
					<div class="content">
						<?php
			        		require_once '../../includes/connection.php';
			        		$userID= $_SESSION['username'];

			        		$sel=mysqli_query($con,"select * from student where RegNo ='".$userID."'");
			        		$row =mysqli_fetch_assoc($sel);
			        	?>
			        	 <img src="../../icons/<?php echo $row['ProfilePicture']; ?>">
			        	 <div class="details">
			        	 	 <span><?php echo $row['FirstName']. " " . $row['LastName'] ?></span>
			        	 	 <p>Active now</p>
			        	 </div>
					</div>
					 <a href="index.php" class="logout">Back</a>
				</header>
				<div class="search">
        			<span class="text">Select user to start chat</span>
     			</div>
     			<!-- <div style=" max-height: 500px; overflow-y: auto; padding: 10px 30px 20px 0px; "> -->
     			<div class="chat-box" style="background: #fff; box-shadow: inset 0 0 0 0 rgb(0 0 0 / 5%),
              inset 0 0 0 0 rgb(0 0 0 / 5%); padding: 10px 30px 20px 0px; ">
        			<?php
        				$crsele=mysqli_query($con,"select * from userole where UserName !='$userID' && Role !='Former CR' && Role !='Former Vice President' && Role !='Former Minister of Information' && Role !='Former Minister of Security' && Role !='Former DSR' && Role !='Former Minister of Loan' && Role !='Former Minister of Health'  && Role !='Former Minister of Women' && Role !='Former Minister of Finance' && Role !='Former Prime minister'  && Role !='Former Minister of Education' && Role != 'Former President' order by ID desc  ");
        				while ($qlcr=mysqli_fetch_assoc($crsele)) 
        				{
        					$query=mysqli_query($con,"select * from student where RegNo= '".$qlcr['UserName']."' && StudentStatus='Enable' ");
					?>
					<div class="users-list" style="padding: 5px 0px 10px 0px;">
						<?php include 'text_in_dsr.php'; ?>
					</div>
					<?php
        				}
        			?>
        			</div>
			</section>
		</div>
	</body>
</html>
