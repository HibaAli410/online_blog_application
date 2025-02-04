


<?php require("require/session.php") ?>
<?php require ("require/connection.php") ?>
<?php require("header.php") ?>
<?php require("topcontainer.php") ?>
<?php  require("leftside.php") ?>
<?php require_once ("rightbar.php"); ?>
<?php //require_once ("top_second_container.php"); ?>
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
            document.getElementById('update_post').innerHTML                = ajax_object.responseText;
            
                 //document.getElementById('massage').innerHTML             = " ";

            }
        }



         ajax_object.open("GET","aproval_process.php?msg=update_post&blog_id="+blog_id+"&user_id="+user_id);
         ajax_object.send(null);
     }

	
function add_post(){

		var title = document.getElementById('title').value;
		var qout = document.getElementById('qout').value;
		var category = document.getElementById('category').value;
		//alert(category);
		var ajax_object ;
		if (window.XMLHttpRequest) {
			ajax_object = new XMLHttpRequest();
		}
		 else{
			ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

		}

		ajax_object.onreadystatechange=function(){

			if (ajax_object.readyState == 4 && ajax_object.status == 200) {
				
				//document.getElementById('check').innerHTML=" ";
			document.getElementById('massage').innerHTML				= ajax_object.responseText;
			document.getElementById('title').value						=" ";
				 document.getElementById('qout').value					= " ";
				 document.getElementById('category').value				= " ";
				 //document.getElementById('massage').innerHTML				= " ";

			}
		}



		 ajax_object.open("GET","aproval_process.php?msg=add_post&title="+title+"&qout="+qout+"&category="+category);
		 ajax_object.send(null);
	}

	function update_post(blog_id,user_id){

		var blog_id ;
		var ajax_object;
		var user_id;

		var title = document.getElementById('title').value;
		var qout = document.getElementById('qout').value;
		var category = document.getElementById('category').value;
		if (window.XMLHttpRequest) {
			ajax_object = new XMLHttpRequest();
		}
		 else{
			ajax_obj = new  ActiveXObject("MICROSOFT.XMLHTTP");

		}

		ajax_object.onreadystatechange=function(){

			if (ajax_object.readyState == 4 && ajax_object.status == 200) {
				
				//document.getElementById('check').innerHTML=" ";
			document.getElementById('massage').innerHTML				= ajax_object.responseText;
			 //document.getElementById('massage').innerHTML				= " ";

			}
		}



		 ajax_object.open("GET","aproval_process.php?msg=update_post_blog&blog_title="+title+"&blog_qout="+qout+"&blog_category="+category+"user_id="+user_id);
		 ajax_object.send(null);

	}
	
			


	
	

</script>



<h3 align="center">
				<?php echo  "user name "//$_SESSION["user"]["fname"] ; ?> Dashboard</h3>
				
	<!--<form action="manage_article_process.php" method="POST">-->
					<table align="center" id="update_post">
						
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
echo 'update_post(<?php echo $record["blog_id"] ." ,  ".$record[user_id] ?>)' ; 
} 
else
{ 
echo "add_post()" ;
} ?> "/>

<button type="button" class="btn btn-success btn-sm" onclick="add_attachment()">ADD Attachments</button>

</td>

</tr>



					</table>
				<!-- </form> -->
			</fieldset>
			<br />
			<br />
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
                                            <button type="button" class="btn btn-cyan btn-sm" onclick="edit(<?php echo $record['blog_id'].",".$record['user_id']; ?>)">Edit</button>
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

		
				
					
						

<?php// require_once ("latest_post.php"); ?>
<?php require("footer.php"); ?>