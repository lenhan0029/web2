<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$sql = 'SELECT MAX(idpr) FROM product';
$result = $conn->query($sql);
$id = $result->fetch_assoc();
$row = getAllInfoProduct($id['MAX(idpr)'])->fetch_assoc();
?>
<tr id="tr<?php echo $row['idpr'] ?>">
    <td><?php echo $row['idpr'] ?></td>
    <td><img src="../PHP/public/img/product/<?php echo $row['image'] ?>" alt=""></td>
    <td><?php echo $row['namepr'] ?></td>
    <td><?php echo $row['idbr'] ?></td>
    <td><?php echo $row['price'] ?></td>
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
            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button class="item" data-toggle="tooltip" onclick="deleteProduct(<?php echo $row['idpr'] ?>)" data-placement="top" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
</tr> 