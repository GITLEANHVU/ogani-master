<?php
include('header.php');
include 'models/product.php';
include 'models/comment.php';

$products = new Product();
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}
$product = $products->getProductsByID($id);

$comment = new Comment();
$commentList = array();

if (count($comment->layCommentByIdSP($id)) != 0) {
    $commentList = $comment->layCommentByIdSP($id);
}
// var_dump($commentList);
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Gian hàng <?php echo $product[0]['type_name'] ?></h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Trang chủ</a>
                        <a href="shop-gird.php"><?php echo $product[0]['type_name'] ?></a>
                        <span><?php echo $product[0]['name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="img/products/<?php echo $product[0]['image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?php echo $product[0]['name'] ?></h3>
                    <div class="product__details__price"><?php echo number_format($product[0]['price']) ?> VND</div>
                    <p><?php echo $product[0]['description'] ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <a class="dec qtybtn">-</a>
                                <input type="text" id="qty" value="1">
                                <a class="inc qtybtn">+</a>
                            </div>
                        </div>
                    </div>
                    <a onclick="addCart(<?php echo $product[0]['id'] ?>)" href="" class="primary-btn" target="_blank">ADD TO CARD</a>
                    <script>
                        function addCart(id) {
                            let qty = document.querySelector("#qty").value;
                            window.location.href = `http://<?php echo $_SERVER['HTTP_HOST'] ?>/ogani-master/insertCart.php?id=${id}&qty=${qty}`;
                        }
                    </script>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Vận chuyển: </b> <span>1 ngày. </span></li>
                        <li><b>Weight: </b> <span><?php echo $product[0]['weight'] ?> kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <div class="nav nav-tabs">
                        <div class="nav-item"><b>Giới thiệu</b></div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Giới thiệu sản phẩm</h6>
                                <p><?php echo $product[0]['information'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Comments Review Product Begin -->
<section class="comments-product container">
    <div class="product__details__tab">
        <div class="nav nav-tabs">
            <div class="nav-item"><b>Bình luận</b></div>
        </div>
    </div>
    <!-- comments container -->
    <div class="comment_block">
        <!-- used by #{user} to create a new comment -->
        <div class="create_new_comment">
            <div class="input_comment">
                <input type="text" placeholder="Viết bình luận...">
            </div>
        </div>
        <!-- new comment -->
        <div class="new_comment">
            <?php foreach ($commentList as $key => $value) { ?>
                <ul class='user_comment'>
                    <div class='comment_body'>
                        <p><?php echo $value['comment'] ?></p>
                    </div>
                    <!-- comments toolbar -->
                    <div class='comment_toolbar'>
                        <!-- inc. date and time -->
                        <div class='comment_details'>
                            <ul>
                                <li><i class='fa fa-clock-o'></i><?php echo $value['created_at'] ?></li>
                                <li><i class='fa fa-calendar'></i><?php echo $value['created_at'] ?></li>
                                <li><i class='fa fa-pencil'></i><?php echo $value['username'] ?></li>
                            </ul>
                        </div>
                    </div>
                </ul>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Comments Review Product End -->
<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($products->getAllProductsByType($product[0]['type_id']) as $value) {
                if ($value['id'] != $id) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/products/<?php echo $value['image'] ?>">
                                <ul class="product__item__pic__hover">
                                    <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="insertCart.php?id=<?php echo $value['id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="shop-details.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></h6>
                                <h5><?php echo number_format($value['price']) ?> VND</h5>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<?php include 'footer.php' ?>;
<script>
    $(document).ready(function() {

        // them vao danh sach
        $("input").keypress(function(e) {
            var keycode = (e.keycode ? e.keycode : e.which);
            var dt = new Date();
            if (keycode == '13') {
                $(".new_comment").append(
                    "<ul class='user_comment'>" +
                    "<div class='comment_body'>" +
                    "<p>" + $(this).val() + "</p>" +
                    "</div>" +
                    "<div class='comment_toolbar'>" +
                    "<div class='comment_details'>" +
                    "<ul>" +
                    "<li><i class='fa fa-clock-o'></i>" + dt.getHours() + ":" + dt.getMinutes() + "</li>" +
                    "<li><i class='fa fa-calendar'></i>" + dt.getDate() + '/' + (dt.getMonth() + 1) + '/' + dt.getFullYear() + "</li>" +
                    "<li><i class='fa fa-pencil'></i><?php echo $_COOKIE['username'] ?></li>" +
                    "</ul>" +
                    "</div>" +
                    "</div>" +
                    "</ul>"
                );
                $(this).val("");


            }
        });


        $("input").keypress(function(e) {
            var keycode = (e.keycode ? e.keycode : e.which);
            var dt = new Date();
            if (keycode == '13') {
                const user_comment = document.querySelectorAll('.user_comment');
                // console.log(user_comment);
                let myComment = user_comment[user_comment.length-1].querySelector('.comment_body').getElementsByTagName('p')[0].textContent;
                window.location.href = `http://localhost/ogani-master/themComment.php?id=<?php echo $id; ?>&idSP=${<?php echo $id; ?>}&comment=${myComment}`;
            }
        });
        // xem danh sach


    });
</script>

<!-- 



 -->