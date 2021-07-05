<?php
if (!isset($_COOKIE['username']) && !isset($_COOKIE['username'])) {
    header("location:login.php");
}
include('header.php');
include 'models/product.php';
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $value) { ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="img/products/<?php echo $value['image'] ?>" alt="" style="width: 150px; height: 150px;">
                                            <h5><?php echo $value['name'] ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?php echo number_format($value['price']) ?> VND
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <a class="dec qtybtn" href="lesscart.php?id=<?php echo $value['id'] ?>">-</a>
                                                    <input type="text" value="<?php echo $value['qty']?>">
                                                    <a class="inc qtybtn" href="insertCart.php?id=<?php echo $value['id'] ?>">+</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            <?php echo number_format($value['price'] * $value['qty']) ?> VND
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="del.php?id=<?php echo $value['id'] ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <!-- <h5>Mã giảm giá</h5>
                        <form action="#">
                            <input type="text" placeholder="Nhập mã giảm giá...">
                            <button type="submit" class="site-btn">Áp dụng mã giảm giá</button>
                        </form> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng cộng</h5>
                    <ul>
                        <li>Số lượng mặt hàng <span><?php echo $totalQty ?></span></li>
                        <li>Tổng tiền <span><?php echo number_format($totalPrice) ?> VND</span></li>
                    </ul>
                    <a href="checkout.php" class="primary-btn">Xem đơn hàng</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php include('footer.php') ?>