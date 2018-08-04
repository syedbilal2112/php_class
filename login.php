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
	<form action="varify1.php" method="post">
	<label>Enter Email</label><input  class="form-control" type="email" id="email" name="email"><br>
	<label>Enter Password</label><input  class="form-control" type="password" id="password" name="password"><br>
	<button type="submit" id="btn">Submit</button>
</form>


<script type="text/javascript">
	$(function(){
		 localStorage['role']="admin";
	})
</script>
</body>
</html>