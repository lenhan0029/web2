<?php
    require("../../PHP/database.php");
    require("../../PHP/code.php");
    $brand=$_POST['brand'];
    $id=$_POST['id'];
    $sql="UPDATE brand SET namebr='$brand' WHERE idbr='$id'";
    $result=$conn->query($sql);
    $row= getInfoBrand($id)->fetch_assoc();
?>
    <tr>
        <td id="<?php echo $row['idbr'] ?>"><?php echo $row['idbr'] ?></td>
        <td><?php echo $row['namebr'] ?></td>
        <td>
            <div class="table-data-feature">
                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="getBrand(<?php echo $row['idbr']?>)" data-target="#updateBrand">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="zmdi zmdi-delete"></i>
                </button>
            </div>
        </td>
    </tr>
