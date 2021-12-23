<?php
$brand = $_GET['brand'];
$numpage = $_GET['numpage'];
?>
<?php require "component/public/bradcaump.php" ?>
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                <div class="shop__sidebar">
                    <aside class="wedget__categories poroduct--cat">
                        <h3 class="wedget__title">Danh mục sản phẩm</h3>
                        <ul>
                            <?php
                            $result = getBrand();
                            while ($row = $result->fetch_assoc()) {
                                $total = getAmountByBrand($row["idbr"])->num_rows
                                ?>
                                <li><a href="?page=brand&brand=<?php echo $row['idbr'] ?>&numpage=0"><?php echo $row['namebr'] ?> <span>(<?php echo $total ?>)</span></a></li>
                            <?php
                        } ?>
                        </ul>
                    </aside>
                    <aside class="wedget__categories pro--range">
                        <h3 class="wedget__title">Lọc sản phẩm</h3>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form id="filter_price">
                                    <label style="width:70px" for="">Tên Giày</label>
                                    <input style="border-radius:5px;border:none;border:1px solid #999;padding:5px" onkeyup="submit_filter()" on name="namepr" type="text">
                                    <label style="width:120px" for="">Thương hiệu</label>
                                    <!-- <input style="border-radius:5px;border:none;border:1px solid #999;padding:5px" onkeyup="submit_filter()" name="brand" type="text"> -->
                                    <select onclick="submit_filter()" name="brand" id="brand">
                                        <!-- <option value="nobr" selected>tất cả</option> -->
                                    <?php
                                        $result1 = getBrand();
                                        while ($row1 = $result1->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row1['namebr'] ?>"><?php echo $row1['namebr'] ?></option>
                                    <?php } ?>
                                    </select>
                                    <label style="width:70px" for="">Giá từ</label>
                                    <input id="pricefrom" style="border-radius:5px;border:none;border:1px solid #999;padding:5px" onkeyup="submit_filter(),checksearchpricefrom()" min="1" name="pricefrom" type="number">
                                    <label style="width:70px" for="">Giá đến</label>
                                    <input id="priceto" style="border-radius:5px;border:none;border:1px solid #999;padding:5px" onkeyup="submit_filter(),checksearchpriceto()" min="1" name="priceto" type="number">
                                    <!-- <input type="radio" value="giamgia" name="giamgia" onclick="submit_filter()">Giảm Giá
                                    <input type="radio" value="" name="giamgia" checked onclick="submit_filter()">Không Giảm -->
                                    <input type="text" hidden id="numpage" value="0" name="numpage">
                                    <div></div>
                                </form>
                            </div>
                        </div>
                    </aside>
                    <aside class="wedget__categories poroduct--tag">
                        <!-- <h3 class="wedget__title">Tags sản phẩm</h3>
                        <ul>
                            <?php
                            // $result = getBrand();
                            // while ($row = $result->fetch_assoc()) {
                            //     $total = getAmountByBrand($row["idbr"])->num_rows
                            //     ?>
                                <li style="display:block"><a style="display:block;text-align:center" href="?page=brand&brand=<?php echo $row['idbr'] ?>&numpage=0"><?php echo $row['namebr'] ?> <span>(<?php echo $total ?>)</span></a></li>
                            <?php
                        //} ?>
                        </ul> -->
                    </aside>
                    <aside class="wedget__categories sidebar--banner">
                        <img src="images/others/bannersale.jpg" alt="banner images">
                        <div class="text" style="margin-top: 100px;">
                            <h2>Sản phẩm mới</h2>
                            <h6 style="color: #212529 !important;">giảm<span>&nbsp</span>giá<span>&nbsp</span>đến<br> <strong>50%</strong></h6>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-12 order-1 order-lg-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                            <div class="shop__list nav justify-content-center" role="tablist">
                                <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
                            </div>
                            <?php
                            $result = getAmountByBrand($brand);
                            ?>
                            <p>12<span id="num_result"> trên <?php echo $result->num_rows ?> sản phẩm</span></p>
                            <div class="orderby__wrapper">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab__container">
                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                        <div class="row" id="content_grid">
                            <?php
                            $result = getShoeByIdbr($brand, $numpage);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <!-- Start Single Product -->
                                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="product__thumb">
                                        <a class="first__img" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
                                        <a class="second__img animation1" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
                                        <!-- <?php //if (checkProductIsDiscounting($row['idpr']) != null) { ?>
                                            <div class="hot__box">
                                                Đang giảm giá <?php //$discounting = getDiscountingToday()->fetch_assoc();
                                                                //echo $discounting['percent'] . "%" ?>
                                            </div>
                                        <?php //} ?> -->
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $row['namepr'] ?></a></h4>
                                        <ul class="prize d-flex">
                                            <li><?php echo number_format($row['price']) ?> VNĐ</li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <!-- <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li> -->
                                                    <li><a style="cursor:pointer" class="wishlist" onclick="add_to_cart(<?php echo $row['idpr'] ?>,1)"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                    <!-- <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                                                                                                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
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
                                <!-- End Single Product -->
                            <?php
                        }
                        ?>
                        </div>
                        <ul class="wn__pagination" id="pagination">
                            <?php
                            $result = getAmountByBrand($brand);
                            $num = ceil($result->num_rows / max_page);
                            for ($i = 1; $i <= $num; $i++) {
                                $pos = ($i - 1) * max_page;
                                ?>
                                <li id="li<?php echo $pos ?>" <?php if ($pos == $numpage) echo "class='active'" ?>><a style="cursor:pointer" onclick="getProductBrand('<?php echo $brand ?>',<?php echo $pos ?>)"><?php echo $i ?></a></li>
                            <?php
                        } ?>
                        </ul>
                    </div>
                    <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                        <div class="list__view__wrapper" id="content_list">
                            <?php
                            $result = getShoeByIdbr($brand, $numpage);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <!-- Start Single Product -->
                                <div class="list__view mt--40">
                                    <div class="thumb">
                                        <a class="first__img" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product images"></a>
                                        <a class="second__img animation1" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product images"></a>
                                    </div>
                                    <div class="content">
                                        <h2 style="font-family: sans-serif !important;"><a href="?page=product&id=<?php echo $row['idpr'] ?>"><?php echo $row['namepr'] ?></a></h2>
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="prize__box">
                                            <li><?php echo number_format($row['price']) ?> VNĐ</li>

                                        </ul>
                                        <p style="font-family: sans-serif !important;">Mỗi một người cần có cho mình một đôi giày chính hãng. ĐÓ không chỉ là cách mà chúng ta tự yêu quý bản thân mà còn sự khẳng định chính mình. Ngại gì mà không mua.</p>
                                        <ul class="cart__action d-flex">
                                            <li class="cart"><a style="cursor:pointer" onclick="add_to_cart(<?php echo $row['idpr'] ?>,1)">Thêm vào giỏ</a></li>
                                            <li class="wishlist"><a href="cart.html"></a></li>
                                            <li class="compare"><a href="cart.html"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            <?php
                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->