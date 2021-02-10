<?php
if(isset($_POST['btnadd']))
{
    $first_name  = $_POST['txtFname'];
    $last_name   = $_POST['txtLname'];
    $address     = $_POST['txtAddress'];
    $email       = $_POST['txtEmail'];
    $mobile      = $_POST['txtMobile'];

    include('connect.php');
	
	$sql="insert into users (first_name,last_name,address,email,mobile) values(:first_name,:last_name,:address,:email,:mobile)";
	$query = $db->prepare($sql);
	$query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
	$query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
	$query->bindParam(':address',$address,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $db->lastInsertId();
    header('location:index.php');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<div class="row" style="margin-bottom:10px;">
			<div class="col-lg-10"></div>
			<div class="col-lg-2"><a href="index.php" class="btn btn-primary">Back</a></div>
		</div>
		<form method="post" name="frmAdd">
		  <div class="form-group">
			<label for="txtFname">First Name:</label>
			<input type="text" class="form-control" name="txtFname" required  id="txtFname">
		  </div>
		  <div class="form-group">
			<label for="txtLname">Last Name:</label>
			<input type="text" class="form-control" required name="txtLname" id="txtLname">
		  </div>
		   <div class="form-group">
			<label for="txtEmail">Email:</label>
			<input type="email" class="form-control" required name="txtEmail" id="txtEmail">
		  </div>
		  <div class="form-group">
			<label for="txtMobile">Mobile:</label>
			<input type="text" class="form-control" required name="txtMobile" id="txtMobile">
		  </div>
		  <div class="form-group">
			<label for="txtAddress">Address:</label>
			<textarea name="txtAddress" class="form-control" required id="txtAddress"></textarea>
		  </div>
		  <button type="submit" class="btn btn-success" name="btnadd">Add</button>
		</form>
	</div>
</body>
</html>