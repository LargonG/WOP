<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/header.php' ?>
    <title>Мир олимпиадного программирования</title>
  </head>
  <body>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/navbar.php' ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/main.php" ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php" ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/jQueryScripts.php' ?>
    <script type="text/javascript">
      $('.link_home').addClass('active');
    </script>
  </body>
</html>
