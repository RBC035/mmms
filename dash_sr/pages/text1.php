<?php
	require_once '../../includes/connection.php';
	$userID= $_SESSION['username'];
	if (empty($_POST['message'])) 
	{
		//echo "FILL EMPTY SPACE...!";//header("location:admin.php");
	}
	else
	{
		$incoming =$_POST['incoming_id'];
		$outgoing =$_POST['outgoing_id'];
		$message =$_POST['message'];

		$ins = mysqli_query($con,"insert into  messages (message_in_ID,message_out_ID,message) values ('$incoming','$outgoing','$message') ");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MMMS | Charting sms</title>
  <link rel="stylesheet" href="../../includes/style.css">
  <link rel="stylesheet" href="../../assets/vendor/linearicons/style.css">
  <link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> -->
</head>
	<body>
		<div class="wrapper">
			<section class="chat-area">
				<?php
					$sender =$_SESSION['userID'] =$_GET['ID'];
					$selID =mysqli_query($con,"select * from student where RegNo = '".$sender."'");
					$row=mysqli_fetch_assoc($selID);
					$photo =$_SESSION['picture'] = $row['ProfilePicture'];
				?>
				<header>
					<a href="Massege1.php" class="back-icon"><i class="lnr lnr-arrow-left" style="font-size: 21px; color: #333; font-weight: bold; display: flex;"></i></a>
					<img src="../../icons/<?php echo $photo; ?>">
					<div class="details">
						<span><?php echo $row['FirstName']."  ".$row['LastName']; ?></span>
						 <p style="font-size: 13px; margin-top: 7px;"><?php echo $row['PhoneNumber']; ?></p>
					</div>
				</header>
				<div class="chat-box">
					 <?php
				      	include 'sms.php';
				      ?>
				</div>
				<form method="post" style=" padding: 18px 30px; display: flex; justify-content:space-between;">
					 <input type="text"  name="incoming_id" value="<?php echo $sender; ?>" hidden>
					 <input type="text"name="outgoing_id" value="<?php echo $userID; ?>" hidden>
					 <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off" style=" height: 45px; width: calc(100% - 58px); font-size: 16px; padding: 0 13px; border: 1px solid #e6e6e6; outline: none; border-radius: 5px 0 0 5px;">
					 <button type="submit" style=" color: #fff; width: 55px; border: none; outline: none; background: #333; font-size: 19px; cursor: pointer; opacity: 0.7; border-radius: 0 5px 5px 0; transition: all 0.3s ease;"><i class="fa fa-paper-plane-o fa-flip-both"></i></button>
				</form>
			</section>
		</div>
	</body>