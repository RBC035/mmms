<?php
		require_once '../../includes/connection.php';
		include '../include/header.php';

	if ($_SESSION['Status'] === 'Prime minister') 
	{
			include 'prime_dash.php';
	}
	if ($_SESSION['Status'] === 'Minister of Loan') 
	{
		include 'loan_dash.php';
	}
	if ($_SESSION['Status'] === 'Minister of Security') 
	{
		include 'security_dash.php';
	}
	if ($_SESSION['Status'] === 'Minister of Finance') 
	{
		include 'finance_dash.php';
	}
	if ($_SESSION['Status'] === 'Minister of Women') 
	{
		include 'women_dash.php';
	}
	if ($_SESSION['Status'] === 'Minister of Information') 
	{
		include 'information_dash.php';
	}
	if ($_SESSION['Status'] === 'Minister of Health') 
	{
		include 'health_dash.php';	
	}
	if ($_SESSION['Status'] === 'Minister of Education') 
	{
		include 'education_dash.php';
	}
?>
