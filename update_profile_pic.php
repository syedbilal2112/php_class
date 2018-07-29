<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';

	$update="UPDATE `users` SET `profile`='".$_POST['profile']."' WHERE `id`='1' ";
	$update_query=mysqli_query($con,$update);
	if ($update_query) {
		echo "success";
	}else{
		echo "error";
	}
?>