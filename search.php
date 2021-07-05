<?php
include('header.php');
require "models/product.php";
require "models/pagination.php";

$product = new Product();

$protype = new Protype();

$typeid = null;
if (isset($_GET['type_id'])) {
    $typeid = $_GET['type_id'];
} else {
    $typeid = 1;
}
// tim kiem
$keyword = null;
if (isset($_GET['key'])) {
    $keyword = $_GET['key'];
}

// phan trang
$perPage = 6;
$page_num = 1;

$totalRows = count($product->getProductsWithNameP($keyword, $perPage, $page_num));
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . "/ogani-master/search.php?key=$keyword&";
if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
}
$productList = $product->getProductsWithNameP($keyword, $perPage, $page_num);
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
                        <a href="classify.php">Tìm kiếm</a>
                        <span>Từ khóa: <?php echo $keyword ?></span>
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
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php foreach ($productList as $value) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/products/<?php echo $value['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
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
                            <?php echo Pagination::createLinks($baseUrl, $totalRows, $perPage, $page_num);?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php')
?>