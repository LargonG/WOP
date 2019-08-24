<style media="screen">
  .paper-button {
     background: none;
     border: none;
     color: white;
     font-size: 1.2em;
     transition: 0.2s;
  }
  .paper-button:hover {
    color: #555;
  }

  .paper-button {
    outline: 0 !important;
  }

  .paper-button::-moz-focus-inner {
    border: 0;
  }

  .filename-value {
    display: none;
  }
</style>


<div class="row">
  <form class="col" action="/template/paper.php" method="get">
    <input class="filename-value" name="filename" value="<?php echo $_SERVER["DOCUMENT_ROOT"]."/texts/sort-text.php"?>"></input>
    <button class="paper-button" name="to_paper"><h1>Сортировка</h1></button>
  </form>
</div>
