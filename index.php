<?php

require_once("require/header.php");?>
<?php include("require/nav.php") ?>
<style type="text/css">
table{
	width:27%;
	font-size: 20px;
	height: 120px;
	border: 2px lightgray solid;
	margin-left: -100px;

}
td{
	text-align: center;
	color:white;
}

form{
	padding: 10px;
}

</style>
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
							<td><input type="email" name="email" value="" required /></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="password" value="" required /></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								
								<input type="submit" name="login" value="Login" />
							</td>
						</tr>	 

</form>

</table>
							<div id="button_reg" style="margin-left: 750; margin-top: -200px;">
							<a href="client_validation.php" class="primary-btn header-btn text-uppercase">Registeration</a>
							</div>
						</div>											
					</div>
				</div>
			</section>

			
			<?php
require_once("require/footer2.php");
<!-- commit change -->
	

?>
