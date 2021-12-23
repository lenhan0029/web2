<?php
require "../database.php";
require "../code.php";
session_start();


$idProduct = $_POST['id'];
$idsize = $_POST['size'];

$newProduct = getProductBySize($idProduct,$idsize)->fetch_assoc();
// if so luong san pham khong vuot qua thi add no vao thang session
//else
if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
    $_SESSION['cart']["$idProduct"."$idsize"] = $newProduct;
    $_SESSION['cart']["$idProduct"."$idsize"]['price']= $newProduct['price'];
    $_SESSION['cart']["$idProduct"."$idsize"]['idpr']= $newProduct['idpr'];
    $_SESSION['cart']["$idProduct"."$idsize"]['qty'] = 1;
    $_SESSION['cart']["$idProduct"."$idsize"]['size'] = 1;
} else {
    if (array_key_exists($idProduct,$_SESSION['cart']) && array_key_exists($idsize,$_SESSION['cart'])) {
        $_SESSION['cart']["$idProduct"."$idsize"]['qty'] += 1;
        //$_SESSION['cart'][$idProduct][$idsize]['size'] += $idsize;
    } else {
        $_SESSION['cart']["$idProduct"."$idsize"] = $newProduct;
        $_SESSION['cart']["$idProduct"."$idsize"]['qty']= $newProduct['price'];
        $_SESSION['cart']["$idProduct"."$idsize"]['idpr']= $newProduct['idpr'];
        $_SESSION['cart']["$idProduct"."$idsize"]['qty'] = 1;
        $_SESSION['cart']["$idProduct"."$idsize"]['size'] = 1;
    }
}
// session_close();

echo "cuong";
