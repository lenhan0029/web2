<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$num = $_POST['num'];
?>
<?php 
$result = getAllProduct($num);
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
                        echo $row['totalamount']
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
</tr>
<?php 
}
?> 