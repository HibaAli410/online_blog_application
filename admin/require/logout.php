<?php 

	session_start();
	require ("connection.php");
	$query	=	"UPDATE blog_user SET is_online = 0 WHERE user_id = '".$_SESSION['blog_user']['user_id']."' ";
	$execution = mysqli_query($connection,$query);

	session_destroy();
	header("location:../../index.php?message=logout successfully");

 ?>