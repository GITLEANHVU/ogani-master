<?php

include 'models/db.php';
include 'models/comment.php';
$id = NULL;
$comment = new Comment();

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $comment->xoaComment($id);

  header('location:comment.php');
}


?>