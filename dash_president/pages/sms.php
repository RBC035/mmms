<?php
	require_once '../../includes/connection.php';

	$userID= $_SESSION['username'];
	$sender =$_SESSION['userID'];

	$photo =$_SESSION['picture'];

	if (isset($userID)) 
	{
		$incoming =$sender;
        $outgoing = $userID;

        $sele="select * from messages where message_out_ID ='$outgoing' && message_in_ID ='$incoming' || message_out_ID ='$incoming' && message_in_ID='$outgoing' order by 	messageID asc";
        $qlsel=mysqli_query($con,$sele);
        	if (mysqli_num_rows($qlsel) > 0) 
      			{
      				while ($fecth = mysqli_fetch_assoc($qlsel)) 
      				{
      					if ($fecth['message_out_ID'] === $outgoing) 
      					{
      					?>
      					<div class="chat outgoing">
      						<div class="details">
      							<p><?php echo $fecth['message']; ?></p>
      						</div>
      					</div>
      					<?php
      					}
      					else
      					{
      					?>
      					<div class="chat incoming">
      						<img src="../../icons/<?php echo $photo; ?>">
      						<div class="details">
      							<p><?php echo $fecth['message']; ?> </p>
      						</div>
      					</div>
      					<?php
      					}
      				}
      			}
      			else
      			{
      			?>
				    <div class="details" style="margin-top: 205px;">
				        <p>
							No messages are available. Once you send message they will appear here.
						</p>
				    </div>

				<?php
      			}
	}
	else
    {
      		header("location:Massege.php");
    }
?>