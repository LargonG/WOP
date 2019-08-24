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
</style>


<div class="row">
  <div class="col">
    <form action="/template/paper.php" method="get">
      <input style="display:none;" name="filename" value="<?php echo $_SERVER["DOCUMENT_ROOT"]."/texts/graph.php" ?>"></input>
      <button class="paper-button" name="to_paper">Графы</button>
    </form>
  </div>
  <div class="col">
    <form action="/template/paper.php" method="get">
      <input style="display:none;" name="filename" value="<?php echo $_SERVER["DOCUMENT_ROOT"]."/texts/321.php" ?>"></input>
      <button class="paper-button" name="to_paper">Теория чисел</button>
  </form>
  </div>
  <div class="col">
    <form action="/template/paper.php" method="get">
      <input style="display:none;" name="filename" value="<?php echo $_SERVER["DOCUMENT_ROOT"]."/texts/123.php" ?>"></input>
      <button class="paper-button" name="to_paper">Комбинаторика</button>
  </form>
  </div>
</div>
