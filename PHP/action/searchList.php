<?php 
require "../database.php";
$namepr = $_POST['namepr'];
$brand = $_POST['brand'];
$pricefrom = $_POST['pricefrom'];
$priceto = $_POST['priceto'];
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
    $where[] =  "namebr='$brand'";
}

if ($filter['pricefrom']) {
    $where[] = "price >= '{$filter['pricefrom']}'";
}

if ($filter['priceto']) {
    $where[] = "price <= '{$filter['priceto']}'";
}

$sql = "SELECT * FROM brand,product,sizeshoe";

if ($where) {
    $sql .= " WHERE brand.idbr=product.idbr AND product.idpr=sizeshoe.idpr AND idsize=1 AND " . implode(" AND ", $where) . " LIMIT $numpage,12";
}
$result = $conn->query($sql) or die($conn->error);
while ($row = $result->fetch_assoc()) {
    ?>
<!-- Start Single Product -->
<div class="list__view mt--40">
    <div class="thumb">
        <a class="first__img" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product images"></a>
        <a class="second__img animation1" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product images"></a>
    </div>
    <div class="content">
        <h2><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $row['namepr'] ?></a></h2>
        <ul class="rating d-flex">
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li class="on"><i class="fa fa-star-o"></i></li>
            <li><i class="fa fa-star-o"></i></li>
            <li><i class="fa fa-star-o"></i></li>
        </ul>
        <ul class="prize__box">
            <li><?php echo number_format($row['price']) ?> VNĐ</li>

        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
        <ul class="cart__action d-flex">
            <li class="cart"><a style="cursor:pointer" onclick="add_to_cart(<?php echo $row['idpr'] ?>,1)">Add to cart</a></li>
            <li class="wishlist"><a href="cart.html"></a></li>
            <li class="compare"><a href="cart.html"></a></li>
        </ul>
    </div>
</div>
<!-- End Single Product -->
<?php 
} ?> 