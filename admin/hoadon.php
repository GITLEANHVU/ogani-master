<?php include 'header.php';

include_once('./models/db.php');
include_once('./models/login.php');
include_once('./models/pagination.php');
include_once('./models/dathang.php');

$user = new Login();
$au = $user->getAllUsers();

$obj_datHang = new DatHang;
$toanBoHD = NULL;

$id = NULL;
$result = array();
$idDonHang = null;
$soluong = 0;
$price = 0;
$k = 0;

if (isset($_GET['idDonhang'])) {
  $toanBoHD = $obj_datHang->layToanBoHoaDonQTTTByUsername($_GET['idDonhang']);
} else {
  $toanBoHD = $obj_datHang->layToanBoHoaDonLAV();
}

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

// var_dump($result);

?>

<div class="container-fluid mt-5">
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-products">
        <?php
        if (isset($_GET['idDonhang'])) {
          echo "<b style='color: white;'>".$_GET['idDonhang']."</b> <br>";
          echo "<b style='color: white;'>Số lượng đơn hàng: ".count($result)."</b>";
        } else {
          echo "<b style='color: white;'>Tổng đơn hàng: ".count($result)."</b>";
        }
        ?>
        <table class="table table-hover tm-table-small tm-product-table">
          <thead>
            <tr>
              <th scope="col">Mã</th>
              <th scope="col">Số lượng sản phẩm</th>
              <th scope="col">Thành tiền</th>
              <th scope="col">Thời gian tạo</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $key => $value) : ?>

              <tr>
                <!-- <th scope="row"><input type="checkbox" /></th> -->
                <th scope="row"><b><?php echo $value[0]['idDonHang']; ?></b></th>
                <td><?php echo $value[0]['soluong']; ?></td>
                <td><b><?php echo number_format($value[0]['tongtien']); ?></b></td>
                <td><?php echo $value[0]['created_at']; ?></td>
                <td>
                  <a href="http://localhost/ogani-master/admin/xoaHoaDon.php?id=<?php echo $value[0]['idDonHang'] ?>&username=<?php echo $value[0]['username'] ?>&idTTNH=<?php echo $value[0]['idTTNH'] ?>" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
        <h2 class="tm-block-title">Tất cả gười dùng</h2>
        <div class="tm-product-table-container">
          <table class="table tm-table-small tm-product-table">
            <tbody>
              <tr class="username" id="allHD" style="cursor: pointer;">
                <td class="tm-protype">All</td>
              </tr>
              <?php foreach ($au as $key => $value) : ?>
                <tr class="username" id="<?php echo $value['id'] ?>" style="cursor: pointer;">
                  <td class="tm-protype"><?php echo $value['username']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2021</b> All rights reserved.

      Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
    </p>
  </div>
</footer>

<script>
  const listUsername = document.querySelectorAll('.username');
  console.log(listUsername);
  listUsername.forEach(element => {
    element.addEventListener('click', (e) => {
      if (e.target.innerText == "All") {
        window.location.href = `http://localhost/ogani-master/admin/hoadon.php`;
      } else window.location.href = `http://localhost/ogani-master/admin/hoadon.php?idDonhang=${e.target.innerText}`;
    });
  });
</script>
<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->

</body>

</html>