
<?php  require_once("require/header.php") ?>
<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Volunteer				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="volunteer.php	"> volunteer</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->
<section class="Volunteer-form-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-20">Want to Visit ? Please Fill This Form</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
							</div>
						</div>
					</div>						
					<div class="row justify-content-center">

						<div class="col-lg-9"  >
						  <div class="form-group">
						    <label for="first-name">First Name</label>
						    <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name">
						  </div>
						  <div class="form-group">
						    <label for="last-name">Last Name</label>
						    <input type="text" name="lname" id="lname"  class="form-control" placeholder="Last Name">
						  </div>						  
						  <div class="form-group">
						    <label for="Address">Address</label>
						    <input type="text" name="address" id="address" class="form-control mb-20" placeholder="Your Address">
						   </div>
						   <div class="form-group">
						  		<label for="phone">Visiting Day</label>
						   		<input type="phone" id="visit_day" name="visit_day" class="form-control" placeholder="Visiting Day">						  		
						  	</div>						  
						  <div class="form-row">
						  	<div class="col-6 mb-30">
						  		<label for="City">City</label>
						   		<div class="select-option" id="service-select">
									<input type="text" name="city" id="city" class="form-control mb-20" placeholder="Your Address">
								</div>	
						  	</div>
						  	<div class="col-6 mb-30">
						  		<label for="state">State</label>
						   		<div class="select-option" id="service-select">
									<input type="text" name="state" id="state" class="form-control mb-20" placeholder="Your Address">
								</div>						  		
						  	</div>						  	
						  	<div class="col-6 mb-30">
						  		<label for="Country">Country</label>
						   		<div class="select-option" id="service-select">
									<input type="text" id="country" name="country" class="form-control mb-20" placeholder="Your Address">
								</div>	
						  	</div>
						  	<div class="col-6 mb-30">
						  		<label for="postal-code">Cnic</label>
						   		<input type="text" id="cnic"  name="cnic" class="form-control" placeholder="Postal Code">						  		
						  	</div>						  	
						  	<div class="col-6 mb-30">
						  		<label for="email">Email Address</label>
						   		<input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
						  	</div>
						  	<div class="col-6 mb-30">
						  		<label for="phone">Phone Number</label>
						   		<input type="phone" id="phone" name="phone" class="form-control" placeholder="Phone Number">						  		
						  	</div>
						  	
						  </div>		

						  
						  <div class="form-group">
						    <label for="note">Visiting Purpose</label>
						    <textarea class="form-control" name="visit_purpose" id="visit_purpose" rows="5" placeholder="Write message"></textarea>
						  </div>						  
						  <button onclick="submission()" class="primary-btn float-right">Send Request</button>
						</div>
						
						<div style="width: 100%; " ><h1 id="conformation"></h1></div>
					</div>
				</div>	
			</section>
			<!-- End Volunteer-form Area -->
			<script type="text/javascript">
			function submission(){
				//alert("hellow");
				var fname = document.getElementById('fname').value;
				var lname = document.getElementById('lname').value;
				var address = document.getElementById('address').value;
		var visit_purpose = document.getElementById('visit_purpose').value; 
				var city = document.getElementById('city').value;
				var state = document.getElementById('state').value;
				var country = document.getElementById('country').value;
				var cnic = document.getElementById('cnic').value;
				var email = document.getElementById('email').value;
				var phone = document.getElementById('phone').value;
				var visit_day = document.getElementById('visit_day').value; 
				
				var ajax_obj;
				//alert("object is built");
				if (window.XMLHttpRequest) {
			ajax_obj = new XMLHttpRequest();
			//alert(ajax_obj.readyState);
		}

		  
			ajax_obj.onreadystatechange=function(){
			if(ajax_obj.readyState==4 && ajax_obj.status==200){
				document.getElementById('conformation').innerHTML=ajax_obj.responseText;
				document.getElementById('fname').value="";
				  document.getElementById('lname').value="";
				 document.getElementById('address').value="";
		 document.getElementById('visit_purpose').value=""; 
				document.getElementById('city').value="";
				 document.getElementById('state').value="";
				document.getElementById('country').value="";
			 document.getElementById('cnic').value="";
		document.getElementById('email').value="";
				 document.getElementById('phone').value="";
				 document.getElementById('visit_day').value="";
				

			}}
		ajax_obj.open("GET","submission.php?flag=1&fname="+fname+"&lname="+lname+"&address="+address+"&city="+city+"&state="+state+"&country="+country+"&cnic="+cnic+"&email="+email+"&phone="+phone+"&visit_purpose="+visit_purpose+"&visit_day="+visit_day);
		ajax_obj.send(null);

			}

			</script>														
<?php  require_once("require/footer2.php") ?>


