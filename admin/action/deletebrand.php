<?php 
require "../../PHP/database.php";
$id = $_POST['brand'];
//$brand= isset($_POST['brand']) ? mysqli_escape_string($conn,$_POST['brand']) : false;
$sql = "DELETE FROM brand WHERE idbr='$id'";
$conn->query($sql);
echo "1";
?>