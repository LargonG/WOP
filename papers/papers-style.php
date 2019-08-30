<style media="screen">
  .main {
    padding: 0;
  }

  .text, .code {
    padding-left: 15px;
    padding-right: 15px;
  }

  .code {
    background: #232323;
    box-sizing: border-box;
    border-top: 1px solid #333336;
    border-bottom: 1px solid #333336;
    color: orange;
  }

  .code code {
    white-space: pre-wrap;
    color: inherit;
  }

</style>

<?php if (isset($_COOKIE['lighttheme'])): ?>
  <style media="screen">
    .code {
      background: #d4d4d9;
      border-top-color: #ddd;
      border-bottom-color: #ddd;
      color: #343434;
    }
  </style>
<?php endif ?>
