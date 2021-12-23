<?php 

require "../../PHP/database.php";
require "../../PHP/code.php";
$idpr = $_POST['id'];
$namepr = $_POST['namepr'];
$brand = $_POST['idbr'];
$price = $_POST['price'];
// $counting_buy = $_POST['counting_buy'];

// echo $title . $author . $price . $casebook . $qty . $img;


if(isset($_FILES['img'])){
    $img = $_FILES['img'];
    // echo var_dump($img);
    if($img['error']==0){
        move_uploaded_file($img['tmp_name'],'../../PHP/public/img/product/'.$img['name']);
        $imgSrc = $img['name'];
        $sql = "UPDATE product SET image ='$imgSrc',namepr = '$namepr',price='$price',idbr='$brand' WHERE idpr ='$idpr' ";
        $conn->query($sql);
        echo "1";
    }else{
        echo "0"; // lỗi không ảnh
    }
}else{
    $sql = "UPDATE product SET namepr = '$namepr',price='$price',idbr='$brand' WHERE idpr ='$idpr'";
    $conn->query($sql);
    echo "1";// lỗi không ảnh
}
 