<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="программирование, олимпиады, олимпиадное программирование, алгритмы">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="http://prohardinf.ru/imgs/tablogo.png">
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<?php if (!isset($_COOKIE['lighttheme'])): ?>
<style media="screen">
  html, body {
    margin: 0;
    padding: 0;
    color: white;
    background: #111116;
    font: 400 1.2em 'Source Sans Pro';
    scrollbar-face-color: #999;
    scrollbar-track-color: #333336;
  }
  .link {
    font-size: 2em;
    font-weight: 1000;
    margin-left: 5%;
  }

  a {
    color: white;
    transition: 0.5s;
  }
  a:hover {
    color: #555;
    text-decoration: none;
  }

  .header {
    background: #222;
    z-index: 9999999;
  }
  .context {
    margin-top: 1vh;
  }

  .main {
    min-height: 70vh;
    background: #222226;
    z-index: 9999;
    overflow-x: hidden;
  }

  .sidebar {
    margin-left: 1vh;
    background: #222;
    max-height: 90vh;
  }

  .footer {
    margin-top: 1vh;
    min-height: 21vh;
    background: #222;
  }

  .regwind
  {
    min-height: 70vh;
    margin-top: 5vh;
    background: #222226;
    width: 50%;
  }
  ::-webkit-scrollbar {
    width: 0.5em;
  }

  ::-webkit-scrollbar-thumb {
      background: #999;
  }

  ::-webkit-scrollbar-track {
      background: #333336;
  }
  ::selection
  {
    background: rgb(160, 160, 160);
  }
  ::-moz-selection:
  {
    background: rgb(160, 160, 160);
  }
</style>

<?php else: ?>

<style media="screen">
  html, body {
    margin: 0;
    padding: 0;
    color: #000;
    background: #ffffff;
    font: 400 1.2em 'Source Sans Pro';
    scrollbar-face-color: #999;
    scrollbar-track-color: #333336;
  }
  .link {
    font-size: 2em;
    font-weight: 1000;
    margin-left: 5%;
  }

  a {
    color: #000;
    transition: 0.5s;
  }
  a:hover {
    color: #999;
    text-decoration: none;
  }

  .header {
    background: #eee;
    z-index: 9999999;
  }
  .context {
    margin-top: 1vh;
  }

  .main {
    min-height: 70vh;
    background: #eee;
    z-index: 9999;
    overflow-x: hidden;
  }

  .sidebar {
    margin-left: 1vh;
    background: #eee;
    max-height: 90vh;
  }

  .footer {
    margin-top: 1vh;
    min-height: 21vh;
    background: #eee;
  }

  .regwind
  {
    min-height: 70vh;
    margin-top: 5vh;
    background: #fff;
    width: 50%;
  }
  ::-webkit-scrollbar {
    width: 0.5em;
  }

  ::-webkit-scrollbar-thumb {
      background: #999;
  }

  ::-webkit-scrollbar-track {
      background: #333336;
  }
  ::selection
  {
    background: rgb(160, 160, 160);
  }
  ::-moz-selection:
  {
    background: rgb(160, 160, 160);
  }
</style>
<?php endif; ?>
