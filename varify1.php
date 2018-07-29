<?php


	include 'conn.php';
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query="SELECT password FROM `users` WHERE `email`='$email' AND `role`='admin'";
	
	
	
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_row($result);
   	$user=$row[0];
   	if(password_verify($password, $user)){
   		
   		header("location: test.html");
   	}
   else{
   	$message="not right password";
   		header("location: login.html");
   	
   }
   	
   	
?>