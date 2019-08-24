<?php
    function checkpass($user)
    {
        if (!$user)
        {
            return false;
        }
        if (password_verify($_POST['pass'], $user->password))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    require 'dbase.php';
    function entered()
    {
        $usname = trim($_POST['usname']);
        $pass = $_POST['pass'];

        if (usname != '')
        {
            $user = R::findOne('userlogindata', 'username = ?', array($_POST['usname']));
            if (!$user) {
              return checkpass(R::findOne('userlogindata', 'email = ?', array($_POST['usname'])));
            }
            else
              return checkpass($user);
        }
    }
?>
