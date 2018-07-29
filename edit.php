<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<?php $id=$_GET['id'];
		
		include 'conn.php';

	$query="SELECT * FROM `first_table` where id='$id'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$name=$row['name'];
		$email=$row['email'];
		$password=$row['password'];

	}
	
	?>
		<form>
			<input type="hidden" name="id" value="<?php echo $id?>" id="id">
	<label>Enter Name</label><input  class="form-control" type="text" id="name" name="name" value="<?php echo $name?>"><br>
	<label>Enter Name</label><input  class="form-control" type="email" id="email" name="email"  value="<?php echo $email?>"><br>
	<label>Enter Name</label><input  class="form-control" type="password" id="password"  value="<?php echo $password?>" name="password"><br>
	<button type="button" id="btn">Submit</button>
</form>

<script type="text/javascript">
	$(function(){
		$('#btn').click(function(){
			var name=document.getElementById('name').value;
                var id=document.getElementById('id').value;
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
                               
                alert(id);
                $.ajax({
                    url:"update.php",
                    type:"post",
                    data:{
                        "name":name,
                        "email":email,
                        "password":password,
                        "id":id

                    },
                    success:function(data){
                       alert(data);   
                        
                    },
                    error:function(data){
                    	alert('not right');
                    }
                });
		})
  			
	})
        		
              
        
</script>
</body>
</html>