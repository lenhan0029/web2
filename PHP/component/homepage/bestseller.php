<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section__title text-center pb--50">
                <h2 class="title__be--2">SẢN PHẨM <span class="color--theme">BÁN CHẠY </span></h2>
                <p>Những đôi sneaker được các bạn trẻ săn đón trong thời gian vừa qua.</p>
            </div>
        </div>
    </div>
</div>
<div class="slider center">
    <?php
    $result = getBestSellerShoe();
    while ($row = $result->fetch_assoc()) {
        ?>
        <!-- Single product start -->
        <div class="product product__style--3">
            <div class="product__thumb">
                <a class="first__img" href="?page=product&id=<?php echo $row['idpr'] ?>"><img src="public/img/product/<?php echo $row['image'] ?>" alt="product image"></a>
            </div>
            <div class="product__content content--center">
                <div class="action">
                    <div class="actions_inner">
                        <ul class="add_to_links">

                            <li><a class="wishlist" onclick="add_to_cart(<?php echo $row['idpr'] ?>,1)"><i class="bi bi-shopping-cart-full"></i></a></li>

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
        <!-- Single product end -->

    <?php
}  ?>
</div>