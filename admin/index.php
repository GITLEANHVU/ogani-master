<?php
include 'header.php';
include_once('./models/db.php');
include_once('./models/product.php');
include_once('./models/pagination.php');
$obj_product = new Product;
$allProducts = $obj_product->getAllProducts();
// var_dump($allProducts);

// phan trang
$perPage = 3;
$page_num = 1;
$totalRows = count($allProducts);
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . "/ogani-master/admin/index.php";
if (isset($_GET['page'])) {
    $page_num = $_GET['page'];
}
$productByPage = $obj_product->getProductByPage($perPage, $page_num);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b><?php echo $_COOKIE['username_admin']; ?></b></p>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <!-- tm-block tm-block-taller tm-block-scroll -->
            <div class="tm-bg-primary-dark">
                <h2 class="tm-block-title">All products</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">INFORMATION</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">WEIGHT</th>
                            <th scope="col">FEATURE</th>
                            <th scope="col">CREATED AT</th>
                            <th scope="col">TYPE NAME</th>
                            <!-- <th scope="col">TYPE IMAGE</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($productByPage as $key => $value) : ?>

                            <tr>
                                <th scope="row"><b><?php echo $value['id']; ?></b></th>
                                <td class="product-name">
                                    <!-- <div class="tm-status-circle moving"> </div> -->
                                    <b><?php echo $value['name']; ?></b>
                                </td>
                                <td><b><?php echo $value['price']; ?></b></td>
                                <td><b><?php echo substr($value['description'], 0, strlen($value['description']) / 10); ?> ...</b></td>
                                <td><?php echo substr($value['description'], 0, strlen($value['information']) / 10); ?> ...</td>
                                <td><img src="../img/products/<?php echo $value['image']; ?>" alt="anh loi" width="120px" height="120px"></td>
                                <td><?php echo $value['weight']; ?></td>

                                <td><?php echo $value['feature']; ?></td>
                                <td><?php echo $value['created_at']; ?></td>
                                <td><?php echo $value['type_name']; ?></td>
                                <!-- <td><img src="../img/categories/<?php // echo $value['type_img']; 
                                                                        ?>" alt="anh loi" width="120px" height="120px"></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="row mt-5" style="margin-left: 10px;">
                <ul class="pagination mx-auto">
                    <?php echo Pagination::createLinks($baseUrl, $totalRows, $perPage, $page_num); ?>
                </ul>
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
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="js/Chart.min.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="js/tooplate-scripts.js"></script>
<script>
    $(function() {
        $(".product-name").on("click", function() {
            window.location.href = "edit-product.php";
        });
    });
</script>
</body>

</html>