<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Thêm sản phẩm</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddNewProduct" action="" method="post" class="" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="img" class=" form-control-label">Hình ảnh</label>
                        <input type="file" name="img" id="img" />
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Tên sản phẩm</label>
                        <input type="text" name="namepr" id="namepr" placeholder="Mời nhập tên sản phẩm" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="size" class=" form-control-label" name="Size">Size</label>
                        <?php
                        $size = getSize();
                        while($row1=$size->fetch_assoc()){
                            echo $row1['size'];
                        ?>
                        <input value="<?php echo $row1['idsize']?>" type="checkbox" name="size" onchange="displayqty(<?php echo $row1['idsize']?>)"></input>;
                        <input type="number" name="size<?php echo $row1['idsize']?>" id="size<?php echo $row1['idsize']?>" style="display:none;border: solid #000 1px;width:100px">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Giá sản phẩm</label>
                        <input type="number" name="price" id="price" placeholder="Mời nhập Giá" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class=" form-control-label">Danh mục</label>
                        <select name="brand" id="brand" class="form-control">
                            <?php 
                            $danhmuc = getBrand();
                            $i = 0;
                            while ($row = $danhmuc->fetch_assoc()) {
                                ?>
                            <option <?php if ($i == 0) {
                                        echo "selected";
                                        $i++;
                                    } ?> value="<?php echo $row['idbr'] ?>"><?php echo $row['namebr'] ?></option>
                            <?php 
                        } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnThem" onclick="addNewProduct()">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 