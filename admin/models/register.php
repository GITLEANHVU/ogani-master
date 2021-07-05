<?php
class  Register extends Db {
  function getAllUsers() {
    $sql = self::$connection->prepare("SELECT * FROM `user`");
    $items = array();
    $sql->execute();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items;
  }
  
  function createUser($username, $password, $email) {
    $sql = self::$connection->prepare("INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$username', '$password', '$email')"); 
    return $sql->execute();
  }
}
?>