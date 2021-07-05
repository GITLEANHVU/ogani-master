<?php 

include_once('./models/db.php');
include_once('./models/product.php');
$obj_product = new Product;
$id = NULL;

if(isset($_GET['id']) && $_GET['id'] !== NULL) {
  $id = $_GET['id'];
  $obj_product->delOneProductByID($id);
}
header('location:products.php');
?>