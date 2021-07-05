<?php
include('header.php');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thông tin đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <span>Kiểm tra đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
            <form action="insertInfoCart.php" method="GET">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ tên người nhận<span>*</span></p>
                                    <input type="text" name="hoTenNguoiNhan" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="checkout__input">
                            <p>Quốc gia<span>*</span></p>
                            <input type="text">
                        </div> -->
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="diaChi" placeholder="Địa chỉ nhận hàng..." class="checkout__input__add" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="sdt" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú</p>
                            <input type="text" name="ghiChu" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: lưu ý đặc biệt khi giao hàng.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn đặt hàng của bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                            <ul>
                                <?php $i = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $value) { ?>
                                        <li><?php echo $value['name'];
                                            $i++; ?>
                                            <span>
                                                <?php echo number_format($value['price'] * $value['qty']) ?>
                                            </span>
                                        </li>
                                <?php }
                                } ?>

                            </ul>
                            <div class="checkout__order__subtotal">Số lượng sản phẩm <span><?php echo $i; //echo $totalQty 
                                                                                            ?></span></div>
                            <div class="checkout__order__total">Tổng cộng <span><?php echo number_format($totalPrice) ?> VND</span></div>
                            <button type="submit" name="submit" class="site-btn">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php include('footer.php') ?>