<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$brand = $_GET['brand'];
$sort = $_GET['sort'];
$tmp_brand = "";
$tmp_sort = "";

if ($brand == -1) $tmp_brand = "";
else {
    $tmp_brand = $brand;
}

if ($sort == -1) $tmp_sort = "";
elseif ($sort == 0) $tmp_sort = "ORDER BY price DESC";
elseif ($sort == 1) $tmp_sort = "ORDER BY price ASC";
$sql = "SELECT *,SUM(qty) AS 'totalamount' FROM product,sizeshoe";

if ($tmp_brand != ""){
    $sql .= " WHERE product.idpr=sizeshoe.idpr AND idbr='$tmp_brand' GROUP BY sizeshoe.idpr";
}else{
    $sql .= " WHERE product.idpr=sizeshoe.idpr GROUP BY sizeshoe.idpr";
}
if ($sort != "")
    $sql .= " $tmp_sort";
 $result = $conn->query($sql);
?>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php 
        //$result = getAllProductNoNumpage();
        $numpage = ceil($result->num_rows / 7);
        for ($i = 1; $i <= $numpage; $i++) {
            $pos = ($i - 1) * 7;
            ?>
        <li class="page-item <?php if ($i == 1) echo "active" ?>">
            <button class="page-link" type="button" onclick="getToolProductByNumpage(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button>
        </li>
        <?php 
    } ?>
    </ul>
</nav> 