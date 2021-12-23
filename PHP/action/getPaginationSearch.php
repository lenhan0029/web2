<?php 
require "../code.php";
require "../database.php";
$namepr = $_POST['namepr'];
$brand = $_POST['brand'];
$pricefrom = $_POST['pricefrom'];
$priceto = $_POST['priceto'];
$numpage = $_POST['numpage'];
$filter = array(
    'namepr' => isset($_POST['namepr']) ? mysqli_escape_string($conn,$_POST['namepr']) : false,
   // 'brand' => isset($_POST['brand']) ? mysqli_escape_string($conn,$_POST['brand']) : false,
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
    $sql .= " WHERE brand.idbr=product.idbr AND product.idpr=sizeshoe.idpr AND idsize=1 AND " . implode(" AND ", $where);
}
$result = $conn->query($sql) or die($conn->error);
$num = ceil($result->num_rows / max_page);
for ($i = 1; $i <= $num; $i++) {
    $pos = ($i - 1) * max_page;
    ?>
<li id="li<?php echo $pos ?>" <?php if ($pos == $numpage) echo "class='active'" ?>><a style="cursor:pointer" onclick="getSearch(<?php echo $pos ?>)"><?php echo $i ?></a></li>
<?php 
}  ?> 