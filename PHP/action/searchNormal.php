<?php
require "../database.php";
require "../code.php";
$namepr = $_POST['namepr'];
// $numpage = $_POST['numpage'];
$numpage = 0;
$filter = array(
    'namepr' => isset($_POST['namepr']) ? mysqli_escape_string($conn,$_POST['namepr']) : false
);

$where = array();


if ($filter['namepr']) {
    $where[] = "namepr LIKE '%{$filter['namepr']}%'";
}

$sql = "SELECT * FROM brand,product,sizeshoe";

if ($where) {
    $sql .= " WHERE brand.idbr=product.idbr AND product.idpr=sizeshoe.idpr AND idsize=1 AND " . implode(" AND ", $where) . " LIMIT $numpage,12";
}
$result = $conn->query($sql) or die($conn->error);
while ($row = $result->fetch_assoc()) { ?>
    <!-- Start Single Product -->
    <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12" style="float: left;">
        <div class="product__thumb">
            <a class="first__img" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
            <a class="second__img animation1" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
            <!-- <?php if (checkProductIsDiscounting($row['idpr']) != null) { ?>
                <div class="hot__box">
                    Đang giảm giá <?php $discounting = getDiscountingToday()->fetch_assoc();
                                    echo $discounting['percent'] . "%" ?>
                </div>
            <?php } ?> -->
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