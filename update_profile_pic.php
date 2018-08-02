<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$id=$_POST['id'];
	$update="UPDATE `users` SET `profile`='".$_POST['profile']."' WHERE `id`='$id' ";
	$update_query=mysqli_query($con,$update);
	if ($update_query) {
		echo "success";
	}else{
		echo "error";
	}
?>