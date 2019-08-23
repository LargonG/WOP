<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require 'template/header.php' ?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col header">
          HEADER
        </div>
      </div>
    </div>
    <div class="container context">
      <div class="row">
        <div class="col-8 main">
          CONTENT
        </div>
        <div class="col sidebar">
          SIDEBAR
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
