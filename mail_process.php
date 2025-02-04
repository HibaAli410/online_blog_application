<?php
require("require/connection.php");
    //$to = 'admin@mail.com';

    if ($_REQUEST['flag']== 1) {
        //echo "hellow";

        if($_REQUEST['name']!="" && $_REQUEST['email'] !="" &&  $_REQUEST['subject']!=""  && $_REQUEST['feedback']!=""){
        $query = "INSERT INTO feedback (name,email,subject,feedback) VALUES ('".$_REQUEST['name']."' , '".$_REQUEST['email']."' , '".$_REQUEST['subject']."' ,  '".$_REQUEST['feedback']."')";
        $execution_query = mysqli_query($connection,$query);

        echo "Thanku For feedBack";
        }
        else{

            echo "Fill it Correctly";
           // echo $_REQUEST['message'];
        }

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
