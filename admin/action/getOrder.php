<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$numpage = $_GET['numpage'];
?>
<?php 
$result = getOrder($numpage);
while ($row = $result->fetch_assoc()) {
    $user = getUserByIdUser($row['idUser'])->fetch_assoc();
    ?>
<tr>
<td><?php echo $row['id'] ?></td>
                <td><?php echo $user['username']  ?></td>
                <td><?php echo $row['datetime'] ?></td>
                <td><div class="box" onclick="processOrder($row['id'])"> 
	                    <div class="circle"> 
                        </div>
                    </div>
        </td>
    <td>
        <div class="table-data-feature">
            <!-- <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['id'] ?>)">
                <i class="zmdi zmdi-edit"></i>
            </button> -->
            <!-- <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['id'] ?>)">
                <i class="zmdi zmdi-delete"></i>
            </button> -->
            <button style="margin:2px;" type="button" class="team" data-toggle="modal" data-target="#moreOrder" onclick="moreOrder(<?php echo $row['id'] ?>,<?php echo $row['idUser'] ?>)">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
</tr>
<?php 
}
?> 