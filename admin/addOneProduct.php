<?php include 'header.php';

include_once('./models/db.php');
include_once('./models/product.php');
include_once('./models/protype.php');
$obj_product = new Product;
$obj_protype = new Protype;

$name = NULL;
$price = NULL;
$description = NULL;
$information = NULL;
$image = NULL;
$type_id = NULL;
$weight = NULL;
$feature = NULL;
$fileInput = NULL;

if (
  isset($_POST['name']) && isset($_FILES['fileInput'])
  && isset($_POST['price']) && isset($_POST['description'])
  && isset($_POST['information']) && isset($_POST['type_id'])
  && isset($_POST['weight']) && isset($_POST['feature'])
) {
  // kiem tra xong neu khong null thi thuc hien lay gia tri va chen vao csdl
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $information = $_POST['information'];
  // $image = $_POST['name'];
  $type_id = $_POST['type_id'];
  $weight = $_POST['weight'];
  $feature = $_POST['feature'];

  // lay tên hình ảnh
  $fileInput = $_FILES['fileInput']['name'];

  $target_dir = "../img/products/uploads/";
  $target_file = $target_dir . basename($fileInput);
  move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file);
  $obj_product->insertOneProduct($name, $price, $description, $information, $fileInput, $type_id, $weight, $feature);
}
?>

<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Thêm sản phẩm</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="name">Tên
                </label>
                <input id="name" name="name" type="text" class="form-control validate" required />
              </div>
              <div class="form-group mb-3">
                <label for="price">Giá
                </label>
                <input id="price" name="price" type="text" class="form-control validate" required />
              </div>
              <div class="form-group mb-3">
                <label for="weight">Cân nặng
                </label>
                <input id="weight" name="weight" type="text" class="form-control validate" required />
              </div>

              <div class="form-group mb-3">
                <label for="feature">Nổi bật
                </label>
                <input id="feature" name="feature" type="number" min="0" max="1" class="form-control validate" required />
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control validate" rows="3" required></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="information">Thông tin</label>
                <textarea name="information" class="form-control validate" rows="3" required></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="type_id">Loại</label>
                <select name="type_id" class="custom-select tm-select-accounts" id="category">
                  <?php
                  foreach ($obj_protype->getAllProtype() as $key => $value) :
                  ?>
                    <option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
            <div class="tm-product-img-dummy mx-auto">
              <img style="display: inline-block;" id="imgUpload" src="" alt="Chưa chọn hình" width="358px" height="239px">
              <!-- <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i> -->
            </div>
            <div class="custom-file mt-3 mb-3">
              <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
              <input type="button" class="btn btn-primary btn-block mx-auto" value="Chọn hình" onclick="document.getElementById('fileInput').click();" />
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-uppercase">Thêm</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2018</b> All rights reserved.

      Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
    </p>
  </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {

      var reader = new FileReader();

      reader.onload = function(e) {
        $('#imgUpload')
          .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
  // $(function() {
  //   $("#expire_date").datepicker();
  // });
</script>
</body>

</html>