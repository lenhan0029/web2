<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
$search = $_GET['search'];
$tmp_brand = "";
$numpage = $_GET['numpage'];

if ($brand =="") $tmp_search = "";
else {
    $tmp_search = $search;
}

$sql = "SELECT * FROM product";

if ($tmp_brand != "")
    $sql .= " WHERE namepr='$tmp_search'";
 $sql .= " LIMIT $numpage,7";
// echo $sql;
$result = $conn->query($sql);
?>
<?php 
// $result = getAllProduct(0);
while ($row = $result->fetch_assoc()) {
    ?>
<tr id="tr<?php echo $row['idpr'] ?>">
<td><input type="checkbox" value="<?php echo $row['idpr']?>"></input></td>
    <td><?php echo $row['idpr'] ?></td>
    <td><img src="../public/<?php echo $row['image'] ?>" alt=""></td>
    <td><?php echo $row['namepr'] ?></td>
    <td><?php $result1= findBrandbyId($row['idbr']);
                        $row1=$result1->fetch_assoc();
                        echo $row1['namebr'];
                    ?></td>
    <td><?php echo number_format($row['price']) ?>VND</td>
    <td><?php echo $row['counting_buy'] ?></td>
    <td>
        <div class="table-data-feature">
            <button onclick="updateProduct(<?php echo $row['idpr'] ?>)" style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#updateProduct">
                <i class="zmdi zmdi-edit"></i>
            </button>
            <button style="margin:2px;" class="btn btn-secondary  mb-1" data-toggle="tooltip" data-placement="top" onclick="deleteProduct(<?php echo $row['idpr'] ?>)" title="Delete">
                <i class="zmdi zmdi-delete"></i>
            </button>
            <button style="margin:2px;" type="button" class="btn btn-secondary  mb-1" data-toggle="modal" data-target="#moreProduct" onclick="moreProduct(<?php echo $row['idpr'] ?>)">
                <i class="zmdi zmdi-more"></i>
            </button>
        </div>
    </td>
    </t r>
    <?php 
}
?> 