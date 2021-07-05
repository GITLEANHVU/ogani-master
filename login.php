<?php
include_once('models/db.php');
include_once('models/login.php');
$login = new Login;
// lấy toàn bộ người dùng đã đăng ký ra đây
$allUsers = $login->getAllUsers();
// 
?>

<?php
$username = NULL;
$password = NULL;
$checkLogin = false;

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // thực hiện đăng nhập
    foreach ($allUsers as $key => $value) {
        if ($value['username'] === $username && $value['password'] === md5($password) && $value['role_id'] === 2) {
            $checkLogin = true;
            break;
        }
    }

    if ($checkLogin === true) {
        // dang nhap thanh cong, luu thong tin vao cookie va chuyen  trang sang index.php
        setcookie("username", $username, time() + (86400 * 30), "/");
        setcookie("password", $password, time() + (86400 * 30), "/");

        header("location:index.php");
    } else {
        // dung javascript alert cau thoai va cho nhap lai thong tin
        echo "<script>alert('Đăng nhập không thành công!');</script>";
        // header("location:login.php");
    }
}
?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="img/logo.ico" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./css/css-login.css">
</head>

<body>
    <div class="container">
        <form class="form" id="login" method="POST" action="login.php">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" name="username" class="form__input" autofocus placeholder="Username">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" name="password" class="form__input" autofocus placeholder="Password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" name="submit">Continue</button>
            <p class="form__text">
                <a class="form__link" href="./register.php" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>
        </form>
    </div>
</body>