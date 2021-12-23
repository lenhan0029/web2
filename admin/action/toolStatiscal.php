<?php
    require("../../PHP/database.php");
    require("../../PHP/code.php");
    $mindate=$_GET['min'];
    $maxdate=$_GET['max'];
    $time = $_GET['time'];
    $group= "GROUP BY idpr";
    $topsp=$_GET['top'];
    $sqltopsp="";
    if($topsp != ""){
        $sqltopsp = "ORDER BY sl DESC LIMIT 0,$topsp";
    }
    $sqltime="";
    $hroup2 = "";
    $sql3="SELECT *,SUM(qty) AS sl FROM orders,informationorder";
    $sql2="SELECT *,SUM(qty) AS sl FROM orders, informationorder_discounting";
    if($time == "0"){
        $sqltime=" WHERE datetime BETWEEN '2021-01-01' AND '2021-03-31'";
    }else if($time == "1"){
        $sqltime=" WHERE datetime BETWEEN '2021-04-01' AND '2021-06-30'";
    }else if($time == "2"){
        $sqltime=" WHERE datetime BETWEEN '2021-07-01' AND '2021-09-30'";
    }else if($time == "3"){
        $sqltime=" WHERE datetime BETWEEN '2021-10-01' AND '2021-12-31'";
    }else{
        if($mindate!="" && $maxdate!=""){
            $sqltime = " WHERE datetime BETWEEN '$mindate' AND '$maxdate'";
        }else if($mindate!=""){
            $sqltime = " WHERE datetime > '$mindate'";
        }else{
            $sqltime = " WHERE datetime < '$mindate'";
        }
    }
    // if($mindate!="" && $maxdate!=""){
    //     $sql3.=" WHERE datetime BETWEEN '$mindate' AND '$maxdate' AND orders.id=informationorder.idPackage $group $sqltopsp";
    //     $sql2.=" WHERE datetime BETWEEN '$mindate' AND '$maxdate' AND orders.id=informationoder_discounting.idOrder $group $sqltopsp";
    // }
    // else if ($mindate!=""){
    //     $sql3.=" WHERE datetime > '$mindate' AND orders.id=informationorder.idPackage $group $tsqlopsp";
    //     $sql2.=" WHERE datetime > '$mindate' AND orders.id=informationoder_discounting.idOrder $group $sqltopsp";
    // }
    // else{ 
    //     $sql3.=" WHERE datetime < '$mindate' AND orders.id=informationorder.idPackage $group $sqltopsp";
    //     $sql2.=" WHERE datetime < '$mindate' AND orders.id=informationoder_discounting.idOrder $group $sqltopsp ";
    // }
    $sql3.="$sqltime AND orders.id=informationorder.idPackage $group $sqltopsp";
    $sql2.="$sqltime AND orders.id=informationoder_discounting.idOrder $group $sqltopsp";
    $result3 = $conn->query($sql3);
    $result2 = $conn->query($sql2);
?>
<?php 
// $result = getAllProduct(0);
if($result3->num_rows != 0){
while ($row = $result3->fetch_assoc()) {
    ?>
<tr id="tr<?php echo $row['idpr'] ?>">
    <td><?php echo $row['idpr'] ?></td>
    <?php $pr=getProductById($row['idpr'])->fetch_assoc()?>
    <td><img src="../PHP/public/img/product/<?php echo $pr['image'] ?>" alt=""></td>
    <td><?php echo $pr['namepr'] ?></td>
    <td><?php $result1= findBrandbyId($pr['idbr']);
                        $row1=$result1->fetch_assoc();
                        echo $row1['namebr'];
                    ?></td>
    <td><?php echo number_format($row['price']) ?>VND</td>
    <td><?php 
        $qty = getallqty($row['idpr'])->fetch_assoc();
        echo $qty['sl'];
    ?></td>
    <td><?php echo $row['sl'] ?></td>
    </tr>
    <?php 
}
}
?> 

