<?php
require "config.php";
require "models/db.php";
require "models/product.php";
session_start();
// session_destroy();
// die;
$id = $_GET['id'];
$newP = array();
$product = new Product;
foreach ($product->getAllProducts() as $key => $value) {
    # code...
    $newP[$key] = $value;
}

if (array_key_exists($id, $_SESSION['cart']) && $_SESSION['cart'][$id]['qty'] >= 1) {
    $_SESSION['cart'][$id]['qty'] -= 1;
}
if($_SESSION['cart'][$id]['qty'] == 0) {
    header("Location:del.php?id=$id");
}
else {
    header("Location:shoping-cart.php");
}
