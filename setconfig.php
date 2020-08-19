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

    $alphabet = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLCZXCVBNM[]{}-_=+!@#$%^&*();:\"'\\|/?.,<>";
    $token = "";
    for ($i = 0; $i < 100; $i++)
      $token .= $alphabet[random_int(0, strlen($alphabet) - 1)];
    $token = hash('sha256', $token);
    while (R::findOne('tokens', 'token = ?', array($token)))
    {
      $token = "";
      for ($i = 0; $i < 100; $i++)
          $token .= $alphabet[random_int(0, strlen($alphabet) - 1)];
      $token = hash('sha256', $token);
    }
    
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
