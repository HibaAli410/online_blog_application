<?php
	session_start();
	if(!($_SESSION["blog_user"]["user_id"]) || $_SESSION["user_role_bridge"]["user_role_status_id"]!=0)
		{
			session_destroy();
			header("location:../index.php?message=Please Kindly Login!...");
		}
	?>