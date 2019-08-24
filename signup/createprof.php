<?php
    require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
    if (isset($_POST['sub']))
    {
        $issues = array();
        $login = trim($_POST['usname']);
        $email = trim($_POST['email']);
        $pass = $_POST['pass'];
        $rpass = $_POST['r_pass'];

        if (strlen($login) == 0)
            $issues[] = 'Логин не может быть пустым.';

        if (strlen($login) < 6)
            $issues[] = 'Длина логина должна быть не меньше 6 символов.';

        if (R::findOne('userlogindata', 'username = ?', array($_POST['usname'])))
            $issues[] = 'Такой логин занят. Попробуйте другой.';

        if (strlen($email) == 0)
            $issues[] = 'E-mail не может быть пустым!';

        if (R::findOne('userlogindata', "email = ?", array($email)))
            $issues[] = 'Аккаунт, привязанный к этому E-mail уже существует.';

        if (strlen($pass) < 6)
            $issues[] = 'В целях вашей безопасности, пароль должен не короче 6 символов.';

        if ($pass != $rpass)
            $issues[] = 'Введенные пароли не совпадают!';

        if (!empty($issues))
            echo $issues[0];
        else
        {
            $user = R::dispense('userlogindata');
            $user->username = $login;
            $user->email = $email;
            $user->password = password_hash($pass, PASSWORD_DEFAULT);
            R::store($user);
            echo 'Пользователь '.$login.' был успешно зарегистрирован!';
        }
    }
?>
