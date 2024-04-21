<?php
		require_once '../../includes/connection.php';
		include '../include/header.php';

	if ($_SESSION['Status'] === 'CR') 
	{
		include 'cr.php';
	}
	else
	{
		include 'dsr.php';
	}
?>
