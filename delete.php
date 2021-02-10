<?php
include('connect.php');
$sql = "delete from users WHERE id=:id";
$query = $db->prepare($sql);
$query->bindParam(':id',$_REQUEST['delete_id'], PDO::PARAM_STR);
$query->execute();
header("location:index.php");
?>