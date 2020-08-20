<?php
$divided = explode("\\", __DIR__);
$problem_id = $divided[count($divided) - 1];
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/head.html' ?>
    <link rel="stylesheet" href="/css/papers-style.css">
    <link rel="stylesheet" href="/css/code-style.css">
    <link rel="stylesheet" href="/css/task-style.css">
    <title>Гарри Поттер на озере</title>
  </head>
  <body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/setOnline.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/navbar.php' ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/problem.php" ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php" ?>
  </body>
</html>
