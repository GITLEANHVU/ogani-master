<?php
require "models/db.php";
require "models/dathang.php";
session_start();

$obj_datHang = new DatHang;

$id = NULL;

$hoTenNguoiNhan = NULL;
$diaChi = NULL;
$email = NULL;
$sdt = NULL;
$ghiChu = NULL;

if (
  isset($_GET['hoTenNguoiNhan']) &&
  isset($_GET['diaChi']) &&
  isset($_GET['email']) &&
  isset($_GET['sdt']) &&
  isset($_GET['ghiChu']) &&
  isset($_GET['submit'])
) 
{
  $hoTenNguoiNhan = $_GET['hoTenNguoiNhan'];
  $diaChi = $_GET['diaChi'];
  $email = $_GET['email'];
  $sdt = $_GET['sdt'];
  $ghiChu = $_GET['ghiChu'];

  // thuc hien luu tren database
  if ($obj_datHang->insertOne_thongtinnhanhang($hoTenNguoiNhan, $diaChi, $email, $sdt, $ghiChu)) {

    // lay gia tri xuong lai
    $dh = $obj_datHang->getOneThongTinNhanHangDESC()[0];

    // lưu sản phẩm mua vào db
    foreach ($_SESSION['cart'] as $key => $value) {
      $date = str_replace(':', '', str_replace(' ', '', str_replace('/', '', date("d/m/Y H:i:s"))));
      $idDonHang  = "HD$date";
      if($obj_datHang->insertOne_listOrder($idDonHang ,$dh['id'], $_COOKIE['username'], $value['id'], $value['qty'], $value['price'] * $value['qty'])) {
        session_destroy();
      }
    }
    header("Location:listOrder.php");
  }
}