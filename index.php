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
			<div class="col-lg-2"><a href="add.php" class="btn btn-primary">Add</a></div>
		</div>
		<table class='display dataTable table table-bordered table-striped  no-footer' align="center">
			<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Action</th>
			</tr>
			</thead>
			<?php
			include('connect.php');
			$slt="select * from users";
			$query=$db->prepare($slt);
			$query->execute();
			while($row=$query->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<tr>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['mobile']; ?></td>
					<td><a class="btn btn-primary" href="edit.php?edit_id=<?php echo $row['id'];?>">Edit</a>&nbsp;&nbsp;<a class="btn btn-danger" href="delete.php?delete_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a> </td>
				</tr>
				<?php
			}
			?>
		   
		</table>
	</div>
</body>
</html>