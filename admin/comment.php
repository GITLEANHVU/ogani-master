<?php include 'header.php';
include 'models/db.php';
include 'models/comment.php';
include 'models/login.php';
$login = new Login();

$au = $login->getAllUsers();
$comment = new Comment();
$commentList = array();
$username = null;


if (isset($_GET['username'])) {
  $username = $_GET['username'];

  if (count($comment->layCommentByUsername($username)) != 0) {
    $commentList = $comment->layCommentByUsername($username);
  } else {
    // $commentList = $comment->layCommentByAll($username);
  }

} else {
  $commentList = $comment->layCommentByAll($username);
}


// var_dump($result);

?>

<div class="container-fluid mt-5">
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-products">

      <span style="color: #fff; font-weight: 900; font-size: 1.7rem;">Có <?php echo count($commentList); ?> bình luận</span>
      
        <table class="table table-hover tm-table-small tm-product-table">
          <thead>
            <tr>
              <th scope="col">Tên người dùng</th>
              <th scope="col">Nội dung bình luận</th>
              <th scope="col">Thời gian bình luận</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($commentList as $key => $value) { ?>
            <tr>
            <td><b><?php echo $value['username']; ?></b></td>
            <td><b><?php echo $value['comment']; ?></b></td>
            <td><b><?php echo $value['created_at']; ?></b></td>
            <td>
                  <a href="delComment.php?id=<?php echo $value['id'] ?>" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

    </div>

    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
        <h2 class="tm-block-title">Tất cả gười dùng</h2>
        <div class="tm-product-table-container">
          <table class="table tm-table-small tm-product-table">
            <tbody>
              <tr class="username" id="allHD" style="cursor: pointer;">
                <td class="tm-protype">All</td>
              </tr>
              <?php foreach ($au as $key => $value) : ?>
                <tr class="username" id="<?php echo $value['id'] ?>" style="cursor: pointer;">
                  <td class="tm-protype"><?php echo $value['username']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2021</b> All rights reserved.

      Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
    </p>
  </div>
</footer>

<script>
  const listUsername = document.querySelectorAll('.username');
  console.log(listUsername);
  listUsername.forEach(element => {
    element.addEventListener('click', (e) => {
      if (e.target.innerText == "All") {
        window.location.href = `http://localhost/ogani-master/admin/comment.php`;
      } else window.location.href = `http://localhost/ogani-master/admin/comment.php?username=${e.target.innerText}`;
    });
  });
</script>
<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->

</body>

</html>