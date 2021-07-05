<?php
class DatHang extends Db
{
  // them du lieu vao bang thongtinnhanhang
  public function insertOne_thongtinnhanhang($hoTenNguoiNhan, $diaChi, $email, $sdt, $ghiChu)
  {
    $sql = self::$connection->prepare("INSERT INTO `thongtinnhanhang` (`id`, `hoten`, `diachi`, `email`, `sdt`, `ghichu`) VALUES (NULL, '$hoTenNguoiNhan', '$diaChi', '$email', '$sdt', '$ghiChu') ");
    return $sql->execute();
  }

  // Lay lay mot thong tin nhan hang moi nhat
  function getOneThongTinNhanHangDESC()
  {
    $sql = self::$connection->prepare("SELECT * FROM `thongtinnhanhang` WHERE 1 ORDER BY id DESC");
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
  }
  
  // them du lieu vao bang listOrder
  public function insertOne_listOrder($idDonHang, $idTTNH, $username,$idSP, $soluong, $tongtien)
  {
    $sql = self::$connection->prepare("INSERT INTO `listorder` (`id`, `idDonHang`, `idTTNH`, `username`,`idSP`, `soluong`, `tongtien`) 
    VALUES (NULL, '$idDonHang', $idTTNH, '$username',$idSP, $soluong, $tongtien) ");
    return $sql->execute();
  }

  // lay toan bo hoa don
  public function layToanBoHoaDon()
  {
    $sql = self::$connection->prepare("SELECT * FROM `listorder` WHERE `username` =?");
    $sql->bind_param('s', $_COOKIE['username']);
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
  }

  // lay thong tin don hang dua theo id don hang
  public function layDoaDonByIdHD($id)
  {
    $sql = self::$connection->prepare("SELECT * FROM `listorder` WHERE `idDonHang` = '$id'");
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
  }

  // lay thong tin nhan hang dua theo idTTNH
  public function layTTNHByIdHD($id)
  {
    $sql = self::$connection->prepare("SELECT * FROM `thongtinnhanhang` WHERE `id` = '$id'");
    $sql->execute(); //return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items; //return an array
  }

}
