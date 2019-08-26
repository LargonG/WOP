<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/header.php' ?>
    <title>Мир олимпиадного программирования</title>
  </head>
  <body>
    <div class="navbar header">
      <?php require $_SERVER['DOCUMENT_ROOT'].'/template/header-content.php' ?>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/singin.php' ?>
    <div class="container context">
      <div class="row">
        <div class="col-md-8 col-12 main">
          <?php require $_SERVER['DOCUMENT_ROOT'].'/texts/welcome-text.php' ?>

        </div>
        <div class="col sidebar">
          <?php require $_SERVER['DOCUMENT_ROOT'].'/template/nav.php'?>
        </div>
      </div>
    </div>
    <div class="container footer">
      <div class="row" style="padding: 10px;">
        <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer-content.php"; ?>
      </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/jQueryScripts.php' ?>
  </body>
</html>
