<?php include("require/session.php") ?> 
<?php  require_once ("require/header.php");  ?>

<?php require("require/connection.php"); ?>


<script type="text/javascript">
	function send_msg(){
	//var article_id;

	var massage = document.getElementById("massage").value;
	
	//alert(message);
		var ajax_obj;
		if (window.XMLHttpRequest) {
			ajax_obj = new XMLHttpRequest();
			
		}
		else{
			ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

		}
				ajax_obj.onreadystatechange=function(){
			
					if(ajax_obj.readyState==4 && ajax_obj.status==200){
						
							//alert(ajax_obj.readyState);

				 document.getElementById('show_feedback_response').innerHTML=ajax_obj.responseText;
				
				 document.getElementById("massage").value	= " ";
				

				 //show_article();

				 }


		}

		ajax_obj.open("GET","mail_process.php?flag=2&massage="+massage);
		ajax_obj.send(null); 


	}
</script>
<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row fullscreen d-flex align-items-center justify-content-start">
				
							
							<div class="col-lg-8" style="border: 2px solid white">
	<!--<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right"> -->
	
	

	<div  style="overflow: scroll; height: 400px; width: auto;" id="show_feedback_response">

                                        <!--chat Row -->
                                        
                                                <table  cellpadding="15"  >
                                                	<?php 

                                                	$query_massage   	=  "SELECT * FROM chat_massage ORDER BY massage_id DESC";
                                                	$result	= mysqli_query($connection,$query_massage);

                                                	while ($record=mysqli_fetch_assoc($result)) { ?>
                                                		
                                                		<tr>
                                                			<td>
                                                				<p style="color: #d9b38c; ">User Name :<?php echo $record['user_id']; ?>  </p>
                                                			</td>
                                                			<td>
                                                				 <p style="color: #ff99cc"><?php echo $record['massage']; ?> .</p>
                                                			</td>

                                                		</tr>


                                                		<?php 
                                                	}

                                                	  ?>

                                                </table>
                                               
                                           
									</div>


							
						</div>	
						<div class="col-lg-1">
							
						</div>
						<div class="col-lg-3"  style="height: 400px; border: 2px solid orange;overflow: scroll;">
							<table align="center" style="margin-top: 15px; color: white">
								<tr>
									<th style="color:skyblue;text-decoration: underline;">ONLINE PERSONS<hr></th>

								</tr>
								
							<?php 
							$query		= 	"SELECT * FROM blog_user WHERE is_online = '1' ";

								$execution  =	mysqli_query($connection,$query);
							
								while ($record =	mysqli_fetch_assoc($execution)) {
									?>
									<tr>
										<td><?php echo $record['first_name']." ".$record['middle_name']." ".$record['last_name']; ?></td>
									</tr>
									<?php
								}
							



							 ?>
							 </table>
						</div>										
					
					
					<div class="col-12 ">
										<input name="massage" placeholder="Enter your subject" id="massage" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required type="text" value="">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary circle" style="float: right;" onclick="send_msg()">Send Message</button>	
										<div >
											<p id="'show_feedback_response"></p>
										</div>	
									</div>
					
				
				</div>
				</div>
		

			</section>	
			
				
				
			
			<!-- End banner Area -->				  
			
			<!-- Start contact-page Area -->
			
			</section>
			<!-- End contact-page Area -->


<?php require_once ("require/footer2.php"); ?>