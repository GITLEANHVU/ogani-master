<?php
class Protype extends Db{
    //Phương thức lấy ra tất cả loại sản phẩm
    function getAllProtype(){
        $sql = self::$connection->prepare("SELECT * FROM `protypes`");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy ra loại sản phẩm theo id
    function getProtypeByID($id){
        $sql = self::$connection->prepare("SELECT * FROM `protypes` WHERE `type_id` = $id");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}