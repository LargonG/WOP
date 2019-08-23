<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require 'templates/header.php' ?>
  </head>
  <body>
    <div class="navbar header">
      <?php require "templates/header-content.php" ?>
    </div>
    <?php require "templates/singin.php" ?>
    <div class="container context">
      <div class="row">
        <div class="col-8 main">
          <?php require "texts/algo-text.php" ?>
        </div>
        <div class="col sidebar">
          <?php require "templates/nav.php" ?>
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
    <?php require "templates/jQueryScripts.php" ?>
  </body>
</html>
