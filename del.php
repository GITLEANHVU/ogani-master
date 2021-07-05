<?php
session_start();
$id = $_GET['id'];
if($id == "all")
{
    session_destroy();
}
else{
    unset($_SESSION['cart'][$id]);
}
header("Location:shoping-cart.php");
