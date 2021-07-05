<?php
include('header.php');
include 'models/product.php';
require "models/pagination.php";

$product = new Product();

// phân trang
$perPage = 6;
$page_num = 1;
$totalRows = count($product->getAllProducts());
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . "/ogani-master/shop-grid.php?";
if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
}
$productList = $product->getProductByPage($perPage, $page_num);

$protype = new Protype();
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Ogani Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <span>Cửa hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Loại sản phẩm</h4>
                        <ul>
                            <?php foreach ($protype->getAllProtype() as $value) { ?>
                                <li><a href="classify.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($product->getProductsNew(1, 3) as $value) { ?>
                                        <a href="shop-details.php?id=<?php echo $value['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/products/<?php echo $value['image'] ?>" alt="" style="width: 50px; height: 50px;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $value['name'] ?></h6>
                                                <span><?php echo number_format($value['price']) ?> VND</span>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php foreach ($product->getProductsNew(4, 3) as $value) { ?>
                                        <a href="shop-details.php?id=<?php echo $value['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/products/<?php echo $value['image'] ?>" alt="" style="width: 50px; height: 50px;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $value['name'] ?></h6>
                                                <span><?php echo number_format($value['price']) ?> VND</span>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Giảm giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php foreach ($product->getAllSaleProducts() as $value) { ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg" data-setbg="img/products/<?php echo $value['image'] ?>">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <!-- <li><a href="wishlist.php?id=<?php echo $value['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="insertCart.php?id=<?php echo $value['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?php echo $value['type_name'] ?></span>
                                            <h5><a href="shop-details.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h5>
                                            <div class="product__item__price"><?php echo number_format($value['price'] - ($value['price'] * 0.2)) ?> VND <span><?php echo number_format($value['price']) ?> VND</span></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <!-- <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xếp theo</span>
                                <select id="select2sort">
                                    <option value="0">Mặc định</option>
                                    <option value="1">Giá</option>
                                    <option value="2">Tên</option>
                                    <option value="3">Mới nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="filter__found">
                                <h6><span><?php echo count($product->getAllProducts()) ?></span> Sản phẩm</h6>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <?php foreach ($productList as $value) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/products/<?php echo $value['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <!-- <li><a href="wishlist.php?id=<?php echo $value['id'] ?>"><i class="fa fa-heart"></i></a></li> -->
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="insertCart.php?id=<?php echo $value['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="shop-details.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h6>
                                    <?php if ($value['feature'] == 1) { ?>
                                        <h5><?php echo number_format($value['price']) ?> VND</h5>
                                    <?php } else { ?>
                                        <h5><?php echo number_format($value['price'] - ($value['price'] * 0.2)) ?> VND</h5> <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="product__pagination mx-auto">
                        <ul class="pagination">
                            <?php echo Pagination::createLinks($baseUrl, $totalRows, $perPage, $page_num); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<?php include 'footer.php' ?>