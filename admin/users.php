<?php   require("require/session.php"); ?>
<?php   require("require/connection.php") ; ?>
<?php require("header.php") ?>
<?php require("topcontainer.php") ?>
<?php  require("leftside.php") ?>
<?php require_once ("rightbar.php"); ?>
<script type="text/javascript">


function deactivate(user_id, count ,count_active ,count_deactive){

    var user_id ;
    var ajax_object;
    var count;
    var count_active;
    var count_deactive;

    if(window.XMLHttpRequest){
        ajax_object     =   new XMLHttpRequest();
    }
    else{
        ajax_object     = new ActiveXObject("MICROSOFT.XMLHTTP");
    }

    ajax_object.onreadystatechange=function() {
        
        if (ajax_object.readyState==4 && ajax_object.status==200) {
            document.getElementById('check').innerHTML=ajax_object.responseText;
        }
    }




    ajax_object.open("GET","aproval_process.php?msg=deactivate&user_id="+user_id+"&count="+count+"&count_active="+count_active+"&count_deactive="+count_deactive);
    ajax_object.send(null);

}



// activation function


function activate(user_id , count ,count_active ,count_deactive  ){
   // alert(user_id);

    var user_id ;
    var count ;
    var count_active;
    var count_deactive;
    var ajax_object;

    if(window.XMLHttpRequest){
        ajax_object     =   new XMLHttpRequest();
    }
    else{
        ajax_object     = new ActiveXObject("MICROSOFT.XMLHTTP");
    }

    ajax_object.onreadystatechange=function() {

        
        if (ajax_object.readyState==4 && ajax_object.status==200) {
            document.getElementById('check').innerHTML=ajax_object.responseText;
        }
    }




    ajax_object.open("GET","aproval_process.php?msg=activate&user_id="+user_id+"&count="+count+"&count_active="+count_active+"&count_deactive="+count_deactive);
    ajax_object.send(null);

}
function offline(user_id){
    var user_id ;
    //var count_online;
    var ajax_object ;
    if(window.XMLHttpRequest){
        ajax_object     =   new XMLHttpRequest();
    }
    else{
        ajax_object     = new ActiveXObject("MICROSOFT.XMLHTTP");
    }

    ajax_object.onreadystatechange=function() {

        
        if (ajax_object.readyState==4 && ajax_object.status==200) {
            document.getElementById('check').innerHTML=ajax_object.responseText;
        }
    }




    ajax_object.open("GET","aproval_process.php?msg=offline&user_id="+user_id);
    ajax_object.send(null);
}
</script>

<!-- Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                                
                            <div class="col-md-12 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold">
                                    <?php 

                    $query="SELECT * FROM blog_user Where is_approve = 'yes' ";
                    
                    $execution = mysqli_query($connection,$query);
                    $count=0;
                    if ($execution-> num_rows) {
                        while ($result = mysqli_fetch_assoc($execution)) {
                            $count++;
                        }
                    }
                    echo $count;
                     ?></h3>
                                    <span class="text-muted">Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                            <div class="col-md-12 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold">
                                        
                                                        <?php 

                    $query="SELECT * FROM user_activation_bridge Where user_activation_id = 1   ";
                    
                    $execution = mysqli_query($connection,$query);
                    $count_active=0;
                    if ($execution-> num_rows) {
                        while ($result = mysqli_fetch_assoc($execution)) {
                            $count_active++;
                        }
                    }
                    echo $count_active;
                     ?>

                                    </h3>
                                    <span class="text-muted">Active Acount USers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                             <div class="col-md-12 border-left text-center p-t-10">
                                    <h3 class="mb-0 ">                
                                                        <?php 

                    $query="SELECT * FROM user_activation_bridge Where user_activation_id = 0   ";
                    
                    $execution = mysqli_query($connection,$query);
                    $count_deactive=0;
                    if ($execution-> num_rows) {
                        while ($result = mysqli_fetch_assoc($execution)) {
                            $count_deactive++;
                        }
                    }
                    echo $count_deactive;
                     ?></h3>
                                    <span class="text-muted">DE-Active Acount Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card m-t-0">
                            <div class="row">
                            <div class="col-md-12 border-left text-center p-t-10">
                                    <h3 class="mb-0 font-weight-bold" >
                                        
                                         <?php 

                    $query="SELECT * FROM blog_user Where is_online = 1  ";
                    
                    $execution = mysqli_query($connection,$query);
                    $count_online=0;
                    if ($execution-> num_rows) {
                        while ($result = mysqli_fetch_assoc($execution)) {
                            $count_online++;
                        }
                    }
                    echo $count_online;
                     ?>

                                    </h3>
                                    <span class="text-muted">Online Users</span>
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
                            <div class="card-body">
                                <h5 class="card-title"><?php if(isset($_REQUEST['msg'])){ echo $_REQUEST['msg'] ; }else{
                                    echo "";
                                } ?></h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Roll Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>City</th>
                                                 <th>age</th>
                                                 <th>Do Off line</th>
                                                <th>Deactivate</th>
                                                <th>Activate</th>
                                                <th>Edit Information</th>
                                               </tr>
        </thead>
        


           <tbody id="check" >
            <?php  

            $query = "SELECT * FROM blog_user Where is_approve = 'yes'  ORDER BY user_id DESC";
            $execution = mysqli_query($connection,$query);
            if ($execution->num_rows) {
                while ($record = mysqli_fetch_assoc($execution)) { ?>

    <tr >
         
        <td><?php echo $record['user_id'] ?></td>
        <td><?php echo $record['first_name'] ." ".$record['middle_name']." ".$record['last_name']?></td>
        <td><?php echo $record['email'] ?></td>
        <td><?php echo $record['password'] ?></td>
         <td><?php echo $record['city'] ?></td>
          <td><?php echo $record['age'] ?></td>
           <td> <button type="button" class="btn btn-success btn-sm" onclick="offline(<?php echo $record['user_id']  ?>)" > Off </button></td>
    <td> <button type="button" class="btn btn-danger btn-sm" onclick="deactivate(<?php echo $record['user_id']." , " .$count ." , " .$count_active ." , ". $count_deactive ?>)">De-Activate</button></td>
     <td> <button type="button" class="btn btn-success btn-sm" onclick="activate(<?php echo $record['user_id']  ." , " .$count ." , " .$count_active ." , ". $count_deactive ?>)">Activate</button></td>
     <td><a href="client_validation.php?msg=edit&user_id=<?php echo $record['user_id'] ?>&first_name=<?php echo $record['first_name'] ?>"><button type="button" class="btn btn-success btn-sm" >Edit Profile</button></a></td>

                                                                                                             
                                                    </tr>

                                                <?php }
                                            }

                                            ?>
                                           </tbody>
                                      <tfoot>
                                            <tr>
                                                <th>Roll Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>City</th>
                                                <th>age</th>
                                                <th>Do Off line</th>
                                                <th>Deactivate</th>
                                                <th>Activate</th>
                                                <th>Edit Information</th>
                                              
                                                
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
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
            </div>
           

<?php require("footer.php")
  ?>
  <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
  <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>    