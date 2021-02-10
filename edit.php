<?php
$edit_id = $_REQUEST['edit_id'];
include('connect.php');
$slt="select * from users where id=:id";
$query=$db->prepare($slt);
$query->bindParam(':id',$edit_id,PDO::PARAM_STR);
$query->execute();
$row=$query->fetch(PDO::FETCH_ASSOC);
?>
<?php
if(isset($_POST['btnUpdate']))
{
    $first_name  = $_POST['txtFname'];
    $last_name   = $_POST['txtLname'];
    $address     = $_POST['txtAddress'];
    $email       = $_POST['txtEmail'];
    $mobile      = $_POST['txtMobile'];

    include('connect.php');
    $sql="update users set first_name=:first_name,last_name=:last_name,address=:address,email=:email,mobile=:mobile where id=:id";
	$query = $db->prepare($sql);

	$query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
	$query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
	$query->bindParam(':address',$address,PDO::PARAM_STR);
	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
	$query->bindParam(':id',$edit_id,PDO::PARAM_STR);
	$query->execute();
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
		<form method="post" name="frmUpdate">
		  <div class="form-group">
			<label for="txtFname">First Name:</label>
			<input type="text" class="form-control" name="txtFname" required id="txtFname" value="<?php echo $row['first_name'];?>">
		  </div>
		  <div class="form-group">
			<label for="txtLname">Last Name:</label>
			<input type="text" class="form-control" name="txtLname" required id="txtLname" value="<?php echo $row['last_name'];?>">
		  </div>
		   <div class="form-group">
			<label for="txtEmail">Email:</label>
			<input type="email" class="form-control" name="txtEmail" required id="txtEmail" value="<?php echo $row['email'];?>">
		  </div>
		  <div class="form-group">
			<label for="txtMobile">Mobile:</label>
			<input type="text" class="form-control" name="txtMobile" required id="txtMobile" value="<?php echo $row['mobile'];?>">
		  </div>
		  <div class="form-group">
			<label for="txtAddress">Address:</label>
			<textarea name="txtAddress" class="form-control" required id="txtAddress"><?php echo $row['address'];?></textarea>
		  </div>
		  <button type="submit" class="btn btn-success" value="" name="btnUpdate">Update</button>
		</form>
	</div>
</body>
</html>