<?php
if(isset($_COOKIE['username_admin']) && isset($_COOKIE['password_admin']))
{
  setcookie("username_admin", NULL, time() - (86400 * 30), "/");
  setcookie("password_admin", NULL, time() - (86400 * 30), "/");

  // echo "<script>alert('Logout thành công !');</script>";

  if($_COOKIE['username_admin'] === NULL && $_COOKIE['password_admin'] === NULL) {
    header("location:index.php");
  } else {
    header("location:logout.php");
  }
} else {
  // echo "<script>alert('Logout không thành công!');</script>";
  header("location:login.php");
}

?>