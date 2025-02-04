
<?php require("require/session.php") ?>
<?php require("require/connection.php") ?>

<?php require("header.php") ?>
<script type="text/javascript">
    function approve(user_id,count_new_users){
        //alert(user_id);
        var ajax_object;
        var user_id;
        var count_new_users; 
       // var count;//= document.getElementById('feedbackid').value;
        //alert(feedbackid);
         if(window.XMLHttpRequest) {
            ajax_object = new XMLHttpRequest();
         }
         else{
            ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

        }

        ajax_object.onreadystatechange=function(){
        
            if (ajax_object.readyState == 4 && ajax_object.status == 200) {
                //document.getElementById('check').innerHTML = ajax_object.responseText;
                document.getElementById('user_approve_request').innerHTML=ajax_object.responseText;
                //document.getElementById('examp').innerHTML=" ";
            }
        }



         ajax_object.open("GET","aproval_process.php?msg=3&user_id="+user_id+"&count_new_users="+count_new_users);
         ajax_object.send(null);

    }
</script>
<?php require("topcontainer.php") ?>
<?php  require("leftside.php") ?>
<?php require_once ("rightbar.php"); ?>


<div class="row">
                    <div class="col-md-12">
                        <div class="card m-t-0">
                            <div class="row">
                                
                            <div class="col-md-12 border-left text-center p-t-10" id="approve_request">
                                    <h3 class="mb-0 font-weight-bold">
                                        
                                        <?php

                                            $query               = "SELECT * FROM blog_user WHERE is_approve = 'no' ";
                                            $execution_query     = mysqli_query($connection,$query);
                                            $count_new_users = 0;
                                            while ($record = mysqli_fetch_assoc($execution_query)) {

                                                $count_new_users++;
                                                
                                            }
                                            echo $count_new_users;
                                        ?>

                                    </h3>
                                    <span class="text-muted">New Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- End cards -->



                  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        
                           
                        <div class="card">
                            
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>
                                                    <label class=" m-b-20">
                                                        
                                                        <span ></span>
                                                    </label>
                                                </th>
                                                <th scope="col">first Name</th>
                                                
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Permission</th>
                                            </tr>
                                        </thead>
                                        <tbody class="customtable" id="user_approve_request">
                                           
                                                        <?php  


                                                        $query="SELECT * FROM blog_user WHERE is_approve='no' ";
                                                            $result = mysqli_query($connection,$query);
                                                         //if($execution->num_rows) {

                                                      while($record=mysqli_fetch_assoc($result)){
                                                           ?>
                                                           
                                                            <tr>
                                                <th>
                                                    <label >
                                                           
                                                        <input type="checkbox" class="listCheckbox"/>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </th>
                                                <td><?php echo $record['first_name']." ".$record['last_name'] ?></td>
                                                 <td><?php echo $record['email']?></td>
                                                  <td><?php echo $record['password'] ?></td>
                                                   <td><?php echo $record['gender'] ?></td>
                                                    <td>
                                                        <button onclick="approve(<?php echo $record['user_id']." , ". $count_new_users ; ?> ) ">Approve</button>
                                                    </td>
                                                
                                            </tr>
                                              
                                               <?php }// }  ?>
                                         </tbody>
                                    </table>

                                </div>
                        </div>
                        
                    </div>


<?php require("footer.php")
  ?>