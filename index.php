<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require 'template/header.php' ?>
  </head>
  <body>
    <div class="navbar header">
    <a href="index.php" class="navbar-item link">
         WOP
      </a>
      <a href="#" class="navbar-item authorised" onclick="authorise_roll()">
         Вы&nbspиспользуете&nbspгостевой доступ<br>Авторизуйтесь!
      </a>
    </div>
    <div id="authorisewindow">
    <div style="text-align: center">Авторизация</div>
    <br>
      <input type="text" class="authinput" placeholder="Логин или email">
      <br><br>
      <input type="password" class="authinput" placeholder="Пароль">
      <br><br>
      <div style="width: 100%" align=center>
        <button class="authbutton">Войти</button>
      </div>
      <br>
      <div class="smalltext">Первый&nbspраз&nbspздесь?<br><br><a href="/register" class="smalllink">Создайте&nbspпрофиль</a> прямо&nbspсейчас!</div>
    </div>
    <script>authorise_roll();</script>
    <div class="container context">
      <div class="row">
        <div class="col-8 main">
          <?php require "texts/welcome-text.php" ?>
        </div>
        <div class="col sidebar">
          <?php require "template/nav.php"?>
        </div>
      </div>
    </div>
    <div class="container footer">
      <div class="row">
        <div class="col">
          FOOTER
        </div>
      </div>
    </div>
    <?php require "template/jQueryScripts.php" ?>
  </body>
</html>
