<?php
require "../../PHP/database.php";
require "../../PHP/code.php";
$idbr=$_POST['idbr'];
$row=getInfoBrand($idbr)->fetch_assoc();
?>
    <div class="table-data__tool-right">
    <input type="text" id="AddBrand" value="<?php echo $row['namebr']?>"></input>
        <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="buttonAddBrand" onclick="UpdateBrand(<?php echo $row['idbr']?>)">
            <i class="zmdi zmdi-plus">Lưu chỉnh sửa</i></button>
    </div>