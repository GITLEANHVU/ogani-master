<?php
  class Login extends Db {
    // Lay toan bo user = 2 xuong
    function getAllUsers(){
      $sql = self::$connection->prepare("SELECT * FROM `user` WHERE role_id = 2");
      $sql->execute();//return an object
      $items = array();
      $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
      return $items; //return an array
  }

      // Lay toan bo admin = 1 xuong
      function getAllAdmins(){
        $sql = self::$connection->prepare("SELECT * FROM `user` WHERE role_id = 1");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

  // function checkLoginUser($username, $password) {
  //   $sql = self::$connection->prepare(
  //     "SELECT * FROM `user`
  //     WHERE
  //     `user`.`username` = $username
  //     AND
  //     `user`.`password` = $password");
  //   $sql->execute();//return an object
  //   $items = array();
  //   $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
  //   return $items; //return an array
  // }
 

}
?>