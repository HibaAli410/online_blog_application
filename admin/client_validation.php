 
 <?php include("require/connection.php") ?> 
 <?php include("require/session.php") ?>  
  <?php include("header.php") ?>
  <?php require("topcontainer.php") ?>
<?php  require("leftside.php") ?>
<?php require("rightbar.php"); ?>
  

  <!-- banner area -->
  <section class="banner-area relative" id="home">
        <div class="container">
          <div class="overlay overlay-bg"></div>
          <div class="row">
            <div class="banner-content col-lg-8 col-md-12">
              
  
  <div id="container" >
  	
  	<table align="center"  >
  	<form action="<?php if(isset($_REQUEST['msg'])){echo 'update_data.php '; } else { echo 'registration_process.php'; } ?> " method="Post" onsubmit="return register()" enctype="multipart/form-data">	
     <?php
              if(isset($_REQUEST["msg"]))
              {
            ?>
                <tr>
                  <td></td>
                  <td colspan="2" align="center" style="color: darkgreen"><h4><?php echo 'Editing Of'." ".$_REQUEST['first_name']. " ".'Profilr'; ?></h4></td>
                </tr>
            <?php
              }
            ?>
  		<tr>
  			<th colspan="3" ><p align="center" style="font-size: 25px;">Registration HERE ..</p></th>
  		</tr>
      <?php
     
      

        $edit_query             =     "SELECT * FROM blog_user  ";
        if (isset($_REQUEST['user_id'])) {
        	$edit_query             =     "SELECT * FROM blog_user WHERE user_id = '".$_REQUEST['user_id']."'";
        }

        $execution_edit_query   =     mysqli_query($connection,$edit_query);

        while( $edit_record     =     mysqli_fetch_assoc($execution_edit_query)){

      

       ?>
  		<tr>
  			<td id="first_name_message"></td>
  			<td style="text-align: right;">FIRST NAME :</td>
  			<td><input type="text" name="fname" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['first_name'];}
        ?>" id="fname" required>*Abc</td>
  		</tr>
      <tr>
        <td id="middle_name_message"></td>
        <td style="text-align: right;">MIDDLE NAME :</td>
        <td><input type="text" name="middle_name" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['middle_name'];}
        ?>" id="middle_name" ></td>
      </tr>
  		
  		<tr>
  			<td id="last_name_message"></td>
  			<td style="text-align: right;">LAST NAME :</td>
  			<td><input type="text" name="lname" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['last_name'];}
        ?>" id="lname" required></td>
  		</tr>
  		<tr>
  			<td id="email_message"></td>
  			<td style="text-align: right;">EMAIL :</td>
  			<td><input type="text" name="email" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['email'];}
        ?>" id="email" required>*Abc123@user.com</td>
  		</tr>
  		<tr>
  			<td id="password_message"></td>
  			<td style="text-align: right;">PASSSWORD :</td>
  			<td><input type="password" name="password" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['password'];}
        ?>" id="password"  required></td>
  		</tr>
  		<tr>
  			<td id="gender_message"></td>
  			<td style="text-align: right;">GENDER :</td>
  			<td><input type="radio" name="gender" value="male" id="male" >Male
  				<input type="radio" name="gender" value="female" id="female">Female
  			</td>
  		</tr>
  		
  		
  		<tr>
  			<?php $query ="SELECT * FROM country";
  			$execution = mysqli_query($connection,$query); ?>
  			<td id="group_message"></td>
  			<td style="text-align: right;">Country</td>
  			<td><select name="country"  id="group"  required>
  				<option value="">select it</option>
  				<?php while($record=mysqli_fetch_assoc($execution)){ ?>


  				<option value="<?php echo $record['country_code'] ?>"><?php echo $record["country_name"] ;?></option>
  				
  			<?php } ?>
  			</select></td>
  		</tr>
  		<tr>
  			<td id="city_message"></td>
        
  			<td style="text-align: right;">CITY :</td>
  			<td><input type="text" name="city" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['city'];}
        ?>" id="city" required></td>
  		</tr>
  		<tr>
  			<td id="date_message"></td>
  			<td style="text-align: right;">Age :</td>
  			<td><input type="number" name="date" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['age'];}
        ?>" id="date" required></td>
  		</tr>

  		<tr>
  			<td id="date_message"></td>
		<td style="text-align: right;">
			 IMAGE UPLOAD 
		</td>
		<td>
			<input type="file" name="profilepic" value="<?php if(isset($_REQUEST['msg'])){echo $edit_record['user_image'];}
        ?>" required>
		</td>
	</tr>

        <?php    } ?>

  		<tr>
  	<td colspan="3" style="text-align: center;"><input type="submit" name="sub" value="<?php if(isset($_REQUEST['msg'])){echo 'Update';}
        else { echo 'Rejister' ; }?>" id="button"></td>
  		</tr>
  		
  		</form>
  	</table>
  	
  	
  </div>
