<?php if (isset($_COOKIE['lighttheme'])): ?>
<style media="screen">
  .authorised
  {
    text-align: center;
    font-size: 0.7em;
    letter-spacing: 0;
    color: black;
    font-weight: 400;
    text-decoration: none;
    transition: 0.5s;
  }
  .authorised:hover
  {
    text-decoration: none;
    color: #999;
    cursor: pointer;
  }
</style>
<?php else: ?>
<style media="screen">
  .authorised
  {
    text-align: center;
    font-size: 0.7em;
    letter-spacing: 0;
    color: white;
    font-weight: 400;
    text-decoration: none;
    transition: 0.5s;
  }
  .authorised:hover
  {
    text-decoration: none;
    color: #999;
    cursor: pointer;
  }
</style>
<?php endif; ?>

<a href="http://prohardinf.ru" class="navbar-item link">
     WOP
</a>
<?php if (!$_COOKIE['name']): ?>
<div class="navbar-item authorised" onclick="authorise_roll()">
   Вы&nbspиспользуете&nbspгостевой доступ<br>Авторизуйтесь!
</div>
<?php else: ?>
<div class="navbar-item" align=center>
  <?php echo 'Авторизован как <a class="authorised" style="font-size: 1em" href="#">'.$_COOKIE['name'].'</a><br><a class="authorised" href="template/logout.php">Выйти</a><a class="authorised" href="template/change-theme.php">&nbsp;&nbsp;&nbsp;&nbsp;Сменить тему</a>'; ?>
</div>
<?php endif; ?>
