<?php 
require "../../PHP/database.php";
require "../../PHP/code.php";
// echo $_GET['id'];
$id = $_GET['id'];
$result = getProductById($id)->fetch_assoc();
?>
<input type="text" hidden name="id" value="<?php echo $id ?>">

<div class="form-group">
    <label for="img" class=" form-control-label">Hình ảnh</label>
    <input type="file" name="img" id="file" />
    <img style="display:block;margin:auto" src="../../PHP/public/img/product/ <?php echo $result['image'] ?>" alt=""> 
</div>
<div class="form-group">
    <label for="title" class=" form-control-label">Tên sản phẩm</label>
    <input value="<?php echo $result['namepr'] ?>" type="text" name="namepr" id="namepr" placeholder="Mời Tựa đề" class="form-control">
</div>
<div class="form-group">
    <label for="price" class=" form-control-label">Giá sản phẩm</label>
    <input value="<?php echo $result['price'] ?>" type="number" name="price" id="price" placeholder="Mời nhập Giá" class="form-control">
</div>
<div class="form-group">
    <label for="brand" class=" form-control-label">Danh mục</label>
    <select name="idbr" id="idbr" class="form-control">
        <?php 
        $danhmuc = getBrand();
        while ($row = $danhmuc->fetch_assoc()) {
            ?>
        <option <?php if ($result['idbr'] == $row['idbr']) {
                    echo "selected";
                } ?> value="<?php echo $row['idbr'] ?>"><?php echo $row['namebr'] ?></option>
        <?php 
    } ?>
    </select>
</div>
<div class="modal-footer">
    <button type="button" class="item" data-dismiss="modal">Hủy</button>
    <button type="button" class="item" id="btnChinhSua" onclick="updateProductInDatabase()">Chỉnh sửa</button>
</div> 