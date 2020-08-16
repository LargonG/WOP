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

    $token = hash('sha256', rand(1000000, 10000000));
    while (R::findOne('tokens', 'token = ?', array($token)))
      $token = hash('sha256', rand(1000000, 10000000));
    
    $usname = userlogin();
    $last_token = R::findOne("tokens", "username = ?", array($usname));
    if ($last_token)
      R::trash($last_token);
    $bean = R::dispense('tokens');
    $bean->token = $token;
    $bean->username = $usname;
    R::store($bean);
    setcookie("token", $token, time() + (86400 * 30), '/');
    header("Refresh: 0; url=".$_POST['ref']);
  }
  else
  {
    header("Refresh: 0; url=".$_POST['ref']);
  }
?>
