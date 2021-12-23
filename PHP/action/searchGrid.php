<?php
require "../database.php";
require "../code.php";
$namepr = $_POST['namepr'];
$brand = $_POST['brand'];
$pricefrom = $_POST['pricefrom'];
$priceto = $_POST['priceto'];
// $giamgia = $_POST['giamgia'];
$numpage = $_POST['numpage'];

$filter = array(
    'namepr' => isset($_POST['namepr']) ? mysqli_escape_string($conn,$_POST['namepr']) : false,
//    'brand' => isset($_POST['brand']) ? mysqli_escape_string($conn,$_POST['brand']) : false,
    'pricefrom' => isset($_POST['pricefrom']) ? mysqli_escape_string($conn,$_POST['pricefrom']) : false,
    'priceto' => isset($_POST['priceto']) ? mysqli_escape_string($conn,$_POST['priceto']) : false,
);

$where = array();


if ($filter['namepr']) {
    $where[] = "namepr LIKE '%{$filter['namepr']}%'";
}

if ($brand !="") {
    $where[] = "namebr='$brand'";
}

if ($filter['pricefrom']) {
    $where[] = "price >= '{$filter['pricefrom']}'";
}

if ($filter['priceto']) {
    $where[] = "price <= '{$filter['priceto']}'";
}
// if($giamgia != ""){
//     $where[] = "product.idpr=products_discounting.idpr AND products_discounting.idDiscounting=discounting.id";
// }
$sql = "SELECT * FROM brand,product,sizeshoe";

if ($where) {
    $sql .= " WHERE brand.idbr=product.idbr AND product.idpr=sizeshoe.idpr AND idsize=1 AND " . implode(" AND ", $where) . " LIMIT $numpage,12";
}
$result = $conn->query($sql) or die($conn->error);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Start Single Product -->
    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="product__thumb">
            <a class="first__img" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
            <a class="second__img animation1" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
            <!-- <?php //if (checkProductIsDiscounting($row['idpr']) != 0) { ?>
                <div class="hot__box">
                    Đang giảm giá <?php //$discounting = getDiscountingToday()->fetch_assoc();
                                    //echo $discounting['percent'] . "%" ?>
                </div>
            <?php //} ?> -->
        </div>
        <div class="product__content content--center content--center">
            <h4><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $row['namepr'] ?></a></h4>
            <ul class="prize d-flex">
                <li><?php echo number_format($row['price']) ?> VNĐ</li>
            </ul>
            <div class="action">
                <div class="actions_inner">
                    <ul class="add_to_links">
                        <li><a style="cursor:pointer" class="wishlist" onclick="add_to_cart(<?php echo $row['idpr'] ?>,1)"><i class="bi bi-shopping-cart-full"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="product__hover--content">
            </div>
        </div>
    </div>
    <!-- End Single Product -->
<?php
} ?>