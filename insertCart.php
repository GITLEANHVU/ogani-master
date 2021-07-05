<?php
require "config.php";
require "models/db.php";
require "models/product.php";
session_start();
// session_destroy();
// die;

// them san pham vao gio hang
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$newP = array();
$product = new Product;
foreach ($product->getAllProducts() as $value) {
    # code...
    $newP[$value['id']] = $value;
}

// them vao gio hang 
if (isset($_GET['qty'])) {
    $qty = $_GET['qty'];
    if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
        $newP[$id]['qty'] = $qty;
        $_SESSION['cart'][$id] = $newP[$id];
    } else {
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]['qty'] = $qty;
        } else {
            $newP[$id]['qty'] = $qty;
            $_SESSION['cart'][$id] = $newP[$id];
        }
    }
} else {
    if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
        $newP[$id]['qty'] = 1;
        $_SESSION['cart'][$id] = $newP[$id];
    } else {
        if (array_key_exists($id, $_SESSION['cart'])) {
            $_SESSION['cart'][$id]['qty'] += 1;
        } else {
            $newP[$id]['qty'] = 1;
            $_SESSION['cart'][$id] = $newP[$id];
        }
    }
}
header("Location:shoping-cart.php");
?>