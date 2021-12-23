<?php
require "../../database.php";
require "../../code.php";
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$casebook = $_POST['casebook'];
$qty = $_POST['qty'];

// echo $title . $author . $price . $casebook . $qty . $img;
if (isset($_FILES['img'])) {
    $img = $_FILES['img'];
    if ($img['error'] == 0) {
        move_uploaded_file($img['tmp_name'], '../../public/img/product/' . $img['name']);
        $imgSrc = 'img/product/' . $img['name'];
        $sql = "INSERT INTO products(img,title,author,casebook,price,amount,love,count_buying) VALUES ('$imgSrc','$title','$author','$casebook','$price','$qty','0,','0')";
        $conn->query($sql);
        echo "1";
    } else {
        echo var_dump($img);
    }
}

//header('location:' . $_SERVER['HTTP_REFERER']);
