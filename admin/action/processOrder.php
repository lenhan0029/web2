<?php 
$id = $_GET['id'];
require "../../PHP/database.php";
$sql = "UPDATE orders SET delivery='1' WHERE id = '$id' ";
$conn->query($sql);

