<div class="table-data__tool">
    
    <div class="table-data__tool-right">
        <input id ="search-order-min-date-created"type="date"></input>
        <span>-</span>
        <input id="search-order-max-date-created"type="date"></input>
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" id="ToolOrder">
            Lọc
        </button>
        <!-- nhan -->
        <!-- <select name="status" id="status">
            <option value="0" selected>Tình trạng</option>
            <option value="1">đã xử lý</option>
            <option value="2">chưa xử lý</option>
        </select> -->
    </div>
</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên tài khoản</th>
                <th>Ngày đặt</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_order">
            <?php 
            $result = getOrder(0);
            $dem=0;
            while ($row = $result->fetch_assoc()) {
                $user = getUserByIdUser($row['idUser'])->fetch_assoc();
                ?>
            <tr >
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $user['username']  ?></td>
                <td><?php echo $row['datetime'] ?></td>
                <td>
                
                <?php
                if($row['delivery']!=1) : ?> 
                    <div class="box order-row" data-id="<?=$row['id']?>" data-index="<?=$dem?>">
                        <div class="circle left"> </div>
                    </div>
                <?php else : ?> <div class="box">
                    <div class="circle"></div>
                    </div>
                <?php endif; ?>

                </td>
                <td>
                    <div class="table-data-feature">
                        <!-- <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['id'] ?>)">
                            <i class="zmdi zmdi-edit"></i>
                        </button> -->
                        <!-- <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['id'] ?>)">
                            <i class="zmdi zmdi-delete"></i> -->
                        <!-- </button> -->
                        <button style="margin:2px;" type="button" class="item" data-toggle="modal" data-target="#moreOrder" onclick="moreOrder(<?php echo $row['id'] ?>,<?php echo $row['idUser'] ?>)">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php 
            $dem++;
        }
        ?>
        </tbody>
    </table>
    <div class="card">
        <div id="pagination">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php 
                    $result = getOrderNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    if ($numpage != 1)
                        for ($i = 1; $i <= $numpage; $i++) {
                            $pos = ($i - 1) * 7;
                            ?>
                    <li class="page-item <?php if ($i == 1) echo "active" ?>"><button class="page-link" type="button" onclick="getOrder(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button></li>
                    <?php 
                } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>