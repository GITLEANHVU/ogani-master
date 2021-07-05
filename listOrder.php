<?php
if (!isset($_COOKIE['username']) && !isset($_COOKIE['username'])) {
    header("location:login.php");
}
include('header.php');

require('models/dathang.php');

$obj_datHang = new DatHang;

$toanBoHD = $obj_datHang->layToanBoHoaDon();

$id = NULL;
$result = array();
$idDonHang = null;
$soluong = 0;
$price = 0;
$k = 0;
?>

<?php
if (count($toanBoHD) != 0) {
    $id = $toanBoHD[0]['idDonHang'];
    if (count($toanBoHD) == 1) {
        $result[$k] = $obj_datHang->layDoaDonByIdHD($id);
    } else {
        foreach ($toanBoHD as $key => $value) {
            if ($id != $toanBoHD[$key]['idDonHang']) {
                $result[$k] = $obj_datHang->layDoaDonByIdHD($id);
                $id =  $toanBoHD[$key]['idDonHang'];
                $k++;
            }
            if ($toanBoHD[count($toanBoHD) - 1]['idDonHang'] == $id) {
                $result[$k] = $obj_datHang->layDoaDonByIdHD($id);
            }
        }
        if ($k == 0) {
            $result[$k] = $obj_datHang->layDoaDonByIdHD($id);
        }
    }
}
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <span>Xem lại các đơn đặt hàng</span>
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
                    Tổng cộng: <?php echo count($result); ?> đơn hàng
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Đơn hàng</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $key => $value) {
                                $soluong = 0;
                                $price = 0;
                                foreach ($value as $key1 => $value1) {
                                    if ($value1['idDonHang'] == $value[$key1]['idDonHang']) {
                                        $idDonHang = $value[$key1]['idDonHang'];
                                        $soluong += $value1['soluong'];
                                        $price += $value1['tongtien'];
                                    }
                                } ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h5> <a href="order-details.php?id=<?php echo $idDonHang; ?>"><?php echo $idDonHang; ?></a> </h5>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <?php echo $soluong; ?>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo number_format($price); ?> VND
                                    </td>
                                </tr>
                            <?php } ?>
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
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php include('footer.php') ?>