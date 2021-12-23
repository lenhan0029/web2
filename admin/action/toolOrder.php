<?php
    require("../../PHP/database.php");
    require("../../PHP/code.php");
    $mindate=$_GET['min'];
    $maxdate=$_GET['max'];
    // $status = $_GET['status'];
    $sql="SELECT * FROM orders";
    // if($status == 0){
    //     if($mindate!="" && $maxdate!=""){
    //         $sql.=" WHERE datetime BETWEEN '$mindate' AND '$maxdate'";
    //     }
    //     else if ($mindate!=""){
    //         $sql.=" WHERE datetime > '$mindate'";
    //     }
    //     else $sql.=" WHERE datetime < '$mindate'";
    // }else if($status == 1){
    //     if($mindate!="" && $maxdate!=""){
    //         $sql.=" WHERE datetime BETWEEN '$mindate' AND '$maxdate' AND delivery=1";
    //     }
    //     else if ($mindate!=""){
    //         $sql.=" WHERE datetime > '$mindate' AND delivery=1";
    //     }
    //     else $sql.=" WHERE datetime < '$mindate' AND delivery=1";
    // }else{
    //     if($mindate!="" && $maxdate!=""){
    //         $sql.=" WHERE datetime BETWEEN '$mindate' AND '$maxdate' AND delivery=0";
    //     }
    //     else if ($mindate!=""){
    //         $sql.=" WHERE datetime > '$mindate' AND delivery=0";
    //     }
    //     else $sql.=" WHERE datetime < '$mindate' AND delivery=0";
    // }
    if($mindate!="" && $maxdate!=""){
        $sql.=" WHERE datetime BETWEEN '$mindate' AND '$maxdate'";
    }
    else if ($mindate!=""){
        $sql.=" WHERE datetime > '$mindate'";
    }
    else $sql.=" WHERE datetime < '$mindate'";
    $result = $conn->query($sql);
?>
<?php 
            $dem=0;
            while ($row = $result->fetch_assoc()) {
                $user = getUserByIdUser($row['idUser'])->fetch_assoc();
                ?>
            <tr >
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $user['username']  ?></td>
                <td><?php echo $row['datetime'] ?></td>
                <td>
                
                <?php
                if($row['delivery']!=1) : ?> 
                    <div class="box order-row" data-id="<?=$row['id']?>" data-index="<?=$dem?>">
                        <div class="circle left"> </div>
                    </div>
                <?php else : ?> <div class="box">
                    <div class="circle"></div>
                    </div>
                <?php endif; ?>

                </td>
                <td>
                    <div class="table-data-feature">
                        <button style="margin:2px;" type="button" class="item" data-toggle="modal" data-target="#moreOrder" onclick="moreOrder(<?php echo $row['id'] ?>,<?php echo $row['idUser'] ?>)">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php 
            $dem++;
        }
        ?>
        <div class="card">
        <div id="pagination">
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <?php 
                    $result = getOrderNoNumpage();
                    $numpage = ceil($result->num_rows / 7);
                    if ($numpage != 1)
                        for ($i = 1; $i <= $numpage; $i++) {
                            $pos = ($i - 1) * 7;
                            ?>
                    <li class="page-item <?php if ($i == 1) echo "active" ?>"><button class="page-link" type="button" onclick="getOrder(<?php echo $pos ?>,<?php echo $i ?>)"><?php echo $i ?></button></li>
                    <?php 
                } ?>