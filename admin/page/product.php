<div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="rs-select2--light rs-select2--md" style="width: 200px;">
            <select id="brand" class="js-select2" name="property" onchange="toolProduct()">
                <option value="-1" selected="selected">Thương hiệu</option>
                <?php 
                $danhmuc = getBrand();
                while ($row = $danhmuc->fetch_assoc()) {
                    ?>
                <option value="<?php echo $row['idbr'] ?>"><?php echo $row['namebr'] ?></option>
                <?php 
            } ?>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <div class="rs-select2--light rs-select2--sm" style="width: 200px;">
            <select id="sort" class="js-select2" name="time" onchange="toolProduct()">
                <option value="-1" selected="selected">Chức năng</option>
                <option value="0">Giảm dần theo giá</option>
                <option value="1">Tăng dần theo giá</option>
            </select>
            <div class="dropDownSelect2"></div>
        </div>
        <!-- <button class="au-btn-filter btn-danger" onclick="resettoolproduct();">Xóa</button> -->
    </div>
    <div class="table-data__tool-right">
        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#addNewProduct">
            Thêm sản phẩm
        </button>
    </div>
</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Thương hiệu</th>
                <th>Giá</th>
                <th>Tổng số lượng</th>
                <th>Số lượng đã bán</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody id="table_product">
            <?php 
            $result = getAllProduct(0);
            while ($row = $result->fetch_assoc()) {
                ?>
            <tr id="tr<?php echo $row['idpr'] ?>" class="productlist">
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
        </tbody>
    </table>
    <div class="card">
        <div id="pagination">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php 
                    $result = getAllProductNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    for ($i = 1; $i <= $numpage; $i++) {
                        $pos = ($i - 1) * 7;
                        ?>
                    <li class="page-item <?php if ($i == 1) echo "active" ?>">
                        <button class="page-link" type="button" onclick="getProduct(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button>
                    </li>
                    <?php 
                } ?>
                </ul>
            </nav>
        </div>
    </div>
</div> 