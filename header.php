<?php
include_once('models/db.php');
include_once('models/login.php');
include 'models/protype.php';

session_start();

$login = new Login;
$username = NULL;
$checkLogin = false;

// lấy toàn bộ người dùng đã đăng ký ra đây
$allUsers = $login->getAllUsers();

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    foreach ($allUsers as $key => $value) {
        if ($value['username'] === $username) {
            $checkLogin = true;
            break;
        }
    }
}


$protype = new Protype();
$typeid = null;
if (isset($_GET['type_id'])) {
    $typeid = $_GET['type_id'];
} else {
    $typeid = 1;
}

?>

<?php
$totalQty = 0;
$totalPrice = 0;
if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
    foreach ($_SESSION['cart'] as $value) {
        # code...
        $totalQty += $value['qty'];
        $totalPrice += ($value['price'] * $value['qty']);
    }
}
?>

<!DOCTYPE html>
<html lang="vi us">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="img/logo.ico" />
    <title>OganiShop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/comment.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $totalQty?></span></a></li>
            </ul>
            <div class="header__cart__price">Tổng: <span><?php echo number_format($totalPrice)?> VND</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <?php
                /*
                // nếu như đăng nhập rồi thì thực hiện mua hàng sẽ có số lượng hàng được hiển thị, đổi chữ login thành logout, và hiện tên người đăng nhập lên gần logout
                // việc mua hàng sẽ được thực hiện nếu như đăng nhập thành công nếu không sẽ không cho mua hàng
                */
                if ($checkLogin === false) {
                    echo "<a href='./login.php'><i class='fa fa-user'></i> Đăng nhập</a>";
                } else {
                    echo "<a href='./logout.php'><i class='fa fa-user'></i> Đăng xuất | $username</a> ";
                }
                ?>

            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="shop-grid.php">Cửa hàng</a></li>
                <li><a href="#">Trang</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="classify.php">Phân loại</a></li>
                        <li><a href="shop-details.php">Chi tiết</a></li>
                        <li><a href="shoping-cart.php">Giỏ hàng</a></li>
                        <li><a href="listOrder.php">Xem đơn hàng</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>nhom1_lav_qttt@gmail.com</li>
                <li>Miễn phí ship cho các đơn hàng từ 1.000.000 VND</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>nhom1_lav_qttt@gmail.com</li>
                                <li>Miễn phí ship cho các đơn hàng từ 1.000.000 VND</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__auth">
                                <?php
                                /*
                        // nếu như đăng nhập rồi thì thực hiện mua hàng sẽ có số lượng hàng được hiển thị, đổi chữ login thành logout, và hiện tên người đăng nhập lên gần logout
                        // việc mua hàng sẽ được thực hiện nếu như đăng nhập thành công nếu không sẽ không cho mua hàng
                        */
                                if ($checkLogin === false) {
                                    echo "<a href='login.php'><i class='fa fa-user'></i> Đăng nhập</a>";
                                } else {
                                    echo "<a href='logout.php'><i class='fa fa-user'></i> Đăng xuất | $username</a>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">

                        <ul>
                            <li id="index" class="active"><a href="index.php">Trang chủ</a></li>
                            <li id="shop-grid"><a href="shop-grid.php">Cửa hàng</a></li>
                            <li id="trang"><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li id="phan-loai"><a href="classify.php">Phân loại</a></li>
                                    <li id="shop-details"><a href="shop-details.php">Chi tiết</a></li>
                                    <li id="shoping-cart"><a href="shoping-cart.php">Giỏ hàng</a></li>
                                    <li><a href="listOrder.php">Xem đơn hàng</a></li>
                                </ul>
                            </li>
                            <li id="contact"><a href="contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $totalQty?></span></a></li>
                        </ul>
                        <div class="header__cart__price">Tổng: <span><?php echo number_format($totalPrice)?> VND</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <body>
        <!-- Hero Section Begin -->
        <section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Loại sản phẩm</span>
                            </div>
                            <ul>
                                <?php foreach ($protype->getAllProtype() as $value) { ?>
                                    <li><a href="classify.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="search.php" method="get">
                                    <input type="text" placeholder="Từ khóa..." name="key">
                                    <button type="submit" class="site-btn">TÌM</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+84 111.222.3333</h5>
                                    <span>Hỗ trợ 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->

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
            if (index.indexOf(document.querySelector("#shop-grid").id) >= 0) {
                document.querySelector("#shop-grid").classList.add('active');
            }
            if (index.indexOf(document.querySelector("#contact").id) >= 0) {
                document.querySelector("#contact").classList.add('active');
            }

            // phan nay danh cho Trang, cho no mau xanh va hien thi thanh phan da click luon :))
            if (index.indexOf(document.querySelector("#shop-details").id) >= 0) {
                document.querySelector("#trang").classList.add('active');
                // document.querySelector("#trang>a").innerText = "Chi tiết";// cai phapn nay khong nhin ngao ngao :))
            }
            if (index.indexOf(document.querySelector("#shoping-cart").id) >= 0) {
                document.querySelector("#trang").classList.add('active');
            }
            // if (index.indexOf(document.querySelector("#checkout").id) >= 0) {
            //     document.querySelector("#trang").classList.add('active');
            // }
        </script>