<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/head.html' ?>
    <title>Задачи | Мир олимпиадного программирования</title>
  </head>
  <body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/setOnline.php";?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/navbar.php' ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/main.php" ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php" ?>
    <script type="text/javascript">
      $('.link_tasks').addClass('active');
      $(".main").removeClass("p-3").addClass("p-0");
    </script>
  </body>
</html>
