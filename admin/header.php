<?php
if (!isset($_COOKIE['username_admin']) && !isset($_COOKIE['username_admin'])) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="../img/logo.ico" />
  <title>OganiManager</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
  <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
  <div class="" id="home">
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.php">
          <h1 class="tm-site-title mb-0">Management</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">

            <li class="nav-item">
              <a id="index" class="nav-link active" href="index.php">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a id="products" class="nav-link" href="products.php">
                <i class="fas fa-shopping-cart"></i>
                Sản phẩm
              </a>
            </li>

            <!-- <li class="nav-item">
              <a id="accounts" class="nav-link" href="accounts.php">
                <i class="far fa-user"></i>
                Tài khoản
              </a>
            </li> -->

            <li class="nav-item">
              <a id="hoadon" class="nav-link" href="hoadon.php">
                <i class="far fa-file-alt"></i>
                Hóa đơn
              </a>
            </li>

            <li class="nav-item">
              <a id="comment" class="nav-link" href="comment.php">
                <i class="fas fa-cog"></i>
                <span>
                  Comments
                </span>
              </a>
            </li>

          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="logout.php">
                <?php echo $_COOKIE['username_admin']; ?>, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>

    </nav>

    <script>
      // lay duong dan trang web
      const href = document.location.href;
      // cat duong dan thanh mot mang va lay gia tri cuoi, de dem ra so sanh
      const index = href.split("/")[href.split("/").length - 1];

      // neu duong dan khong ton tai ky tu nao la index thi khong hien thi mau xanh
      if (index.indexOf("index") < 0) {
        console.log(document.querySelector("#index").classList.remove('active'));
      }
      // cac cau lenh iff phia duoi nay thi NGUOC LAI
      if (index.indexOf(document.querySelector("#products").id) >= 0) {
        document.querySelector("#products").classList.add('active');
      }
      // if (index.indexOf(document.querySelector("#accounts").id) >= 0) {
      //   document.querySelector("#accounts").classList.add('active');
      // }
      if (index.indexOf(document.querySelector("#comment").id) >= 0) {
        document.querySelector("#comment").classList.add('active');
      }
      if (index.indexOf(document.querySelector("#hoadon").id) >= 0) {
        document.querySelector("#hoadon").classList.add('active');
      }
    </script>