<?php
require ("require/session.php");     
require("require/connection.php");
    //$to = 'admin@mail.com';

date_default_timezone_set("Asia/karachi");
    if ($_REQUEST['flag']== 1) {
        //echo "hellow";

        if($_REQUEST['subject']!=""  && $_REQUEST['feedback']!=""){
        $query = "INSERT INTO feedback (user_id,name,email,subject,feedback) VALUES ('".$_SESSION['blog_user']['user_id']."','".$_SESSION['blog_user']['first_name']."' , '".$_SESSION['blog_user']['email']."' , '".$_REQUEST['subject']."' ,  '".$_REQUEST['feedback']."' )";
        $execution_query = mysqli_query($connection,$query);
        if ($execution_query) {
           
       
        echo "Thanku For feedBack";

        }
         
        else{

            echo "Fill it Correctly";
           // echo $_REQUEST['message'];
        }
        }
        else{
             echo "Pleas Fill It you can't send empty FeedBack";
        }


    } /// first upper if


    elseif ($_REQUEST['flag']==2) {
        
        $massage                          = $_REQUEST['massage'];

        $query_send_msg                   = "INSERT INTO chat_massage (massage,user_id,date_time) VALUES ('".$_REQUEST['massage']."' , '".$_SESSION['blog_user']['user_id']."' , '".date('Y-m-d h:i:sa')."') ";
        $execution_query_send_msg         = mysqli_query($connection,$query_send_msg); ?>

                                                <table  cellpadding="10"  >
                                                    <?php 

                                                    $query_massage      =  "SELECT * FROM chat_massage ORDER BY massage_id DESC";
                                                    $result = mysqli_query($connection,$query_massage);

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
                                                <?php 

                                 }


                 else{
                              echo "Flag is not working";
                    
                        }



   /* $firstname = $_POST["fname"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    $phone= $_POST["phone"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$firstname.'  '.$laststname.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$phone.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {
        echo 'The message has been sent.';
    }else{
        echo 'failed';
    }*/

?>
