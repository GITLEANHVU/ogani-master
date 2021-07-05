<?php

include_once('models/db.php');
include_once('models/login.php');
include 'models/protype.php';
include 'models/product.php';
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

// lấy ra tất cả loại sản phẩm 
$protype = new Protype();
$protypeList = $protype->getAllProtype();


$product = new Product();

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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                <li class="active"><a href="index.php">Trang chủ</a></li>
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
                            <li class="active"><a href="index.php">Trang chủ</a></li>
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

    <!-- Hero Section Begin -->
    <section class="hero">
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
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>RAU CỦ TƯƠI</span>
                            <h2>RAU CỦ <br>100% Organic</h2>
                            <p>Miễn phí vận chuyển và giao hàng</p>
                            <a href="shop-grid.php" class="primary-btn">MUA NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach ($protypeList as $item) { ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="img/categories/<?php echo $item['type_img'] ?>">
                                <h5><a href="classify.php?type_id=<?php echo $item['type_id'] ?>"><?php echo $item['type_name'] ?></a></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="featured__controls">
                        <ul id="categories">
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".traicayvahat">Trái cây và hạt</li>
                            <li data-filter=".thitsach">Thịt sạch</li>
                            <li data-filter=".raucu">Rau củ</li>
                            <li data-filter=".haisan">Hải sản</li>
                            <li data-filter=".bovatrung">Bơ và trứng</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($product->getAllFeatureProductsByType(3) as $item) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix traicayvahat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/products/<?php echo $item['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="wishlist.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="insertCart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                <h5><?php echo number_format($item['price']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($product->getAllFeatureProductsByType(1) as $item) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix thitsach">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/products/<?php echo $item['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="wishlist.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="insertCart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                <h5><?php echo number_format($item['price']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($product->getAllFeatureProductsByType(2) as $item) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix raucu">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/products/<?php echo $item['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="wishlist.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="insertCart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                <h5><?php echo number_format($item['price']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($product->getAllFeatureProductsByType(4) as $item) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix haisan">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/products/<?php echo $item['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="wishlist.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="insertCart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                <h5><?php echo number_format($item['price']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($product->getAllFeatureProductsByType(5) as $item) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix bovatrung">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/products/<?php echo $item['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="wishlist.php?id=<?php echo $item['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="insertCart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="shop-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                <h5><?php echo number_format($item['price']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <?php include('footer.php'); ?>