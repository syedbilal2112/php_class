<?php


	include 'conn.php';
	$id = $_POST['id'];

	$query="DELETE FROM `FIRST_TABLE` WHERE `id`='$id'";
	echo $query;
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted ";
	}
	else{
		echo "Error";
	}
?>