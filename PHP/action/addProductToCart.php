<?php
require "../code.php";
require "../database.php";
session_start();
$id = $_GET['id'];
$quantity = $_GET['quantity'];
$size = $_GET['size'];

$newProduct = getProductBySize($id,$size)->fetch_assoc();

if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
    $newProduct['qty'] = $quantity;
    $newProduct['size'] = $size;
    $_SESSION['cart']["$id"."$size"] = $newProduct;
} else {
    if (array_key_exists($id, $_SESSION['cart']) && array_key_exists($size, $_SESSION['cart'])) {
        $_SESSION['cart']["$id"."$size"]['qty'] += $quantity;
        //$_SESSION['cart'][$id][$size]['size'] += "$size +','+";
    } else {
        $newProduct['qty'] = $quantity;
        $newProduct['size'] = $size;
        $_SESSION['cart']["$id"."$size"] = $newProduct;
    }
}
echo "<pre>";
print_r($newProduct);
print_r($_SESSION['cart']);
// session_destroy();
