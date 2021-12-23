<?php 
session_start();
$_SESSION['cart'][$_POST['id'].$_POST['size']]['qty'] = $_POST['qty'];
$_SESSION['cart'][$_POST['id'].$_POST['size']]['size'] = $_POST['size'];
echo $_POST['id'];
 