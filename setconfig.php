<?php
  require $_SERVER['DOCUMENT_ROOT'].'/template/login.php';
  if(entered()) {
    setcookie('name', $_POST['usname'], time() + (86400 * 30));
  }
  header("Refresh:0; url=index.php");
?>
