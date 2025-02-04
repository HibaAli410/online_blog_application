
<?php
require("require/session.php");
require("require/connection.php" );
require("header.php");
require("topcontainer.php");
require("leftside.php");


require_once ("rightbar.php");?>
<script type="text/javascript">
	

	
	
	function feedback(feedbackid,count){

		var ajax_object;
		var feedbackid; 
		var count;//= document.getElementById('feedbackid').value;
		//alert(feedbackid);
		 if (window.XMLHttpRequest) {
		 	ajax_object = new XMLHttpRequest();
		 }
		 else{
			ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

		}

		ajax_object.onreadystatechange=function(){

			if (ajax_object.readyState == 4 && ajax_object.status == 200) {
				
				//document.getElementById('check').innerHTML=" ";
				document.getElementById('check').innerHTML = ajax_object.responseText;
			}
		}



		 ajax_object.open("GET","aproval_process.php?msg=2&feedbackid="+feedbackid+"&count="+count);
		 ajax_object.send(null);

	}
	

</script>
<div class="container" >
               <div class="row">
                    <div class="col-md-12">
                        <div class="card m-t-0">
                            <div class="row">
                            <div class="col-md-12 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold"><?php 

                    $query="SELECT * FROM feedback WHERE status = 'hide' ";
                    
                    $execution = mysqli_query($connection,$query);
                    $count=0;
                    if ($execution-> num_rows) {
                    	while ($result = mysqli_fetch_assoc($execution)) {
                    		$count++;
                    	}
                    }
                    echo $count;
                     ?></h3>
                                    <span class="text-muted">FeedBack Mails</span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
                <!-- End cards -->

           <!-- </div> -->






                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
             
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Datatable</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            	
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody id="check">
                                        	<?php  

                                        	$query = "SELECT * FROM feedback Where status = 'hide'  ORDER BY user_feedback_id DESC";
                                        	$execution = mysqli_query($connection,$query);
                                        	if ($execution->num_rows) {
                                        		while ($record = mysqli_fetch_assoc($execution)) { ?>
                                        		
                                        			<tr id="check" >
                                        				
                                        				<td><?php echo $record['name'] ?></td>
                                        				<td><?php echo $record['email'] ?></td>
														<td><?php echo $record['subject'] ?></td>
														<td><?php echo $record['feedback'] ." " .$record['user_feedback_id']?></td>
														<td><button id="feedbackid" onclick="feedback(<?php echo $record['user_feedback_id']  ?> ,<?php echo $count  ?>)">Check</button></td>
                                        			</tr>

                                        		<?php }
                                        	}

                                        	?>
                                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            	
                                                 <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                              </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                   
                        </div>
                 
        </div>
    </div>
           </div>     
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
          









                <?php




require("footer.php");
?>
 <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>    
