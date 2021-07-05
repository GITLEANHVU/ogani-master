<?php
include_once('./models/db.php');
include_once('./models/login.php');
$login = new Login;
// lấy toàn bộ người dùng đã đăng ký ra đây
$admins = $login->getAllAdmins();
// 
?>

<?php
$username = NULL;
$password = NULL;
$checkLogin = false;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $checkLogin = $login->checkLogin($username, $password); // kiem tra dang nhap theo kieu cau lenh sql
    // thực hiện đăng nhập
    foreach ($admins as $key => $value) {
        if ($value['username'] === $username && $value['password'] === md5($password) && $value['role_id'] === 1) {
            $checkLogin = true;
            break;
        }
    }

    if ($checkLogin === true) {
        // dang nhap thanh cong, luu thong tin vao cookie va chuyen  trang sang index.php
        setcookie("username_admin", $username, time() + (86400 * 30), "/");
        setcookie("password_admin", $password, time() + (86400 * 30), "/");

        header("location:index.php");
    } else {
        // dung javascript alert cau thoai va cho nhap lai thong tin
        echo "<script>alert('Đăng nhập không thành công!');</script>";
        // header("location:login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page - Product Admin Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>

    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="login.php" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      name="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2020</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
