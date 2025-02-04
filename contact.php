<?php  require_once ("require/header.php");  ?>


<script type="text/javascript">
	function feedback(){
	//var article_id;
	var name 	= document.getElementById("name").value;
	var email 	= document.getElementById("email").value;
	var subject = document.getElementById("subject").value;
	var feedback = document.getElementById("feedback").value;
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
				 document.getElementById("name").value		= " ";
				 document.getElementById("email").value 	= " ";
				 document.getElementById("subject").value	= " ";
				 document.getElementById("feedback").value	= " ";


				 //show_article();

				 }


		}

		ajax_obj.open("GET","mail_process.php?flag=1&name="+name+"&email="+email+"&feedback="+feedback+"&subject="+subject);
		ajax_obj.send(null); 


	}
</script>
<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-8 col-md-12">
							<div class="banner-content col-lg-8 col-md-12">
							<h1 class="text-uppercase">
								 Contact us		
							</h1>
						</div>
							<div class="col-lg-8">
	<!--<form class="form-area " id="myForm" action="mail.php" method="post" class="contact-form text-right"> -->
	<div class="row">	
	<div class="col-lg-6 form-group">

	<input name="name" placeholder="Enter your name" id="name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required type="text">
									
<input type="email" name="email" placeholder="Enter email address" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required >

<input name="subject" placeholder="Enter your subject" id="subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required type="text">
									</div>
			<div class="col-lg-6 form-group">
		<textarea class="common-textarea form-control" id="feedback" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required ></textarea>						
									</div>
									<div class="col-lg-12 d-flex justify-content-between">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary circle" style="float: right;" onclick="feedback()">Send Message</button>		
									</div>
								</div>
								<div class="row">
								
								<div class="col-lg-12" >
									<h4 id="show_feedback_response" style="color: darkgreen; font-style: italic;"></h4>
								</div>	
								</div>
						<!--	</form>	  -->
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