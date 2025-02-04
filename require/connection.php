

<?php

$connection = mysqli_connect("localhost","root","","online_blog_application") ;
if (!$connection) {
	echo "Connection Problem ...";
	echo "<br>& the error is".mysqli_connect_error();
	echo "<br & error number is ".mysqli_connect_errno();
}

?>