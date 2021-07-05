<?php

include_once('./models/db.php');
include_once('./models/protype.php');
include_once('./models/product.php');
$obj_product = new Product;
$obj_protype = new Protype;

$id = NULL;

if (isset($_GET['id']) && $_GET['id'] !== NULL) {
  $id = $_GET['id'];

  $check = true;
  $all = $obj_product->getAllProducts();

  foreach ($all as $value) {  
    if ($value['type_id'] == $id) {
      $check = false;
      break;
    }
  }


  if ($check == true) {
    $obj_protype->delOneProtypeByID($id);
  }

  header("location:products.php");
}
