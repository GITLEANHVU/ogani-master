<?php 



include_once('./models/db.php');
include_once('./models/dathang.php');

$obj_datHang = new DatHang;
 $id = NULL;

 $username = NULL;
 
 if(isset($_GET['id']) && isset($_GET['username'])&& isset($_GET['idTTNH'])) {
   $id = $_GET['id'];
   $username = $_GET['username'];

   echo $id . "   " . $username;


  var_dump($obj_datHang->xoaSanPhamTrongHoaDon($id, $username));

  if(count($obj_datHang->layDoaDonTheoUsername($id)) < 1) {
    echo "Hoa don sach san pham roi";
    var_dump($obj_datHang->xoaHoaDon($_GET['idTTNH']));
  }
  

  header('location:hoadon.php');
 }

?>