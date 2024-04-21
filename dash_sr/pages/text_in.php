<?php
	while ($fetch =mysqli_fetch_assoc($query)) 
		{

			$massageSelect = mysqli_query($con,"select * from messages where message_out_ID ='".$qlcr['UserName']."' && message_in_ID ='$userID' || message_out_ID ='$userID' && message_in_ID='".$qlcr['UserName']."' order by 	messageID desc limit 1 ");
			$messageQuery = mysqli_fetch_assoc($massageSelect);
			(mysqli_num_rows($massageSelect) > 0)? $result = $messageQuery['message'] : $result = 'No message available';
			(strlen($result) > 22) ? $msg  = substr($result, 0, 22).'....' : $msg = $result;
			if (isset($messageQuery['message_out_ID'])) 
			{
				($userID == $messageQuery['message_out_ID']) ? $you = 'You: ' : $you = '';
			}
			else
			{
				$you = '';
			}
?>
		<a href="text.php?ID=<?php echo $fetch['RegNo']; ?>">
			<div class="content">
				<img src="../../icons/<?php echo $fetch['ProfilePicture']; ?>">
					<div class="details">
						<span><?php echo $fetch['FirstName']." &nbsp;".$fetch['LastName'].' ( '.$qlcr['Role'].' )';  ?> </span>	<p> <?php echo $you.$msg; ?></p>
						
					</div>
			</div>
		</a>
<?php } ?>
