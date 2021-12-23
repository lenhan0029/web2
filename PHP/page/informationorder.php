<?php
require "component/public/bradcaump.php";
$idPackage = $_GET['id'];
$idUser = $_SESSION['idUser'];
$sql = "SELECT * FROM informationorder WHERE idPackage = '$idPackage'"; //lấy chi tiết sp đơn hàng
$result = $conn->query($sql);
$total = 0;
$order = getOrderById($idPackage)->fetch_assoc(); // lấy thông tin đơn hàng 
?>


<table class="table table-bordered" style="width:80%;margin:5px auto">
    <tr class="table-info">
        <th>id Sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>size</th>
        <th>Số lượng</th>
        <th>Giảm Giá</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        $info = getProductById($row['idpr'])->fetch_assoc();
        $total += $info['price'] * $row['qty'];
        ?>

        <tr>
            <td><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $row['idpr'] ?></a></td>
            <td><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $info['namepr'] ?></a></td>
            <td><a href="?page=product&id=<?php echo $row['idpr'] ?>"><img style="width:100px;height:140px" src="public/img/product/<?php echo $info['image'] ?>" alt=""></a></td>
            <td><?php echo number_format($info['price']) ?>VND</td>
            <td><?php $size = getSizebyid($row['idsize'])->fetch_assoc(); echo $size['size'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td>Không có giảm giá</td>
        </tr>

    <?php
} ?>
    <?php
    $result1 = getdiscountingInformationOrder($idPackage);
    while ($row = $result1->fetch_assoc()) {
        $info = getProductById($row['idpr'])->fetch_assoc();
        $discounting = getDiscountingById($row['idDiscounting'])->fetch_assoc();
        ?>
        <tr>
            <td><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $row['idpr'] ?></a></td>
            <td><a href="?page=product&id=<?php echo $orw['idpr'] ?>"><?php echo $info['namepr'] ?></a></td>
            <td><a href="?page=product&id=<?php echo $row['idpr'] ?>"><img style="width:100px;height:140px" src="public/img/product/<?php echo $info['image'] ?>" alt=""></a></td>
            <td><?php echo number_format($row['price']) ?>VND</td>
            <td><?php $size = getSizebyid($row['idsize'])->fetch_assoc(); echo $size['size'] ?></td>
            <td><?php echo $row['qty'] ?></td>
            <td><?php echo $discounting['title'] ?>(<?php echo $discounting['percent'] ?>%)</td>
        </tr>

    <?php } ?>

    <tr>
        <td colspan="6" style="overflow:hidden"><a style="float:left" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Trở lại</a><a style="float:right">Tổng cộng:<?php echo number_format($order['total'] - $order['total_discounting']) ?>VND</a> </td>
    </tr>
</table>