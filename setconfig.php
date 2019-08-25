<?php
  require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
  function checkpass($user)
  {
      if (!$user)
          return false;
      if (password_verify($_POST['pass'], $user->password))
          return true;
      else
          return false;
  }

  function entered()
  {
      $usname = trim($_POST['usname']);
      $pass = $_POST['pass'];

      if ($usname != '')
      {
          $user = R::findOne('userlogindata', 'username = ?', array($_POST['usname']));
          if (!$user) {
            return checkpass(R::findOne('userlogindata', 'email = ?', array($_POST['usname'])));
          }
          else
            return checkpass($user);
      }
  }
  if(entered()) {
    setcookie('name', $_POST['usname'], time() + (86400 * 30)); //тебе не кажется, что 30 дней жирновато?
    setcookie('logsuccess', 1, time() + (86400 * 30));
  }
  else
    setcookie('logsuccess', 0, time() + 60);
  header("Refresh:0; url=index.php");
?>
