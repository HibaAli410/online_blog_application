<?php
		session_start();
 include_once("require/connection.php"); ?>

<?php if (isset($_POST['login']) == "login") {



	$query="SELECT * FROM blog_user WHERE email ='".$_POST['email']."' 
		AND
	 password='".$_REQUEST['password']."'  ";
	 	
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	  

 
		//$record_role = mysqli_fetch_assoc($res_role);
		//$_SESSION["user_role_bridge"] = $record_role;
 if(mysqli_num_rows($result))
	{
		$record = mysqli_fetch_assoc($result);
		$_SESSION["blog_user"] = $record;



	  $query_role="SELECT * FROM user_role_bridge where user_id = '".$_SESSION['blog_user']['user_id']."' ";
	$res_role = mysqli_query($connection,$query_role);
	$record_role = mysqli_fetch_assoc($res_role);
	$_SESSION["user_role_bridge"] = $record_role;

		 $query_activation="SELECT * FROM user_activation_bridge where user_id = '".$_SESSION['blog_user']['user_id']."' ";
	  $res_activation = mysqli_query($connection,$query_activation);
	  $record_activation = mysqli_fetch_assoc($res_activation);
	$_SESSION["user_activation_bridge"] = $record_activation;

	  
	if($_SESSION['user_role_bridge']['is_approve'] == "yes" && $_SESSION['user_activation_bridge']['user_activation_id']	== 1) {

				if ($_SESSION["user_role_bridge"]["user_role_status_id"] == 2	) {
					$query_is_online="UPDATE blog_user SET is_online = 1 WHERE user_id = '".$_SESSION['blog_user']['user_id']."'";
					$execution_query_is_online = mysqli_query($connection,$query_is_online);
					
						header("location: admin/index.php");
					}
					elseif ($_SESSION["user_role_bridge"]["user_role_status_id"] == 1	) {
						$query_is_online="UPDATE blog_user SET is_online = 1 WHERE user_id = '".$_SESSION['blog_user']['user_id']."'";
					$execution_query_is_online = mysqli_query($connection,$query_is_online);
						header("location: coordinat/index.php");
					}
					elseif ($_SESSION["user_role_bridge"]["user_role_status_id"] == 0) {
						$query_is_online="UPDATE blog_user SET is_online = 1 WHERE user_id = '".$_SESSION['blog_user']['user_id']."'";
					$execution_query_is_online = mysqli_query($connection,$query_is_online);
						header("location: user/index.php");
					}
				
				else{
					header("location: index.php?message=Aprove but not Activate");
				}
			}
			

			else{
				header("location: index.php?message=not approve");

			}


		/* if (mysqli_num_rows( $res_role)) {


		$record_role = mysqli_fetch_assoc($res_role);
		$_SESSION["user_role_bridge"] = $record_role;

		$record_active = mysqli_fetch_assoc($res_activation);
		$_SESSION["user_activation_bridge"] = $record_active; */
		
		

		
	/*	
		if($_SESSION["user_role_bridge"]["user_role_status_id"] == 2    &&  $_SESSION["user_activation_bridge"]["user_activation_id"] == 1)
		{
			header("location: admin/index.php");
		}
		else if($_SESSION["user_role_bridge"]["user_role_status_id"] == 1 /* &&  $_SESSION["user_activation_bridge"]["user_activation_id"] == 1)
		{
			header("location: teacher/index.php");
		}
		else if($_SESSION["user_role_bridge"]["user_role_status_id"] == 0 /* &&   $_SESSION["user_activation_bridge"]["user_activation_id"] == 1)
		{
			header("location: user/index.php");
		}

		}
		else{			// second if for the role and  activation

			header("location : ../../index.phpmessage= invalid role or you are not active ");

		} */

	}
	else
	{
		header("location: ../../index.php?message=Invalid Email/Password Please Try Again Later!...");
	}

	
	/*if(mysqli_num_rows){
		$_SESSION['user']=mysqli_fetch_assoc($result);
		$query="UPDATE user SET login = 1 WHERE user.user_id = '".$_SESSION["user"]["user_id"]."' ";
		$result=mysqli_query($connection,$query);
		header("location:ajax_chat.php");
	}*/

}

else
	echo header("location:index.php?message=Please Login !...");?>