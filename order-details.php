<?php
include('header.php');
include 'models/dathang.php';
include 'models/product.php';
$obj_datHang = new DatHang;

$product = new Product;

$id = !isset($_GET['id']) ? null : $_GET['id'];

$thongtinDH = array();
$ttNguoiNhan = null;
if (count($obj_datHang->layDoaDonByIdHD($id)) != 0) {
    $thongtinDH = $obj_datHang->layDoaDonByIdHD($id);
    $ttNguoiNhan = $obj_datHang->layTTNHByIdHD($thongtinDH[0]['idTTNH']);
}

$tongTien = 0;
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
                        <a href="listOrder.php">Xem đơn hàng</a>
                        <span>Xem lại thông tin đơn hàng</span>
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
                <h4>ĐỊA CHỈ GIAO HÀNG</h4>
                <p>Người đặt hàng: <?php echo $ttNguoiNhan[0]['hoten'] ?> </p>
                <p>Số điện thoại: <?php echo $ttNguoiNhan[0]['sdt'] ?> </p>
                <p>Địa chỉ: <?php echo $ttNguoiNhan[0]['diachi'] ?></p>
                <p>Ghi chú: <?php echo $ttNguoiNhan[0]['ghichu'] ?> </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <h4>DANH SÁCH SẢN PHẨM</h4>
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
                            <?php foreach ($thongtinDH as $key => $value) { ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/products/<?php echo $product->getProductsByID($value['idSP'])[0]['image'] ?>" alt="" style="width: 150px; height: 150px;">
                                        <h5><?php echo $product->getProductsByID($value['idSP'])[0]['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo number_format($product->getProductsByID($value['idSP'])[0]['price']) ?> VND
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <?php echo $value['soluong'] ?>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo number_format($value['tongtien']) ?> VND
                                    </td>
                                </tr>
                            <?php $tongTien += $value['tongtien'];
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="shoping__cart__btns">
                    <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng cộng</h5>
                    <ul>
                        <li>Số lượng mặt hàng <span><?php echo count($thongtinDH) ?></span></li>
                        <li>Tổng tiền <span><?php echo number_format($tongTien) ?> VND</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php include('footer.php') ?>