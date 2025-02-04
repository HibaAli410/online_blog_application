<?php  
include("require/header.php");

?>
<style type="text/css">
table{
	width:60%;
	font-size: 20px;
	height: 150px;
	border: 2px lightgray solid;
	margin-top: 10%;
	margin-left: 25px;
}
td{
	text-align: center;
	color:white;
}

form{
	padding: 10px;
}

</style>

<!-- banner area -->
  <section class="banner-area relative" id="home">
        <div class="container">
          <div class="overlay overlay-bg"></div>
          	<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-8 col-md-12">
<table align="center" >
<form  action="login_process.php" method="post">
	<?php
							if(isset($_REQUEST["message"]))
							{
						?>
								<tr>
									<td colspan="2" align="center" style="color: black"><?php echo $_GET["message"]; ?></td>
								</tr>
						<?php
							}
						?>
	
	<tr>
							<td>ID: </td>
							<td><input type="text" name="id" /></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="password" /></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								
								<input type="submit" name="login" value="Login" />
							</td>
						</tr>	 

</form>

</table>
</div>
</div>
</div>
</section>

<?php include("require/footer2.php"); ?>