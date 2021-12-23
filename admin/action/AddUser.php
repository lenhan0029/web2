<?php
require "../../PHP/database.php";
require "../../PHP/code.php";
$name = $_POST['name'];
$passwd=$_POST['passwd'];
$email = $_POST['email'];
$sex = $_POST['gender'];

$sql="INSERT INTO users (id, img, username, password, firstname, lastname, email, dob, sex, address, phone_number,admin) 
value(NULL,'img/user/defaultavata.jpg','$name','$passwd','','','$email','','$sex','','','0')";
$conn->query($sql);
echo '1';
?>