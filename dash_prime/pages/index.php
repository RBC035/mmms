<?php
	require_once 'dashbroad.php';
	
	/*if ($_SESSION['Status'] ==' ') 
	 {
		header("location:../../pages/Logouthandler.php");
		*/
			if ($_SESSION['Status'] === 'Prime minister') 
			{
					include 'prime_minster.php';
			}
			if ($_SESSION['Status'] === 'Minister of Loan') 
			{
				include 'minister_loan.php';
			}
			if ($_SESSION['Status'] === 'Minister of Security') 
			{
				include 'minister_women.php';
			}
			if ($_SESSION['Status'] === 'Minister of Finance') 
			{
				include 'minister_women.php';
			}
			if ($_SESSION['Status'] === 'Minister of Women') 
			{
				include 'minister_women.php';
			}
			if ($_SESSION['Status'] === 'Minister of Information') 
			{
				include 'minister_information.php';
			}
			if ($_SESSION['Status'] === 'Minister of Health') 
			{

				include 'minister_health.php';
				
			}
			if ($_SESSION['Status'] === 'Minister of Education') 
			{
				include 'minister_education.php';
			}

	/*}
	else
	{
		header("location:../../pages/Logouthandler.php");
	}
*/
?>