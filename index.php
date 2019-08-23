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
    </div>
    <div class="container context">
      <div class="row">
        <div class="col-8 main">
          <?php require "texts/welcome-text.php" ?>
        </div>
        <div class="col sidebar">
          <?php require "template/nav.php" ?>
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
