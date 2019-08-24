<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/header.php' ?>
    <!-- скрипт ниже не работает(((-->
    <script>
        function delspace()
        {
            var s = document.getElementById('log').value;
            //alert(s);
            if (s.slice(-1) == ' ')
                s.slice(0, -1);
            document.getElementById('log').value = s;
        }
    </script>
  </head>
  <body>
    <div class="navbar header">
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
  }
  h2
  {
    margin-top: 1vh;
  }
  .authinput
  {
    background: rgb(60,60,60);
    border: none;
    color: white;
    font-size: 1em;
    height: 2em;
    font-weight: 600;
    padding: 5px;
    margin-left: 5vw;
    border-radius: 10px;
    margin-right: 10px;
  }
  .authbutton
  {
    background: rgb(60,60,60);
    color: white;
    font-size: 1em;
    font-weight: 600;
    border: none;
    border-radius: 10px;
    margin-left: 7vw;
    padding: 0.3em;
  }
  .qm
  {
    cursor: pointer;
    margin-left: 7px;
  }
  .smtext
  {
    transition: 0.5s;
    font-size: 0.7em;
  }
  </style>

<a href="http://worldofop.ru" class="navbar-item link">
     WOP
  </a>
    </div>
    <div class="container context">
      <div class="row">
        <div class="col regwind">
          <h2 align=center>Создание профиля</h2>
          <h4 align=center>Маленькое начало большого пути</h4><br><br>
          <?php require 'createprof.php'; ?>
          <form action='index.php' method='POST'>
            <input class="authinput" type="text" name="usname" value="<?php echo @$_POST['usname']; ?>" placeholder="Логин" id="log" pattern="^[a-zA-Z0-9]+$"><span class="qm"><img src="qm.png" onmouseover="document.getElementById('q1').style.opacity='100';" onkeyup="delspaces();" onmouseout="document.getElementById('q1').style.opacity='0';"></span><span class="smtext" style="opacity: 0" id="q1"> Логин необходим для авторизации. Также он будет виден другим пользователям.</span><BR><BR>
            <input class="authinput" type="text" name="email" value="<?php echo @$_POST['email']; ?>" placeholder="E-mail" pattern="^[a-zA-Z0-9]+$\@[a-zA-Z]+$\.[a-zA-Z]+$"><span class="qm"><img src="qm.png" onmouseover="document.getElementById('q2').style.opacity='100';" onmouseout="document.getElementById('q2').style.opacity='0';"></span><span class="smtext" style="opacity: 0" id="q2"> Ваш E-mail нужен для восстановления аккаунта, при утере его логина или пароля.</span><BR><BR>
            <input class="authinput" type="password" name="pass" placeholder="Пароль"><BR><br>
            <input class="authinput" type="password" name="r_pass" placeholder="Повторите пароль"><BR><br>
            <button class="authbutton" type="submit" name="sub">Создать профиль</button>
          </form>
      </div>
    </div>
  </body>
</html>