<?php
require "../database.php";
require "../code.php";
$id = $_POST['id'];
$sl = $_POST['quantity'];
$sz = $_POST['size'];
$rs = getProductBySize($id,$sz)->fetch_assoc();
if($rs['qty'] < $sl){
    echo "1";
}else{
echo $sl;
}