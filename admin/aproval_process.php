<?php require("require/session.php") ?>
<?php require("require/connection.php"); ?>
<script type="text/javascript">
//alert($_REQUEST['feedbackid']);
</script>
<?php
date_default_timezone_set("Asia/karachi");
$date = date("Y M D" , time());
//echo $_REQUEST['user_id'];

if($_REQUEST['msg'] == 3) {
$count_new_users = $_REQUEST['count_new_users'];
$count_new_users ++;

$query_approve_id_user=" UPDATE blog_user SET is_approve = 'yes' WHERE user_id = '".$_REQUEST['user_id']."'  ";
$execution_approve_id = mysqli_query($connection,$query_approve_id_user);
$query_approve_id="UPDATE user_role_bridge SET is_approve = 'yes' , on_update = '".date('Y-m-d') ."' WHERE user_id = '".$_REQUEST['user_id']."' ";
$execution_approve_id = mysqli_query($connection,$query_approve_id);




$query="SELECT * FROM blog_user WHERE is_approve='no' ";
$result = mysqli_query($connection,$query);
//if($execution->num_rows) {

while($record=mysqli_fetch_assoc($result)){
?>
<div id="dataapprove">
<tr>
<th>
<label >


<span ></span>
</label>
</th>
<td><?php echo $record['first_name']." ".$record['last_name'] ?></td>
<td><?php echo $record['email']?></td>
<td><?php echo $record['password'] ?></td>
<td><?php echo $record['gender'] ?></td>
<td>
<button onclick="approve(<?php echo $record['user_id'] .",". $count_new_users; ?> ) ">Approve</button>
</td>

</tr>

<?php } 




}


elseif($_REQUEST['msg'] == 2) {

$query     = " UPDATE feedback SET status = 'show' WHERE user_feedback_id = '".$_REQUEST['feedbackid']."' ";
$execution = mysqli_query($connection,$query);
$count = $_REQUEST['count'];
//$count--;
if ($execution) {


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


echo "approved";

}

}     



elseif ($_REQUEST['msg']=="add_post") {

$query_addpost="INSERT INTO blog_post (blog_title,blog_qout,user_id,blog_category_id,date) VALUES ('".$_REQUEST['title']."'  ,  '".$_REQUEST['qout']."',
'".$_SESSION['blog_user']['user_id']."' , '".$_REQUEST['category']."','".date('Y-m-d')."' )";
$execution = mysqli_query($connection,$query_addpost);
echo " Post Addedd Successfully ";
}





elseif ($_REQUEST['msg']=="deactivate") {

$count_active =  $_REQUEST['count_active'] ;
$count_active--;
$count_deactive =  $_REQUEST['count_deactive'] ;
$count_deactive++;

$query_deactivate       ="UPDATE  user_activation_bridge SET user_activation_id = 0 WHERE user_id = '".$_REQUEST['user_id']."' ";
$execution_deactivate   = mysqli_query($connection,$query_deactivate);

$query_offline      ="UPDATE  blog_user SET is_online = 0 WHERE user_id = '".$_REQUEST['user_id']."' ";
$execution_offline   = mysqli_query($connection,$query_offline);



$query = "SELECT * FROM blog_user Where is_approve = 'yes'  ORDER BY user_id DESC";
$execution = mysqli_query($connection,$query);
if ($execution->num_rows) {
while ($record = mysqli_fetch_assoc($execution)) { ?>

<tr  >

<td><?php echo $record['user_id'] ?></td>
<td><?php echo $record['first_name'] ." ".$record['middle_name']." ".$record['last_name']?></td>
<td><?php echo $record['email'] ?></td>
<td><?php echo $record['password'] ?></td>
<td><?php echo $record['city'] ?></td>
<td><?php echo $record['age'] ?></td>
<td> <button type="button" class="btn btn-success btn-sm" onclick="offline(<?php echo $record['user_id']  ?>)" > Off </button></td>
<td> <button type="button" class="btn btn-danger btn-sm" onclick="deactivate(<?php echo $record['user_id']." , " .$count ." , " .$count_active ." , ". $count_deactive ?>)">De-Activate</button></td>
<td> <button type="button" class="btn btn-success btn-sm" onclick="activate(<?php echo $record['user_id']  ." , " .$count ." , " .$count_active ." , ". $count_deactive ?>)">Activate</button></td>
<td> <a href="client_validation.php?msg=edit&user_id=<?php echo $record['user_id'] ?>&first_name=<?php echo $record['first_name']?>"><button type="button" class="btn btn-success btn-sm">Edit Profile</button></a></td>


                               
</tr>


<?php }
}
}  
// deactivation process end


