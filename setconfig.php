<?php
  require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
  function checkpass($user)
  {
      if (!$user)
          return false;
      if (password_verify($_POST['pass'], $user->password))
      {
          $login = $user->username;
          return true;
      }
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

  function userlogin()
  {
    $user = R::findOne('userlogindata', 'username = ?', array($_POST['usname']));
    if (!$user)
      return R::findOne('userlogindata', 'email = ?', array($_POST['usname']))->username;
    return $user->username;
  }

  if(entered())
  {
    setcookie('name', userlogin(), time() + (86400 * 30), '/'); //тебе не кажется, что 30 дней жирновато?
    setcookie('logsuccess', 1, time() + (86400 * 30), '/');
    setcookie('lastenteredlogin', userlogin(), time() + (86400 * 30), '/');
    header("Refresh: 0; url=".$_POST['ref']);
  }
  else
  {
    setcookie('logsuccess', 0, time() + 60, '/');
    setcookie('lastenteredlogin', $_POST['usname'], time() + 60, '/');
    header("Refresh: 0; url=".$_POST['ref']);
  }
?>
