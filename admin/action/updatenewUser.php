<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$sql = 'SELECT MAX(id) FROM users';
$result = $conn->query($sql);
$id = $result->fetch_assoc();
$row = getUserByIdUser($id['MAX(id)'])->fetch_assoc();
?>
<tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo md5($row['password']) ?></td>
                <td>
                    <?php 
                    if ($row['admin'] == 1) echo '<span class="role admin">admin</span>';
                    else
                        echo '<span class="role member">member</span>';
                    ?>
                </td>
                <td>
                    <div class="table-data-feature">
                        <?php
                            if ($row['admin'] == 1) echo '<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" id="EditUser">
                            <i class="zmdi zmdi-edit"></i>
                        </button>';

                        ?>
                            <button onclick="moreUser(<?php echo $row['id'] ?>)" class="item" data-placement="top" title="More" data-toggle="modal" data-target="#moreUser">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>