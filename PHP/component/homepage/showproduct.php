<?php
$i = 0;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section__title text-center">
                <h2 class="title__be--2">SẢN PHẨM <span class="color--theme">NỔI BẬT</span></h2>
                <!--                 <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p> -->
            </div>
        </div>
    </div>
    <div class="row mt--50">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="product__nav nav justify-content-center" role="tablist">
                <!-- DỰA VÀO ID  ĐỂ MÀ THÊM CÁI SLIDE  -->
                <?php
                $result = getBrand();
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <a class="nav-item nav-link <?php if ($i == 0) echo "active"; ?>" data-toggle="tab" href="#<?php echo $row['idbr'] ?>" role="tab"><?php echo $row['namebr'] ?></a>
                    <?php
                    $i = 1;
                } ?>
            </div>
        </div>
    </div>
    <div class="tab__container mt--60">
        <!-- Start Single Tab Content -->
        <?php
        $result = getBrand();
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="row single__tab tab-pane fade show <?php if ($i == 1) echo "active"; ?>" id="<?php echo $row['idbr'] ?>" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <?php
                    $result2 = getFourBrand($row['idbr']);
                    while ($row2 = $result2->fetch_assoc()) {
                        ?>
                        <div class="single__product">
                            <!-- Start Single Product -->
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product product__style--3">
                                    <div class="product__thumb">
                                        <a class="first__img" href="?page=product&id=<?php echo $row2['idpr'] ?>"><img src="public/img/product/<?php echo $row2['image'] ?>" alt="product image"></a>
                                        <a class="second__img animation1" href="?page=product&id=<?php echo $row2['idpr'] ?>"><img src="public/img/product/<?php echo $row2['image'] ?>" alt="product image"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">HOT</span>
                                        </div>
                                        <div style="float: right;margin-right:30px;">size 35</div>
                                        <div style="width: 100px;text-align: center;color: white;background: black;padding-left: 2%;">
                                        Chi tiết
                                        <!-- <?php
                                            // $size = getSizeProduct($row['idpr']);
                                            //while ($rows = $size->fetch_array()){?>
                                            <option value="<?php //echo $rows['idsize'] ?>"><?php //echo $rows['size'], " " ?> (<?php //echo $rows['amount'] ?>)</option>
                                        <?php    
                                            //}
                                            ?> -->
                                        </div>
                                    </div>
                                    <div class="product__content content--center">
                                        <h4><a href="?page=product&id=<?php echo $row2['idpr'] ?>"><?php echo $row2['namepr'] ?></a></h4>
                                        <ul class="prize d-flex">
                                            <li><?php echo number_format($row2['price']) ?> VNĐ</li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">

                                                    <li><a class="wishlist" onclick="add_to_cart(<?php echo $row2['idpr'] ?>,1)"><i class="bi bi-shopping-cart-full"></i></a></li>

                                                    <!-- <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <ul class="rating d-flex">
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li class="on"><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i = 2;
                    }
                    ?>
                </div>
            </div>
        <?php
    }
    ?>

        <!-- End Single Tab Content -->
    </div>
</div>