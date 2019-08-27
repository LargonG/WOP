<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/header.php"; ?>
    <style media="screen">
      .text-content {
        text-align: center;
      }
      .main {
        margin-top: 5vh;
        padding: 15px;
      }
    </style>
  </head>
  <body>
    <div class="navbar header">
      <?php require $_SERVER['DOCUMENT_ROOT'].'/template/header-content.php' ?>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/singin.php'  ?>
    <div class="container main">
      <div class="row">
        <div class="col-12 text-content">
          <h1>Ошибка 404</h1>
          <span style="font-style: italic; color: #939393">Страница не найдена.</span>
        </div>
        <div class="col text-content" style="margin-top:5vh; font-size: 1.2em">
          Если вы зашли на данную страницу, значит файл, который вы искали не существует. Рекомендуем вернуться на <a href="/" style="font-weight: 700">главную страницу</a>.
        </div>
      </div>
    </div>
  </body>
</html>
