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
	<?php $a=$_GET['email'];
	session_start();
	echo $a;
	echo $_SESSION[$a];
		if(!isset($_SESSION[$a])) { // if already login
		   header("location: login.php"); // send to home page
		   exit; 
		}
	?>

	<form action="logout.php" method="post">
	<button type="submit">LogOut</button>
</form>
		<form>
	<label>Enter Name</label><input  class="form-control" type="text" id="name" name="name"><br>
	<label>Enter Name</label><input  class="form-control" type="email" id="email" name="email"><br>
	<label>Enter Name</label><input  class="form-control" type="password" id="password" name="password"><br>
	<button type="button" id="btn">Submit</button>
</form>
<button id="button">Click me</button>
<input type="text" name="search" id="search" placeholder="Enter Name to search">
<button id="searchbtn">Search</button>
<table class="table" id="history_display">
    <thead>
     <th>ID</th>
      <th>Name</th>
      <th>email</th>
      <th>Password</th>
      <th>Action</th>
    </thead>
</table>
<div class="container">

  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
          <label> Name</label><input  class="form-control" disabled type="text" id="name1" name="name"><br>
	<label> Email</label><input  class="form-control" disabled type="email" id="email1" name="email"><br>
	<label> Password</label><input  class="form-control" disabled type="password" id="password1" name="password"><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<script type="text/javascript">
	$(function(){
		$('#logout').click(function(){
			$.ajax({
				url:'logout.php',
				type:'post',
				data:{
				},
				success:function(){
					alert('LogOut successfull')
				},
				error:function(){
					alert('something went wrong')
				}
			})
		})
		$('#searchbtn').click(function(){
			var a=document.getElementById('search').value;
			
			$.ajax({
				url:'search.php',
				type:'post',
				data:{
					"name":a
				},
				success:function(response){
					
					var obj=JSON.parse(response);
					
                        var table_content=""
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                        	alert(value.id)
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.Name+"</td>";
                            table_content+="<td>"+value.Email+"</td>";
                            table_content+="<td>"+value.Password+"</td>";
  table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='delet("+value.id+")'>Delete</button><button type='button' class='btn btn-info' onclick='model("+value.id+")' >View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#history_display").append(table_content);
				},
				error:function(){
					alert('something went wrong')
				}
			})
		})

		$('#btn').click(function(){

			var a=document.getElementById('name').value;
			var b=document.getElementById('email').value;
			var c=document.getElementById('password').value;
			alert(a+b+c)
			$.ajax({
				url:'insert.php',
				type:'post',
				data:{
					"name":a,
					"email":b,
					"password":c
				},
				success:function(){
					alert('row added successfully')
				},
				error:function(){
					alert('something went wrong')
				}
			})
		})
	})
	function model(id){
		
		$.ajax({
				url:'view.php',
				type:'post',
				data:{
					"id":id
				},
				success: function(data){
					var obj=JSON.parse(data);

                       $.each(obj,function(index,value){
					
					 $('#name').val(value.name);
					 $('#email').val(value.email);
					 $('#password').val(value.password);
					$('#myModal').modal('show');
				});
				},
				error:function(){
					alert('not right')
				}
			})

		

	}
	function delet(id){
		alert(id);
		$.ajax({
				url:'delete.php',
				type:'post',
				data:{
					"id":id
				},
				success: function(response){
					alert(response);
				},
				error:function(){
					alert('not right')
				}
			})
	}
	$(function(){
		$('#button').click(function(){
			$.ajax({
				url:'index.php',
				type:'get',
				data:{

				},
				success: function(response){
					
					var obj=JSON.parse(response);

                        var table_content=""
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.Name+"</td>";
                            table_content+="<td>"+value.Email+"</td>";
                            table_content+="<td>"+value.Password+"</td>";
  table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='delet("+value.id+")'>Delete</button><button type='button' class='btn btn-info' onclick='model("+value.id+")' >View</button></td>";
                            table_content+="</tr>";
                        });
                        $("#history_display").append(table_content);
				},
				error: function(){
					alert('Something went wrong');
				}
			})
		})
		
	})

</script>
</body>
</html>