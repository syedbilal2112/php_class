<?php 
include 'conn.php';
$query="SELECT password FROM `first_table` where id='25'";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($result)){
		$name=$row['password'];

	}
	echo $name;
if(password_verify('Syedbilal1', $name))
	echo 'true';
else
	echo 'not true'

?>