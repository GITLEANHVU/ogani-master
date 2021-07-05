<?php
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
  setcookie("username", NULL, time() - (86400 * 30), "/");
  setcookie("password", NULL, time() - (86400 * 30), "/");

  if($_COOKIE['username'] === NULL && $_COOKIE['password'] === NULL) {
    header("location:index.php");
  } else {
    header("location:logout.php");
  }
} else {
  header("location:index.php");
}

?>