<?php
    function checkpass($user)
    {
        if (!$user)
        {
            $req_ans = 'Неверный логин или пароль. Повторите попытку входа!';
            return $req_ans;
        }
        if (password_verify($_POST['pass'], $user->password))
        {
            $req_ans = 'Авторизация успешна!';
            $_SESSION['name'] = $_POST['usname'];
            return $req_ans;
        }
        else
        {
            $req_ans = 'Неверный логин или пароль. Повторите попытку входа!';
            return $req_ans;
        }
    }
    require 'dbase.php';
    if (isset($_POST['sub']))
    {
        $usname = trim($_POST['usname']);
        $pass = $_POST['pass'];

        if (usname == '')
            echo 'Неверный логин или пароль. Повторите попытку входа!';

        else
        {
            $user = R::findOne('userlogindata', 'username = ?', array($_POST['usname']));
            if (!$user)
                echo checkpass(R::findOne('userlogindata', 'email = ?', array($_POST['usname'])));
            else
                echo checkpass($user);
        }
    }
?>
