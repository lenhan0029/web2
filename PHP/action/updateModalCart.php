<?php session_start() ?>
<div class="items-total d-flex justify-content-between">
    <span><?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?> Sản phẩm</span>
    <span>Tổng cộng</span>
</div>
<div class="total_amount text-right">
    <span><?php  ?></span>
</div>
<div class="mini_action checkout">
    <a class="checkout__btn" href="?page=checkout">Chuyển tới giỏ hàng</a>
</div>
<div class="single__items">
    <div class="miniproduct" style="height:300px">
        <?php 
        if (isset($_SESSION['cart']))
            foreach ($_SESSION['cart'] as $product) {
                ?>
        <div class="item01 d-flex mt--20">
            <div class="thumb">
                <a href="?page=product&id=<?php echo $product['idpr'] ?>&size=<?php echo $product['idsize'] ?>"><img src="public/img/product/<?php echo $product['image'] ?>" alt="product images"></a>
            </div>
            <div class="content">
                <h6><a href="?page=product&id=<?php echo $product['idpr'] ?>&size=<?php echo $product['idsize'] ?>"><?php echo $product['namepr'] ?></a></h6>
                <span class="prize"><?php echo number_format($product['price']) ?> VNĐ</span>
                <div class="product_prize d-flex justify-content-between">
                    <span class="qun">Số lượng: <?php echo $product['qty'] ?></span>
                    <ul class="d-flex justify-content-end">
                        <!-- <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li> -->
                        <li><a onclick="delete_cart(<?php echo $product['idpr'] ?>)"><i class="zmdi zmdi-delete"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php 
    } else {
    echo "Không có sản phẩm trong giỏ hàng";
}
?>
    </div>
</div>
<!-- <div class="mini_action cart">
    <a class="cart__btn" href="cart.html">View and edit cart</a>
</div>  -->