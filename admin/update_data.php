<?php
require ("require/session.php");
 include("require/connection.php")  

if (isset($_REQUEST['sub'])) {
	date_default_timezone_set("Asia/Karachi");


	$destination="images/";
 	$imgname=$_FILES['profilepic']['name'];

 	$img_tmp_name=$_FILES['profilepic']['tmp_name'];
 		
 	move_uploaded_file($img_tmp_name,$destination.$imgname);

			

	
	$update_query		=		"UPDATE blog_user SET 
		first_name = '".$_REQUEST['first_name']."',
	 	middle_name = '".$_REQUEST['middle_name']."' , 
	 	last_name = '".$_REQUEST['last_name']."' , 
	 	email = '".$_REQUEST['email']."' , 
	 	password = '".$_REQUEST['password']."' ,
	 	country = '".$_REQUEST['country_code']."' ,
	 	city = '".$_REQUEST['city']."' ,
	 	age = '".$_REQUEST['age']."' , 
	 	user_image = '".$imgname."' ,
	 	last_update = '".date('Y-m-d h:i:sa')."' WHERE user_id = '".$_REQUEST['user_id']."' ";

	$execution_query	=		mysqli_query($connection,$update_query);
	header("location:users.php?msg=Data Update Successfully");
}

else {
	header("location:client_validation.php?msg=Did'nt Update Successfully");
}



?>