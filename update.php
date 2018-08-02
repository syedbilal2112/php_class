<?php


	include 'conn.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$id = $_POST['id'];
	$query="UPDATE `users` SET `name`='$name', `password`='$password', `email`='$email' WHERE `id`='$id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Updated ";
	}
	else{
		echo "Error..........................";
	}
?>