<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$search = $_GET['search'];
$tmp_search = "";

if ($search == "") $tmp_search = "";
else {
    $tmp_search = $search;
}
$sql = "SELECT * FROM product";

if ($tmp_search != "")
    $sql .= " WHERE namepr='$tmp_search'";
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
            <button class="page-link" type="button" onclick="getToolSearchProductByNumpage(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button>
        </li>
        <?php 
    } ?>
    </ul>
</nav> 