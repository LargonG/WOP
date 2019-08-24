<?php
  if(!isset($_SESSION)) {
     session_start();
  }
  if($_SESSION['name']) {
    setcookie('name', $_SESSION['name'], time() + (86400 * 30));
  }
?>
