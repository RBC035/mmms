<?php
		session_start();
		$con = mysqli_connect("localhost","root","","mmms");

		if (!$con) 
		{
			die("Database connection error...!");
		}

?>