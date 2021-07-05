<?php include 'header.php';

include_once('./models/db.php');
include_once('./models/product.php');
include_once('./models/protype.php');
include_once('./models/pagination.php');
$obj_product = new Product;
$obj_protype = new Protype;

$allProtypes = $obj_protype->getAllProtype();
$allProducts = $obj_product->getAllProducts();


$perPage = 3;
$page_num = 1;
$totalRows = count($allProducts);
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . "/ogani-master/admin/index.php";
if (isset($_GET['page'])) {
  $page_num = $_GET['page'];
}
$productByPage = $obj_product->getProductByPage($perPage, $page_num);
?>

<div class="container-fluid mt-5">
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-products">
        <table class="table table-hover tm-table-small tm-product-table">
          <thead>
            <tr>
              <!-- <th scope="col">&nbsp;</th> -->
              <th scope="col">Mã</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Giá</th>
              <th scope="col">Mô tả</th>
              <th scope="col">Thông tin</th>
              <th scope="col">Hình</th>
              <!-- <th scope="col">Cân nặng</th> -->
              <th scope="col">Nổi bật</th>
              <th scope="col">Thời gian tạo</th>
              <th scope="col">Tên loại sản phẩm</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($productByPage as $key => $value) : ?>

              <tr>
                <!-- <th scope="row"><input type="checkbox" /></th> -->
                <th scope="row"><b><?php echo $value['id']; ?></b></th>
                <td class="tm-product-name">
                  <a style="color: #fff !important;" href="edit-product.php?id=<?php echo $value['id'] ?>"><b><?php echo $value['name']; ?></b></a>
                </td>
                <td><b><?php echo number_format($value['price']); ?></b></td>
                <td><b><?php echo substr($value['description'], 0, strlen($value['description']) / 10); ?> ...</b></td>
                <td><?php echo substr($value['description'], 0, strlen($value['information']) / 14); ?> ...</td>
                <td><img src="../img/products/<?php echo $value['image']; ?>" alt="anh loi" width="120px" height="120px"></td>
                <!-- <td><?php // echo $value['weight']; 
                          ?></td> -->

                <td><?php echo $value['feature']; ?></td>
                <td><?php echo $value['created_at']; ?></td>
                <td><?php echo $value['type_name']; ?></td>
                <td>
                  <a href="delOneProduct.php?id=<?php echo $value['id']; ?>" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- table container -->
        <a href="addOneProduct.php" class="btn btn-primary btn-block text-uppercase mb-3">Thêm một sản phẩm</a>
        <!-- <button class="btn btn-primary btn-block text-uppercase">
          Delete selected products
        </button> -->

      </div>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
        <h2 class="tm-block-title">Loại sản phẩm</h2>
        <div class="tm-product-table-container">
          <table class="table tm-table-small tm-product-table">
            <tbody>
              <?php foreach ($allProtypes as $key => $value) : ?>
                <tr>
                  <td class="tm-protype"><a style="color: #fff !important;" href="edit-protype.php?id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name']; ?></a></td>
                  <td class="text-center">
                    <a href="delOneProtype.php?id=<?php echo $value['type_id'] ?>" class="tm-product-delete-link">
                      <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <button class="btn btn-primary btn-block text-uppercase mb-3 addOneProtype">
          Thêm loại sản phẩm
        </button>
      </div>
    </div>
  </div>
  <div class="row mt-5" style="margin-left: 10px;">
    <ul class="pagination mx-auto">
      <?php echo Pagination::createLinks($baseUrl, $totalRows, $perPage, $page_num); ?>
    </ul>
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

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
  // $(function() {
  //   $(".tm-product-name").on("click", function() {
  //     window.location.href = "edit-product.php";
  //   });
  // });
  // $(function() {
  //   $(".tm-protype").on("click", function() {
  //     window.location.href = "edit-protype.php";
  //   });
  // });
  $(function() {
    $(".addOneProtype").on("click", function() {
      window.location.href = "addOneProtype.php";
    });
  });

  $(function() {
    $(".addOneProduct").on("click", function() {
      window.location.href = "addOneProduct.php";
    });
  });
</script>
</body>

</html>