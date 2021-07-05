<?php
class Protype extends Db
{
    //Viet phuong thuc lay ra tat ca hang
    function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // delete mot san pham
    public function delOneProtypeByID($type_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id` = $type_id");
        return $sql->execute();
    }

    // insert mot san pham
    public function insertOneProtype($name, $fileInput)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_id`, `type_name`, `type_img`) VALUES (NULL,'$name','uploads/$fileInput')");
        return $sql->execute();
    }

    //Viet phuong thuc lay ra loai san pham theo id
    function getProtypeByID($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` WHERE `type_id` = $type_id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // UPDATE `protypes` SET `type_id`=[value-1],`type_name`=[value-2],`type_img`=[value-3] WHERE 1
    public function updateOneProtype($type_id, $name, $fileInput)
    {
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`='$name',`type_img`='$fileInput' WHERE  `type_id` = $type_id");
        return $sql->execute();
    }
}
