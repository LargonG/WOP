<?php
    require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
    
    function check_letters($login)
    {
        $letters = 'qwertyuiopasdfghjklzxcvbnm';
        for ($i = 0; $i < strlen($letters); $i++)
            if (strripos($login, $letters{$i}) != false)
                return true;
        return false;
    }

    function contains_banned_symb($login)
    {
        $permitted = '1234567890qwertyuiopasdfghjklzxcvbnm';
        for ($i = 0; $i < strlen($login); $i++)
            if (strripos($permitted, $login{$i}) == false)
                return true;
        return false;
    }

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

        if (strripos($login, ' ') != false)
            $issues[] = 'Логин не может содержать пробелов.';

        if (!check_letters($login))
            $issues[] = 'Логин не может содержать только цифры.';

        if (contains_banned_symb($login))
            $issues[] = 'Пожалуйста, используйте в логине только цифры и буквы.';

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
            echo '<div style="margin-left: 5vw;">'.$issues[0].'</div><BR>';
        else
        {
            $user = R::dispense('userlogindata');
            $user->username = $login;
            $user->email = $email;
            $user->password = password_hash($pass, PASSWORD_DEFAULT);
            R::store($user);
        }
    }
?>
