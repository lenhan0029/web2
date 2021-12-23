<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$price = $_POST['price'];
$namepr=$_POST['namepr'];
$brand = $_POST['brand'];
$size35 = $_POST['size1'];
$size36 = $_POST['size2'];
$size37 = $_POST['size3'];
$size38 = $_POST['size4'];
$size39 = $_POST['size5'];
$size40 = $_POST['size6'];
$size41 = $_POST['size7'];
$size42 = $_POST['size8'];
$size43 = $_POST['size9'];
//$counting_buy = $_POST['counting_buy'];

// echo $title . $author . $price . $casebook . $qty . $img;

if (isset($_FILES['img'])) {
    $img = $_FILES['img'];
    if ($img['error'] == 0) {
        move_uploaded_file($img['tmp_name'], '../../PHP/public/img/product/' . $img['name']);
        $imgSrc = $img['name'];
        $rs = getAll()->fetch_assoc();
            if($rs['namepr']==$namepr && $rs['idbr']==$brand && $rs['price']==$price && $rs['image']==$imgSrc){
                if($size35 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],1)->num_rows;
                    if($check != 0){
                    
                    $sql = "UPDATE sizeshoe SET qty=$size35 WHERE idsize=1 AND idpr='". $idpr['idpr']. "'";
                    $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ('$idpr[idpr]',1,$size35)";
                    }
                }
                echo "2";
            }else if($rs['namepr']==$namepr){
                echo "3";
            }else{
                $sql = "INSERT INTO product(idpr,namepr,idbr,price,image,counting_buy) VALUES (NULL,'$namepr','$brand','$price','$imgSrc',0)";
                $conn->query($sql);
                $idpr=getidprbyname($namepr)->fetch_assoc();
                if($size35 != ""){
                    $check=getProductBySize($idpr['idpr'],1)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size35 WHERE idsize=1 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],1,$size35)";
                        $conn->query($sql);
                    }
                }
                if($size36 != ""){
                    $check=getProductBySize($idpr['idpr'],2)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size36 WHERE idsize=2 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],2,$size36)";
                        $conn->query($sql);
                    }
                }
                if($size37 != ""){
                    $check=getProductBySize($idpr['idpr'],3)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size37 WHERE idsize=3 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],3,$size37)";
                        $conn->query($sql);
                    }
                }
                if($size38 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],4)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size38 WHERE idsize=4 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],4,$size38)";
                        $conn->query($sql);
                    }
                }
                if($size39 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],5)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size39 WHERE idsize=5 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],5,$size39)";
                        $conn->query($sql);
                    }
                }
                if($size40 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],6)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size40 WHERE idsize=6 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],6,$size40)";
                        $conn->query($sql);
                    }
                }
                if($size41 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],7)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size41 WHERE idsize=7 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],7,$size41)";
                        $conn->query($sql);
                    }
                }
                if($size42 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],8)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size42 WHERE idsize=8 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],8,$size42)";
                        $conn->query($sql);
                    }
                }
                if($size43 != ""){
                    $idpr=getidprbyname($namepr)->fetch_assoc();
                    $check=getProductBySize($idpr['idpr'],9)->num_rows;
                    if($check != 0){
                        $sql = "UPDATE sizeshoe SET qty=$size43 WHERE idsize=9 AND idpr='". $idpr['idpr']. "'";
                        $conn->query($sql);
                    }else{
                        $sql = "INSERT INTO sizeshoe(idpr,idsize,qty) VALUES ($idpr[idpr],9,$size43)";
                        $conn->query($sql);
                    }
                }
                echo "1";
            }
        
    } else {
        echo "1";
    }
}


//header('location:' . $_SERVER['HTTP_REFERER']);
