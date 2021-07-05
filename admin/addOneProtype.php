<?php

include_once('./models/db.php');
include_once('./models/protype.php');
$obj_protype = new Protype;


$name = NULL;
$fileInput = NULL;

if (isset($_POST['name']) && isset($_FILES['fileInput'])) {
  // kiem tra xong neu khong null thi thuc hien lay gia tri va chen vao csdl
  $name = $_POST['name'];
  // lay tên hình ảnh
  $fileInput = $_FILES['fileInput']['name'];
  
  $target_dir = "../img/categories/uploads/";
  $target_file = $target_dir . basename($fileInput);
  
  move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file);
  $obj_protype->insertOneProtype($name, $fileInput);
}
?>
<!-- type_id
type_name 
type_img -->
<?php include 'header.php' ?>
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Thêm loại sản phẩm</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label for="name">Tên loại
                </label>
                <input name="name" type="text" class="form-control validate" required />
              </div>

          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

            <div class="tm-product-img-dummy mx-auto">
              <img id="imgUpload" src="" alt="Chưa chọn hình" width="358px" height="240px">
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