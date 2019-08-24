<?php
  require $_SERVER['DOCUMENT_ROOT'].'/template/login.php';
  if(entered()) {
    setcookie('name', $_POST['usname'], time() + 3600*2);
  }
  header("Refresh:0; url=index.php");
?>
