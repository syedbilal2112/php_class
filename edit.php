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

	$query="SELECT * FROM `users` where id='$id'";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$name=$row['name'];
		$email=$row['email'];
		$password=$row['password'];
		$profile_pic=$row['profile'];
	}
	
	?>
		<form>
			<input type="hidden" name="id" value="<?php echo $id?>" id="id">
	<label>Enter Name</label><input  class="form-control" type="text" id="name" name="name" value="<?php echo $name?>"><br>
	<label>Enter Name</label><input  class="form-control" type="email" id="email" name="email"  value="<?php echo $email?>"><br>
	<label>Enter Name</label><input  class="form-control" type="password" id="password"  value="<?php echo $password?>" name="password"><br>
	<button type="button" id="btn">Submit</button>
</form>
	<img src="<?php echo $profile_pic?>" id="profile_pic" width="150px" height="150px" style="border-radius: 50%">
         <input type="hidden" id="eid" class="form-control" placeholder="EID" value="<?php echo $id?>" readonly>

    <input type="file" name="files[]" id="file" accept=".jpg" required/>
    <br>
     <button type="button" id="upload_profile_pic" class="btn btn-primary ">Update Pic</button>
<script type="text/javascript">

	$(function(){




		  		     $('#file').on('change', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'upload.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                        
                            alert(response)
                            document.getElementById("profile_pic").src=response;
                            x=response;

                           
                        },
                        error: function (response) {
                          
                           alert(response);
                        }
                    });
               });
  	$('#upload_profile_pic').on('click', function () {

               
                  var eid=$("#eid").val();
                  var profile=x;
                   
                        $.ajax({
                            url:"update_profile_pic.php",
                            type:"post",
                            data:{
                               	"id":eid,
                                "profile":profile
                            },
                            success:function(data){
                              alert(data);
                             // window.reload();   
                              },
                              error:function(){
                              	alert(';hi');
                              }
                });
           
      });
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