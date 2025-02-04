<?php require("header.php") ?>
<?php require("require/session.php")  ?>
<?php require("require/connection.php") ?>
<?php require_once ("topcontainer.php"); ?>
<?php require_once ("leftside.php"); 
date_default_timezone_set("Asia/karachi");?>


<script type="text/javascript">
    
    function send() {

        var ajax_object ;
        var txtmsg = document.getElementById("txtmsg").value;
if (window.XMLHttpRequest) {
ajax_object = new XMLHttpRequest();
}
else{
ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

}

ajax_object.onreadystatechange=function(){

if (ajax_object.readyState == 4 && ajax_object.status == 200) {

//document.getElementById('check').innerHTML=" ";
document.getElementById('response_msg').innerHTML   = ajax_object.responseText;
document.getElementById("txtmsg").value             = " ";



}

}
                                ajax_object.open("GET","aproval_process.php?msg=send_msg&txtmsg="+txtmsg);
                                        ajax_object.send(null);

    }

</script>
        
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Chat Option</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chat Option</h4>
                                <div class="chat-box scrollable" style="height:475px;">
                                    <!--chat Row -->
                                    <ul class="chat-list">
                                        <!--chat Row -->
                                        <li class="chat-item">
                                            <div class="chat-img"><img src="assets/images/users/1.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium">James Anderson</h6>
                                                <div class="box bg-light-info" id="response_msg">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                            </div>
                                            <div class="chat-time">10:56 am</div>
                                        </li>
                                        <!--chat Row -->
                                        
                                
                                        <?php  

                                         $query_show_msg             =  "SELECT *  FROM chat_massage  ORDER BY massage_id DESC";
                                    $query_execution_show_msg   =  mysqli_query($connection,$query_show_msg);

                                    while ($record = mysqli_fetch_assoc($query_execution_show_msg)) { 
                                      ?>
                                      <li class="chat-item">
                                            <div class="chat-img"><img src="../../assets/images/users/3.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h6 class="font-medium"><?php echo $record['user_id'] ?></h6>
                                                <div class="box bg-light-info"><?php  echo $record['massage'] ?></div>
                                            </div>
                                            <div class="chat-time"><?php echo $record['date_time']; ?></div>
                                        </li>

                                        <?php 
                                    }

                                        ?>
                                        <!--chat Row -->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="input-field m-t-0 m-b-0">
                                            <input type="text" name="writemsg" value="" id="txtmsg" placeholder="Type and enter" class="form-control border-0" >
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button  class="circle btn-lg btn-cyan float-right text-white"  onclick="send()"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <?php require_once ("footer.php"); ?>