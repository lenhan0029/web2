<div class="table-data__tool" id="model-brand">
    <div class="table-data__tool-right">
    <input type="text" id="AddBrand" value=""></input>
        <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="buttonAddBrand">
            <i class="zmdi zmdi-plus"></i>Thêm thương hiệu</button>
    </div>
</div>
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>Mã thương hiệu</th>
                <th>Tên thương hiệu</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table_product">
            <?php 
            $result = getBrand();
            while ($row = $result->fetch_assoc()) {
                ?>
            <tr id="<?php echo $row['idbr'] ?>">
                <td ><?php echo $row['idbr'] ?></td>
                <td><?php echo $row['namebr'] ?></td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="getBrand(<?php echo $row['idbr']?>)" data-target="#updateBrand">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button id="deletebrand" class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deletebrand(<?php echo $row['idbr'] ?>);">
                            <i class="zmdi zmdi-delete"><input id="delete" type="button" value="<?php $row['idbr'] ?>" hidden></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php 
        }
        ?>
        </tbody>
    </table>
</div> 