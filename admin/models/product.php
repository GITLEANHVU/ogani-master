<?php
class Product extends Db
{
    //Phương thức lấy ra tất cả sản phẩm nổi bật theo loại
    function getAllFeatureProductsByType($type_id)
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM `products`
        WHERE `products`.`feature` = 1 
        AND `products`.`type_id` = $type_id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Viet phuong thuc lay ra tat ca san pham
    function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, protypes WHERE `products`.`type_id` = `protypes`.`type_id` ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    //Viet phuong thuc lay ra san pham theo loai
    function getAllProductsDT()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_name` = 'Điện thoại'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsTN()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_name` = 'Tai nghe'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsMH()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_name` = 'Màn hình PC'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsTL()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_name` = 'Máy tính bảng'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsSW()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `protypes` WHERE `products`.`type_id` = `protypes`.`type_id` and `protypes`.`type_name` = 'Đồng hồ thông minh'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsSS()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures` WHERE `products`.`manu_id` = `manufactures`.`manu_id` and `manufactures`.`manu_name` = 'Samsung'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsA()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures` WHERE `products`.`manu_id` = `manufactures`.`manu_id` and `manufactures`.`manu_name` = 'Apple'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsHW()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures` WHERE `products`.`manu_id` = `manufactures`.`manu_id` and `manufactures`.`manu_name` = 'Huawei'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsLN()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures` WHERE `products`.`manu_id` = `manufactures`.`manu_id` and `manufactures`.`manu_name` = 'Lenovo'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getAllProductsD()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures` WHERE `products`.`manu_id` = `manufactures`.`manu_id` and `manufactures`.`manu_name` = 'Dell'");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // lấy sản phẩm dựa theo page
    public function getProductByPage($perPage, $page)
    {
        $start = $perPage * ($page - 1);
        $sql = parent::$connection->prepare("SELECT * FROM `products`, `protypes` 
        WHERE `products`.`type_id` = `protypes`.`type_id` ORDER BY id DESC
        LIMIT $start, $perPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // delete mot san pham
    public function delOneProductByID($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE id = $id");
        return $sql->execute();
    }

    // them mot san pham
    public function insertOneProduct($name, $price, $description, $information, $image, $type_id, $weight, $feature)
    {
        $sql = self::$connection->prepare(
            "INSERT INTO `products`(`name`, `price`, `description`, `information`, `image`, `type_id`, `weight`, `feature`) 
            VALUES ('$name', $price, '$description', '$information', 'uploads/$image', $type_id, $weight, $feature) "
        );
        return $sql->execute();
    }

    //Viet phuong thuc lay ra san pham theo id
    function getProductByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, protypes WHERE `products`.`type_id` = `protypes`.`type_id` AND `id`=$id ORDER BY id DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // 
    public function updateOneProduct($id, $name, $price, $description, $information, $image, $type_id, $weight, $feature)
    {
        $sql = self::$connection->prepare(
            "UPDATE `products`
            SET
            `name`='$name',`price`=$price,`description`='$description',`information`='$information',`image`='$image',`type_id`=$type_id,`weight`=$weight,`feature`=$feature WHERE `id`=$id "
        );
        return $sql->execute();
    }
}
