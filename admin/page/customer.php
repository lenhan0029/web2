<div class="table-data__tool">
    <div class="table-data__tool-right">
    <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addnewUser">
            Thêm tài khoản
        </button>
    </div>
</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên tài khoản</th>
                <th>Password</th>
                <th>Vai trò</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_product">
            <?php 
            $result = getAllUser(0);
            while ($row = $result->fetch_assoc()) {
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
                            <button onclick="moreUser(<?php echo $row['id'] ?>)" class="item" data-placement="top" title="More" data-toggle="modal" data-target="#moreUser">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php 
        }
        ?>
        </tbody>
    </table>
    <div class="card">
        <div id="pagination">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php 
                    $result =  getAllUserNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    for ($i = 1; $i <= $numpage; $i++) {
                        $pos = ($i - 1) * 7;
                        ?>
                    <li class="page-item <?php if ($i == 1) echo "active" ?>">
                        <button class="page-link" type="button" onclick="getUser(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button>
                    </li>
                    <?php 
                } ?>
                </ul>
            </nav>
        </div>
    </div>