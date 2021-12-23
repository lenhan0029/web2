<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";

$us = getUserByIdUser($_POST['id'])->fetch_assoc();
if($us['admin']==1)
{
    $sql = "UPDATE users SET admin=0 WHERE id='";
        $sql.=$_POST['id'];
        $sql.="'";
        $conn->query($sql);
        echo "0";
}else{
        $sql = "UPDATE users SET admin=1 WHERE id='";
        $sql.=$_POST['id'];
        $sql.="'";
        $conn->query($sql);
    echo "1";
}
