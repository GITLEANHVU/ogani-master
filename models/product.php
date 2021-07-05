<?php
class Product extends Db{
    //Phương thức lấy ra tất cả sản phẩm nổi bật theo loại
    function getAllFeatureProductsByType($type_id){
        $sql = self::$connection->prepare("SELECT * 
        FROM `products`
        WHERE `products`.`feature` = 1 
        AND `products`.`type_id` = $type_id");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy ra tất cả sản phẩm
    function getAllProducts(){
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id`");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy ra sản phẩm theo id
    function getProductsByID($id){
        $sql = self::$connection->prepare("SELECT * 
        FROM `products`, `protypes` 
        WHERE `products`.`type_id` = `protypes`.`type_id`
        AND `id` = $id");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy ra tất cả sản phẩm theo loại
    function getAllProductsByType($type_id){
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_id` = $type_id");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy ra ? sản phẩm mới nhất
    function getProductsNew($num, $num2){
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `created_at` DESC LIMIT $num, $num2");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy ra tất cả sản phẩm giảm giá
    function getAllSaleProducts(){
        $sql = self::$connection->prepare("SELECT * 
        FROM `products`, `protypes`
        WHERE `products`.`type_id` = `protypes`.`type_id`
        AND `products`.`feature` = 0");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy tất cả sản phẩm dựa theo page
    public function getProductByPage($perPage, $page)
    {
        $start = $perPage * ($page - 1);
        $sql = parent::$connection->prepare("SELECT * FROM `products`, `protypes` 
        WHERE `products`.`type_id` = `protypes`.`type_id` 
        ORDER BY `ID` DESC 
        LIMIT $start, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy sản phẩm dựa theo loại có phân trang
    function getProductsByType($typeid, $perPage, $page){
        $start = $perPage * ($page - 1);
        $sql = self::$connection->prepare("SELECT * 
        FROM `products` 
        WHERE `products`.`type_id` = $typeid
        LIMIT $start, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Phương thức lấy sản phẩm dựa theo tên sản phẩm có phân trang
    function getProductsWithNameP($keyword, $perPage, $page){
        $start = $perPage * ($page - 1);
        $sql = self::$connection->prepare("SELECT * 
        FROM `products` 
        WHERE `products`.`name` 
        LIKE '%$keyword%'
        LIMIT $start, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}