elseif ($_REQUEST['msg']=="activate") {
$count_active       =  $_REQUEST['count_active'] ;
$count_active++;
$count_deactive     =  $_REQUEST['count_deactive'] ;
$count_deactive--;

$query_deactivate       ="UPDATE  user_activation_bridge SET user_activation_id = 1 , on_update = '".date('Y-m-d')."' WHERE user_id = '".$_REQUEST['user_id']."' ";
$execution_deactivate   = mysqli_query($connection,$query_deactivate);



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
<td><a href="client_validation.php?msg=edit&user_id=<?php echo $record['user_id'] ?>&first_name=<?php echo $record['first_name']?> "> <button type="button" class="btn btn-success btn-sm" >Edit Profile</button></a></td>


                               
</tr>


<?php }
}
}

elseif ($_REQUEST['msg']=='offline') {
$query_on_off            = "UPDATE blog_user SET is_online = 0 WHERE user_id = '".$_REQUEST['user_id']."' ";
$query_on_off_execution  = mysqli_query($connection,$query_on_off);



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
<td> <a href="client_validation.php?msg=edit&user_id=<?php echo $record['user_id'] ?>&first_name=<?php echo $record['first_name'] ?>"><button type="button" class="btn btn-success btn-sm" >Edit Profile</button></a></td>



</tr>

<?php }
}



}


elseif($_REQUEST['msg']  ==  "update_post") {
$blog_id                 =   $_REQUEST['blog_id'];
$user_id                 =   $_REQUEST['user_id'];
$query_update            = "SELECT * FROM blog_post WHERE blog_id = '".$blog_id."'";
$query_execution  = mysqli_query($connection,$query_update);
while ($record    = mysqli_fetch_assoc($query_execution)) {
?>
<tr>
<td></td>
<td colspan="2" align="center" style="color: red" id="massage"></td>
</tr>

<tr>
<td> <h4 class="card-title">Title:</h4></td>
<td><input type="text" name="title" value="<?php if(isset($_REQUEST['msg'])){ echo $record["blog_title"]; } ?>" id ="title"  placeholder="Type and enter" class="form-control border-0" required/></td>
</tr>
<tr>
<td><h4 class="card-title">QOUTS:</h4> </td>
<td>
<textarea rows="10" cols="100" name="qout"   placeholder="Type and enter"  id ="qout" class="form-control border-0" required ><?php if(isset($_REQUEST['msg']))
{ echo $record["blog_qout"]; }   ?></textarea>
</td>
</tr>

<tr>
<?php $query ="SELECT * FROM blog_categroy";
$execution = mysqli_query($connection,$query); ?>
<td><h4 class="card-title">Categroy</h4> </td>
<td>
<select id="category" class="form-control border-0" >
<?php while($record=mysqli_fetch_assoc($execution)){ ?>


<option value="<?php if(isset($_REQUEST['msg'])){ echo $record['blog_categroy_id']; }

else echo $record['blog_categroy_id'] ; ?>" >



<?php 
if(isset($_REQUEST['msg']))
{ 

echo $record['category'];

}

else echo $record["category"]  ;  ?>




</option>

<?php } ?>
</select>
</td>
</tr>

<tr id="attachment">

<td>  <h4 class="card-title">number of attechment</h4></td>


</tr>



<tr>
<td colspan="2" align="center">


<input type="button"

<?php 

if(isset($_REQUEST['msg']))
{ 
echo 'name="edit_article" value="Modify Post"' ;
}
else
{
echo 'name="add_post" value="Add Post"'; 
} ?> 

class="btn btn-cyan btn-sm" 

onclick="<?php if (isset($_REQUEST['msg'])) {  
echo 'update_post($record["blog_id"])' ; 
} 
else
{ 
echo "add_post()" ;
} ?> "/>

<button type="button" class="btn btn-success btn-sm" onclick="add_attachment()">ADD Attachments</button>

</td>

</tr>




<?php 
} 

}


