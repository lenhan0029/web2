<?php
require "../../database.php";
require "../../code.php";

$id = $_GET['id'];
$result = getInformationOrder($id);
$order = getOrderById($id)->fetch_assoc();
$order = getOrderById($id)->fetch_assoc();
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
            <th scope="col">Giảm giá</th>
            <th scope="col">Số lượng</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) {
            $product = getProductById($row['idProduct'])->fetch_assoc();
            ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><img style="width:100px;height:160px" src="../public/<?php echo $product['img'] ?>" alt=""></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo number_format($row['price']) ?>VND</td>
                <td><?php echo 0 ?>%</td>
                <td><?php echo $row['qty'] ?></td>
            </tr>
        <?php
    } ?>
        <?php
        $result = getdiscountingInformationOrder($id);
        while ($row = $result->fetch_assoc()) {
            $info = getProductById($row['idProduct'])->fetch_assoc();
            $discounting = getDiscountingById($row['idDiscounting'])->fetch_assoc();
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><img src="../public/<?php echo $info['img'] ?>" alt=""></td>
                <td><?php echo $info['title'] ?></td>
                <td><?php echo number_format($row['price']) ?>VND</td>
                <td><?php echo $discounting['percent'] ?>%(<?php echo $discounting['title'] ?>)</td>
                <td><?php echo $row['qty'] ?></td>
            </tr>

        <?php } ?>
        <tr>
            <td colspan="6">Tổng tiển: <?php echo number_format($order['total']);  ?>VND<br>Tổng tiển giảm giá: <?php echo number_format($order['total_discounting']);  ?>VND<br>Thành tiền: <?php echo number_format($order['total'] - $order['total_discounting']) ?>VND</td>
        </tr>
    </tbody>
</table>