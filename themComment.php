<?php
include 'models/db.php';
include 'models/comment.php';

$c = new Comment;
$idSP = NULL;
$comment = NULL;
$id = NULL;
if (isset($_GET['idSP']) && isset($_GET['comment']) && isset($_GET['id'])) {
  $idSP = $_GET['idSP'];
  $comment = $_GET['comment'];
  $id = $_GET['id'];
  $c->insertOne_comment($idSP, $comment);
  echo "them thanh cong";
  header("location:shop-details.php?id=$id");
}