</div>
</div>
</div>
</section>
  <!--

    
  		/*flag=true;
  	var fname =document.getElementById("fname").value		// f name
  	var fname_pattern=/^[A-Z]{1}[A-z]{2,30}$/
  	var fname_pattern_match=fname_pattern.test(fname);
  	var msg_fname = document.getElementById("first_name_message")
  	var msg_lname = document.getElementById("last_name_message")
  	var msg_email = document.getElementById("email_message")
  	var msg_password = document.getElementById("password_message")
  	var msg_gender = document.getElementById("gender_message")
  	var msg_contact = document.getElementById("contact_message")
  	
  		var msg_city = document.getElementById("city_message")
  	
  	var msg_group = document.getElementById("group_message")
  	  		var msg_date = document.getElementById("date_message")

  	if (fname == "")
				{
					error = false;
					
					msg_fname.innerHTML="<span>#Please Enter Your First Name</span>";
				}
				else if (!fname_pattern_match) {
					error = false;
					msg_fname.innerHTML="<span>#write with th e correct pattern</span>";
									}
									else
									{
										msg_fname.innerHTML="";
									}

	var lname =document.getElementById("lname").value		//last name
	var lname_pattern= /^[A-z]{5,15}$/
	var lname_pattern_match=lname_pattern.test(lname);
	if (lname == "") {
		flag = false;
		msg_lname.innerHTML="<span>#Please enter your name </span>";
	}
	else if (!lname_pattern_match){
		flag = false ;
		msg_lname.innerHTML="<span>#write with the correct pattern</span>";
	}


	var email = document.getElementById("email").value;				// email
	var email_pattern= /^(\w{7,25})(@{1})([a-z]{5,15})(.{1})(com|org|net)$/x;
;
	var email_pattern_match = email_pattern.test(email);
	if (email=="") {
		flag = false
		msg_email.innerHTML="<span>#Please enter your email </span>"
	}
	else if (!email_pattern_match){
		flag = false;
		msg_email.innerHTML="<span>#Please enter coreect pattern like: _ab89s@hajak.etc </span>";

	}
	else {
		msg_email.innerHTML=" ";
	}

	var password = document.getElementById("password").value;
	if (password=="") {
		flag = false
		msg_password.innerHTML="<span>#Please enter your password </span>"
	}
	else {
		msg_password.innerHTML=" ";
	}


	var male = document.getElementById("male").checked;
	var female = document.getElementById("female").checked;					// email
	if (!male && !female) {
		flag = false
		msg_gender.innerHTML="<span>#Please selectatleast any one </span>"
	}
	else {
		msg_gender.innerHTML="";
	}


	var contact = document.getElementById("contact").value
	var contact_pattern =/^[0-9]{3}[-]{1}[0-9]{8}$/  //new RegExp("^[0-9]{3}[-]{1}[0-9]{8}$")
	var contact_pattern_match=contact_pattern.test(contact)
	
	if (contact=="") {
		flag=false;
		msg_contact.innerHTML="<span>#Please write it  </span>"
	}
	else if (!contact_pattern_match){
		flag=false
		msg_contact.innerHTML="<span>#Please write it at like Pattern 030-01111111</span>"
	}
	else{
		msg_contact.innerHTML=""
	}

	
var group= document.getElementById("group").select;
				if (group=="") {
					flag=false;
					msg_group.innerHTML="<span>#please select any one must </span>";

				}
				var city = document.getElementById("city").value;
	if (city=="") {
		flag = false
		msg_city.innerHTML="<span>#Please enter your City Name </span>"
	}
	else {
		msg_city.innerHTML=" ";
	}
		var date = document.getElementById("date").value;
	if (date=="") {
		flag = false
		msg_date.innerHTML="<span>#Please enter your Date of birth </span>"
	}
	else {
		msg_date.innerHTML=" ";
	}
				

				if (flag == true) {
					return true;
				}
				 else{
				 	return false;
				 }
         }*/ -->

        <?php include("footer.php"); ?>
<!--
	 var eng = document.getElementById("english").checked
	 var math = document.getElementById("math").checked
	 var physic = document.getElementById("physic").checked
	 var chemistry = document.getElementById("chemistry").checked

	 if (english == true && math == true && physic == true  && chemistry == true ) {
	 		msg_subject.innerHTML=""
 	}
  	else {
  		flag = false
  		msg_subject.innerHTML="<span>Please select all</span>";
  	}-->
	

















 