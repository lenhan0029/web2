<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$sql = 'SELECT namebr,MAX(idbr) FROM brand';
$result = $conn->query($sql);
$id = $result->fetch_assoc();
// $row = findBrandbyId($id['MAX(id)'])->fetch_assoc();
?>
    <td><?php echo $id['idbr'] ?></td>
    <td><?php echo $id['namebr'] ?></td>
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