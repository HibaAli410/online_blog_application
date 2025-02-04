<?php
include("require/connection.php");
//$query="SELECT country_code FROM city";
 //	$result=mysqli_query($connection,$query);
 
 if($_REQUEST["flag"]==2){
//echo $id=$_REQUEST["country_code"];
?>
 	<select name="city" > city <?php
	 		$query2 = "SELECT city_id,city FROM city WHERE country_code='".$_REQUEST["country_code"]."'";
 	$result2=mysqli_query($connection,$query2);?>
	 			<option value=""> --SELECT City---<?php echo $_REQUEST["country_code"]  ?></option><?php
  			while ($row = mysqli_fetch_assoc($result2)) {?>
	 			
	 				
<option value=" <?php echo $row['city_id']; ?>" > <?php echo $row['city']; ?> </option>
	 				
	 			<?php  }  ?>
	 			
	 			</select>
	 		<?php
	 	
	 }
?>

