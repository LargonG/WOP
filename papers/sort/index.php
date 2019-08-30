<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/header.php" ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/papers/papers-style.php" ?>
  </head>
  <body>
    <div class="navbar header">
      <?php require $_SERVER['DOCUMENT_ROOT']."/template/header-content.php" ?>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/singin.php' ?>
    <div class="container-fluid context">
      <div class="row">
        <div class="col">

        </div>
        <div class="col-xl-9 col-12 main">
          <?php include $_SERVER['DOCUMENT_ROOT']."/texts/sort-text.php" ?>
        </div>
        <div class="col-xl-2 col sidebar">
          <?php require $_SERVER['DOCUMENT_ROOT']."/template/nav.php" ?>
        </div>
      </div>
    </div>
    <div class="col-12 footer">
      <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer-content.php"; ?>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/jQueryScripts.php' ?>
  </body>
</html>