elseif($_REQUEST['msg'] == "update_post_blog"){

$query_update_edit = "UPDATE blog_post SET blog_title = '".$_REQUEST['blog_title']."' , blog_qout = '". $_REQUEST['blog_qout']."' ,  blog_categroy_id = '".$_REQUEST['blog_categroy']."' , user_id = '".$_REQUEST['user_id']. "' , date = '".date('Y-M-D h:i:sa') ."' WHERE blog_id = '".$_REQUEST['blog_id']."' " ;

$query_execution_edit_update  =   mysqli_query($connection,$query_update_edit);


$query_update  = "SELECT * FROM blog_post WHERE blog_id = '".$blog_id."'";
$query_execution  = mysqli_query($connection,$query_update);
while ($record    = mysqli_fetch_assoc($query_execution)) {
?>
<tr>
<td></td>
<td colspan="2" align="center" style="color: red" id="massage"></td>
</tr>

<tr>
<td> <h4 class="card-title">Title:</h4></td>
<td><input type="text" name="title" value="<?php if(isset($_REQUEST['msg'])){ echo $record["blog_title"]; } ?>" id ="title"  placeholder="Type and enter" class="form-control border-0" required/></td>
</tr>
<tr>
<td><h4 class="card-title">QOUTS:</h4> </td>
<td>
<textarea rows="10" cols="100" name="qout"   placeholder="Type and enter"  id ="qout" class="form-control border-0" required ><?php if(isset($_REQUEST['msg'])){ echo $record["blog_qout"]; }   ?></textarea>
</td>
</tr>

<tr>
<?php $query ="SELECT * FROM blog_categroy";
$execution = mysqli_query($connection,$query); ?>
<td><h4 class="card-title">Categroy</h4> </td>
<td>
<select id="category" class="form-control border-0" >
<?php while($record=mysqli_fetch_assoc($execution)){ ?>


<option value="<?php if(isset($_REQUEST['msg'])){ echo $record['blog_categroy_id']; }

else echo $record['blog_categroy_id'] ; ?>" >



<?php 
if(isset($_REQUEST['msg']))
{ 

echo $record['category'];

}

else echo $record["category"]  ;  ?>




</option>

<?php } ?>
</select>
</td>
</tr>

<tr id="attachment">

<td>  <h4 class="card-title">number of attechment</h4></td>


</tr>



<tr>
<td colspan="2" align="center">


<input type="button"

<?php 

if(isset($_REQUEST['msg']))
{ 
echo 'name="edit_article" value="Modify Post"' ;
}
else
{
echo 'name="add_post" value="Add Post"'; 
} ?> 

class="btn btn-cyan btn-sm" 

onclick="<?php if (isset($_REQUEST['msg'])) {  
echo 'update_post($record["blog_id"])' ; 
} 
else
{ 
echo "add_post()" ;
} ?> "/>

<button type="button" class="btn btn-success btn-sm" onclick="add_attachment()">ADD Attachments</button>

</td>

</tr>

<?php 
}
}



				  elseif ($_REQUEST['msg'] = 'send_msg') {
        
                                               //echo $_REQUEST['txtmsg'];
                                    $query_msg_send            = "INSERT INTO chat_massage (massage,user_id,date_time) VALUES ('".$_REQUEST['txtmsg']."' , '". $_SESSION['blog_user']['user_id']."' , '". date('Y-m-d h:i:sa')."'   ) ";
                                    $query_execution_send_msg   = mysqli_query($connection,$query_msg_send);


                                    $query_show_msg             =  "SELECT * FROM chat_massage  ORDER BY massage_id DESC";
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
                                }


                                      //echo $_REQUEST['txtmsg'];






else
{
echo "not responece coomimg from this page";
//$query= "SELECT * FROM feedback Where status = 'show' ORDER BY user_feedback_id DESC ";}
}


?>