<?php

	include 'conn.php';
	$name= $_POST['name'];
	$query="SELECT * FROM `first_table` WHERE `Name`='$name'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>