 <!-- Recent comment and chats -->
 <script type="text/javascript">
     function edit(blog_id,user_id){
        //alert(blog_id);
        var ajax_object ;
        var blog_id;
        var user_id;
        if(window.XMLHttpRequest){

            ajax_object = new XMLHttpRequest();
        }
         else{
            ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

        }

        ajax_object.onreadystatechange=function(){

            if (ajax_object.readyState == 4 && ajax_object.status == 200) {
                
                //document.getElementById('check').innerHTML=" ";
            document.getElementById('massage').innerHTML                = ajax_object.responseText;
            
                 //document.getElementById('massage').innerHTML             = " ";

            }
        }



         ajax_object.open("GET","aproval_process.php?msg=update_post&blog_id="+blog_id+"user_id="+user_id);
         ajax_object.send(null);
     }
 </script>
                <!-- ============================================================== -->
                <?php  require("require/connection.php") ?>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest Posts</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <!-- Comment Row -->
                               
                                
                                <?php   $query      = "SELECT * FROM blog_post " ;
                                        $execution  =   mysqli_query($connection,$query);
                                        if ($execution->num_rows) {
                                            while ($record = mysqli_fetch_assoc($execution)) {
                                            
                                        ?>
                                <div class="d-flex flex-row comment-row">
                                    
                                    
                                    <div class="comment-text active w-100">
                                        <h6 class="font-medium"><?php echo $record['user_id'] ?></h6>
                                        <span class="m-b-15 d-block"><?php echo $record['blog_title']; ?> </span>
                                        <span class="m-b-15 d-block"><?php echo $record['blog_qout']; ?> </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?php echo $record['date']  ?></span> 
                                            <button type="button" class="btn btn-cyan btn-sm" onclick="edit(<?php echo $record['blog_id'] ." , ".$record['user_id']; ?>)">Edit</button>
                                            <button type="button" class="btn btn-success btn-sm" >Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <?php

                                    }
                                        }


                                ?>
                                <!-- Comment Row -->
                                
                            </div>
                        </div>
