<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$id = $_POST['id'];
$result = getProductById($id);
$row = $result->fetch_assoc();
?>
<img style="margin:auto;display:block;width:200px;height:250px" src="../PHP/public/img/product/<?php echo $row['image'] ?>" alt="">
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mục</th>
            <th scope="col">Thông tin</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Tên sản phẩm</th>
            <td><?php echo $row['namepr'] ?></td>
        </tr>
        <tr>
            <th scope="row">Thương hiệu</th>
            <td><?php $result1= findBrandbyId($row['idbr']);
                        $row1=$result1->fetch_assoc();
                        echo $row1['namebr'];
                    ?></td>
        </tr>
        <tr>
            <th scope="row">Giá</th>
            <td><?php echo number_format($row['price']) ?>VND</td>
        </tr>
        <tr>
            <th scope="row">Tổng số lượng</th>
            <td><?php  $result1=getSumProduct($row['idpr']);
                        while($row1 = $result1->fetch_assoc())
                        echo $row1['soluong']; 
                ?> Đôi
            </td>
        </tr>
        <tr>
            <th scope="row">Số lượng đã bán</th>
            <td><?php echo $row['counting_buy'] ?> Đôi</td>
        </tr>
    </tbody>
</table> 
 <!-- if ($row['discounting'] == 1) echo '<span class="role user">Đang giảm giá</span>'; -->
