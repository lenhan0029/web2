<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$brand = $_GET['brand'];
$sort = $_GET['sort'];
$tmp_brand = "";
$tmp_sort = "";
$numpage = $_GET['numpage'];

if ($brand == -1) $tmp_brand = "";
else {
    $tmp_brand = $brand;
}

if ($sort == -1) $tmp_sort = "";
elseif ($sort == 0) $tmp_sort = "ORDER BY price DESC";
elseif ($sort == 1) $tmp_sort = "ORDER BY price ASC";


$sql = "SELECT *,SUM(qty) AS 'totalamount' FROM product,sizeshoe";

if ($tmp_brand != ""){
    $sql .= " WHERE product.idpr=sizeshoe.idpr AND idbr='$tmp_brand' GROUP BY sizeshoe.idpr";
}else{
    $sql .= " WHERE product.idpr=sizeshoe.idpr GROUP BY sizeshoe.idpr";
}
if ($sort != "")
    $sql .= " $tmp_sort";
 $sql .= " LIMIT $numpage,7";
// echo $sql;
$result = $conn->query($sql);
?>
<?php 
// $result = getAllProduct(0);
while ($row = $result->fetch_assoc()) {
    ?>
<tr id="tr<?php echo $row['idpr'] ?>">
    <td><?php echo $row['idpr'] ?></td>
    <td><img src="../PHP/public/img/product/<?php echo $row['image'] ?>" alt=""></td>
    <td><?php echo $row['namepr'] ?></td>
    <td><?php $result1= findBrandbyId($row['idbr']);
                        $row1=$result1->fetch_assoc();
                        echo $row1['namebr'];
                    ?></td>
    <td><?php echo number_format($row['price']) ?>VND</td>
    <td>
                    <?php
                        // $result1=getSumProduct($row['idpr']);
                        // while($row1 = $result1->fetch_assoc())
                        // echo $row1['soluong'];
                        echo $row['totalamount'];
                    ?>
                </td>
    <td><?php echo $row['counting_buy'] ?></td>
    <td>
        <div class="table-data-feature">
            <button onclick="updateProduct(<?php echo $row['idpr'] ?>)" style="margin:2px;" type="button" class="item" data-toggle="modal" data-target="#updateProduct">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button style="margin:2px;" class="item" data-toggle="tooltip" data-placement="top" onclick="deleteProduct(<?php echo $row['idpr'] ?>)" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button style="margin:2px;" type="button" class="item" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['idpr'] ?>)">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
    </t r>
    <?php 
}
?> 