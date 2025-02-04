<?php
//session_start();
 Require ("require/connection.php");
 
 	
 date_default_timezone_set("Asia/Karachi");
 
 if($_REQUEST["sub"])
	{ 
	$destination="images/";
 	$imgname=$_FILES['profilepic']['name'];

 	$img_tmp_name=$_FILES['profilepic']['tmp_name'];
 		
 	move_uploaded_file($img_tmp_name,$destination.$imgname);
 	//extract($_POST[]);
 
 $query="INSERT INTO blog_user (first_name,middle_name,last_name,email,password,gender,country_code,city,user_image,age,date_time) VALUES ('".$_POST['fname']."',
 '".$_POST['middle_name']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['password']."','".$_POST['gender']."','".$_POST['country']."','".$_POST['city']."','".$imgname."','".$_POST['date']."' , '".date('Y-m-d h:i:sa')."')";
$res=mysqli_query($connection,$query);

if ($res) {
$userid=mysqli_insert_id($connection);
$query_bridge="INSERT INTO user_activation_bridge
 (user_id,on_update) VALUES ('".$userid."','".time()."' ) ";
$execution = mysqli_query($connection,$query_bridge);


$query_role="INSERT INTO user_role_bridge (user_id,on_update) VALUES ('".$userid."','".time()."' ) ";
$execution_role = mysqli_query($connection,$query_role); 


 	header("location: client_validation.php?message=Registration Completed Successfully");

}
else
		{
			header("location: client_validation.php?message=Registration Fail Please Try Again ");
		}
	}
	else
	{
	header("location:  client_validation.php?message=Please Register Your Account");
	}
?>