<!DOCTYPE html>
<html>
<head>
	<title>server side validation</title>
</head>
<style type="text/css">
	h1{
		color: #356777;
		text-align: center;
	}
	
	td{

	padding: 10px;
	border: none;
	color: #356777;
	text-align: center;



}
tr{
	
}
table{
	box-shadow: 5px 5px 5px 5px;
border: 3px solid #356777;
width: 50%;
height: 550px;
color: #356777;
font-size: 20px;
}
</style>
<body>


	<?php
	$fname=$_REQUEST['fname'];
	if (isset($_REQUEST['middle_name'])) {
	$middle_name=$_REQUEST['middle_name'];
	}
	
	$lname=$_REQUEST['lname'];
	$email=$_REQUEST['email'];
	$email=$_REQUEST['password'];
	$gender=$_REQUEST['gender'];
	$contact =$_REQUEST['contact'];
	$group=$_REQUEST['group'];



	$flag = true;
	$flag_massge="";

	 $fname_pattern="/^[A-Z]{1}[A-z]{2,30}$/";
  	 $fname_pattern_match=preg_match($fname_pattern,$fname);
	if ($fname=="") {
		$flag = false;
		$flag_messge .= "Enter First Name please";
	}
	elseif (!$fname_pattern_match) {
	 	$flag = false;
		$flag_messge .= "Enter please as pattern";
	 } 


	  $lname_pattern=" /^[A-z]{5,15}$/";
  	 $lname_pattern_match=preg_match($lname_pattern, $lname);
	if ($lname=="") {
		$flag = false;
		$flag_messge .= "Enter Last Name please";
	}
	elseif (!$lname_pattern_match) {
	 	$flag = false;
		$flag_messge .= "Enter please as pattern";
	 } 


	  $email_pattern="/^(\w{7,25}) (@{1}) ([a-z]{5,15}) (.{1}) (com|org|net)$/x;
";
  	 $email_pattern_match=preg_match($email_pattern, $email);
	if($email=="") {
		$flag = false;
		$flag_messge .= "Enter email please";
	}
	elseif (!$email_pattern_match) {
	 	$flag = false;
		$flag_messge .= "Enter your email  as pattern";
	 } 



	 if ($gender=="") {
	 	$flag=false;
	 	$flag_messge .= " please select any one gender ";
	 }

	

	$contact_pattern="/^[0-9]{3}[-]{1}[0-9]{8}$/";
  	 $contact_pattern_match=preg_match($contact_pattern, $contact);
	if ($contact=="") {
		$flag = false;
		$flag_messge .= "Enter email please";
	}
	elseif (!$contact_pattern_match) {
	 	$flag = false;
		$flag_messge .= "Enter your email  as pattern";
	 } 

	 $cnic_pattern="/^[0-9]{5}[-]{1}[0-9]{7}[-]{1}[0-9]{1}$/";
  	 $cnic_pattern_match=preg_match($cnic_pattern, $cnic);
	if ($contact=="") {
		$flag = false;
		$flag_messge .= "Enter email please";
	}
	elseif (!$cnic_pattern_match) {
	 	$flag = false;
		$flag_messge .= "Enter your email  as pattern";
	 } 
	 if ($group=="") {
	 $flag = false;
		$flag_messge .= "select atleast any one ";
	 }

	

  	 if ($flag) {
  	 	echo "<h1>Form Submited</h1>";
  	 }
  	 else {
  	 	header("location: client_validation.php?error_messages=".$flag_messge);
  	 }

	?>
<table align="center" border="2" >

  		<tr>
  			<td><label>First Name :</label></td>
  			<td><?php echo  $fname; ?></td>
  		</tr>

  		<tr>
  			<td><label>Last Name :</label></td>
  			<td><?php echo  $lname; ?></td>
  		</tr>

  		<tr>
  			<td><label>Last Name :</label></td>
  			<td><?php echo  $lname; ?></td>
  		</tr>

  		<tr>
  			<td><label>Email :</label></td>
  			<td><?php echo  $email; ?></td>
  		</tr>

  		<tr>
  			<td><label>Gender :</label></td>
  			<td><?php echo  $gender; ?></td>
  		</tr>

  		<tr>
  			<td><label>Contact :</label></td>
  			<td><?php echo  $contact; ?></td>
  		</tr>

  		<tr>
  			<td><label>CNIC :</label></td>
  			<td><?php echo  $cnic; ?></td>
  		</tr>
  		
  		<tr>
  			<td><label>Group :</label></td>
  			<td><?php echo  $group;  ?></td>
  		</tr>
  
  	</table>
</body>
</html>
	