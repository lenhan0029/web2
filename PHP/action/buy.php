<?php
$giamgia = 20000;
require "../database.php";
require "../code.php";
session_start();
// print_r($_POST['checkout']);

// tạo 1 
$total = 0;
$total_discounting = 0;
$temp = 0;
$discounting_today = getDiscountingToday()->fetch_assoc();
foreach ($_SESSION['cart'] as $value) {
    $total += $value['price'] * $value['qty'];
    $percent = 0;
    if (checkProductIsDiscounting($value['idpr'])) $percent = $discounting_today['percent']; // kiểm tra sản phẩm có giảm giá hay không
    $total_discounting +=  $value['price'] * $value['qty'] * $percent / 100;
}

if (isset($_SESSION['idUser'])) {
    $sql = "INSERT INTO orders (idUser,delivery,total,total_discounting) VALUES ('{$_SESSION['idUser']}','0','$total','$total_discounting')";
    $conn->query($sql);
    // echo "$sql";
    $last_id = $conn->insert_id;
    foreach ($_SESSION['cart'] as $value) {
        $quantity = getqty($value['idpr'],$value['idsize'])->fetch_assoc();
        $realqty = $quantity['qty'] - $value['qty'];
        $sql1 = "UPDATE sizeshoe SET qty='" . $realqty . "' WHERE idpr=" . $value['idpr'] . " AND idsize=" . $value['idsize'];
        $conn->query($sql1);
        $counting_buy = getProductById($value['idpr'])->fetch_assoc();
        $real_counting_buy = $counting_buy['counting_buy'] + $value['qty'];
        $sql2 = "UPDATE product SET counting_buy='" . $real_counting_buy . "' WHERE idpr=" . $value['idpr'];
        $conn->query($sql2);
        //     print_r($value['qty']);
        // if ($value['discounting'])
        //     $temp = $giamgia;
        // else $temp = 0;
        if (!checkProductIsDiscounting($value['idpr']))
            $sql = "INSERT INTO informationorder(idPackage, idpr, idsize, qty,price) VALUES ('$last_id','{$value['idpr']}','{$value['idsize']}','{$value['qty']}','{$value['price']}')";
        else
            $sql = "INSERT INTO informationorder_discounting(idOrder,idDiscounting,idpr,idsize,price,qty) VALUES ('$last_id','{$discounting_today['id']}','{$value['idpr']}','{$value['idsize']}',{$value['price']},'{$value['qty']}')";
        // echo $sql;
        $conn->query($sql);
        unset($_SESSION['cart'][$value['idpr'] . $value['idsize']]);
        //     //echo $key . " " . $value['qty'] . "<br>"; 
        //     // echo "<pre>";
        //     // print_r($value);
    }
    echo "1";
} else {
    echo "0";
}
