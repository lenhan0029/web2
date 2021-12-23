<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$id = $_POST['id'];
$checkio = getProducio($id)->num_rows;
$checkiod = getProduciod($id)->num_rows;
$checkpd = getProductpd($id)->num_rows;
if($checkio == 0 && $checkiod == 0 && $checkpd == 0){
$sql = "DELETE FROM sizeshoe WHERE idpr = '$id'";
$conn->query($sql);
$sql1="DELETE FROM product WHERE idpr = '$id'";
$conn->query($sql1);
echo "1";
}else{
    echo "0";
}
?>
 