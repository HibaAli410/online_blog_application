<?php 

require("require/session.php");
require ("require/connection.php");
include("header.php");
include ("topcontainer.php");
include ("leftside.php");
 require_once ("rightbar.php");
?>

<table align="center"  >
  	<form action="registration_process.php" method="Post" onsubmit="return register()" enctype="multipart/form-data">	
     <?php
              if(isset($_REQUEST["message"]))
              {
            ?>
                <tr>
                  <td></td>
                  <td colspan="2" align="center" style="color: darkgreen"><?php echo $_GET["message"]; ?></td>
                </tr>
            <?php
              }
            ?>
  		<tr>
  			<th colspan="3" ><p align="center" style="font-size: 25px;">Add A User ..</p></th>
  		</tr>
  		<tr>
  			<td id="first_name_message"></td>
  			<td style="text-align: right;">FIRST NAME :</td>
  			<td><input type="text" name="fname" value="" id="fname" required class="form-control border-0">*Abc</td>
  		</tr>
      <tr>
        <td id="middle_name_message"></td>
        <td style="text-align: right;">MIDDLE NAME :</td>
        <td><input type="text" name="middle_name" value="" id="middle_name" class="form-control border-0"  ></td>
      </tr>
  		
  		<tr>
  			<td id="last_name_message"></td>
  			<td style="text-align: right;">LAST NAME :</td>
  			<td><input type="text" name="lname" value="" id="lname" class="form-control border-0" required></td>
  		</tr>
  		<tr>
  			<td id="email_message"></td>
  			<td style="text-align: right;">EMAIL :</td>
  			<td><input type="text" name="email" value="" id="email" class="form-control border-0" required>*Abc123@user.com</td>
  		</tr>
  		<tr>
  			<td id="password_message"></td>
  			<td style="text-align: right;">PASSSWORD :</td>
  			<td><input type="password" name="password" value="" id="password"  class="form-control border-0" required></td>
  		</tr>
  		<tr>
  			<td id="gender_message"></td>
  			<td style="text-align: right;">GENDER :</td>
  			<td><input type="radio" name="gender" value="male" id="male" >Male
  				<input type="radio" name="gender" value="female" id="female"  >Female
  			</td>
  		</tr>
  		
  		
  		<tr>
  			<?php $query ="SELECT * FROM country";
  			$execution = mysqli_query($connection,$query); ?>
  			<td id="group_message"></td>
  			<td style="text-align: right;">Country</td>
  			<td><select name="country"  id="group" class="form-control border-0" required>
  				<option value="" >select it</option>
  				<?php while($record=mysqli_fetch_assoc($execution)){ ?>


  				<option value="<?php echo $record['country_code'] ?>" ><?php echo $record["country_name"] ;?></option>
  				
  			<?php } ?>
  			</select></td>
  		</tr>
  		<tr>
  			<td id="city_message"></td>
        
  			<td style="text-align: right;">CITY :</td>
  			<td><input type="text" name="city" value="" id="city" class="form-control border-0" required></td>
  		</tr>
  		<tr>
  			<td id="date_message"></td>
  			<td style="text-align: right;">Age :</td>
  			<td><input type="number" name="date" value="" id="date" class="form-control border-0" required></td>
  		</tr>

  		<tr>
  			<td id="date_message"></td>
		<td style="text-align: right;">
			 IMAGE UPLOAD 
		</td>
		<td>
			<input type="file" name="profilepic" value="" class="form-control border-0" required>
		</td>
	</tr>

  		<tr>
  	<td colspan="3" style="text-align: center;"><input type="submit" name="sub" value="REJISTER" id="button"></td>
  		</tr>
  		
  		</form>
  	</table>
  	
<?php 

include("footer.php");

 ?>