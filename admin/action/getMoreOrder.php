<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";

$id = $_GET['id'];
$idUser = $_GET['idUser'];
$result1 = getInformationOrder($id);
$result2 = getInformationOrderDiscounting($id);
if($result1->num_rows != 0){
    $result = $result1;
}else{
    $result = $result2;
}
$order = getOrderById($id)->fetch_assoc();
$tong = 0;
?>
<p>Ngày đặt: <?php echo $order['datetime'] ?></p>
<p>Xử lý: <?php if ($order['delivery']) echo "Đã xử lý";
            else echo "Chưa xử lý" ?></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) {
            $product = getProductById($row['idpr'])->fetch_assoc();
            $tong += $product['price'] * $row['qty'];
            ?>
        <tr>
            <td><?php echo $product['idpr'] ?></td>
            <td><img style="width:100px;height:160px" src="../../PHP/public/img/product/<?php echo $product['image'] ?>" alt=""></td>
            <td><?php echo $product['namepr'] ?></td>
            <td><?php echo number_format($product['price']) ?>VND</td>
            <td><?php echo $row['qty'] ?></td>
        </tr>
        <?php 
    } ?>
        <tr>
            <td colspan="5">Tổng tiển: <?php echo number_format($tong);  ?>VND</td>
        </tr>
    </tbody>
</table> 