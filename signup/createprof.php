<?php
    require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
    $issue_el = '';

    if (isset($_POST['sub']))
    {
        $issues = array();
        $login = trim($_POST['usname']);
        $email = trim($_POST['email']);
        $pass = $_POST['pass'];
        $rpass = $_POST['r_pass'];
        $role = $_POST['role'];

        if (strlen($login) == 0)
            $issues[] = 'Логин не может быть пустым.';

        if (strlen($login) < 6)
            $issues[] = 'Длина логина должна быть не меньше 6 символов.';

        if (strripos($login, ' ') != false)
            $issues[] = 'Логин не может содержать пробелов.';

        if (ctype_digit($login))
            $issues[] = 'Логин не может содержать только цифры.';
        
        if ($role == "norole")
            $issues[] = 'Выберите роль.';

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
            $issue_el = $issues[0];
        else
        {
            $user = R::dispense('userlogindata');
            $user->username = $login;
            $user->email = $email;
            $user->password = password_hash($pass, PASSWORD_DEFAULT);
            R::store($user);

            $user = R::dispense('profiledata');
            $user->role = $role;
            $user->showemail = FALSE;
            $user->last_active = time();
            $user->courses = '';
            $user->achievements = '';
            R::store($user);


            $token = hash('sha256', rand(1000000, 10000000));
            while (R::findOne('tokens', 'token = ?', array($token)))
                $token = hash('sha256', rand(1000000, 10000000));
            
            $bean = R::dispense('tokens');
            $bean->token = $token;
            $bean->username = $login;
            R::store($bean);

            setcookie("token", $token, time() + (86400 * 30), '/');
            header("Refresh: 0; url=http://prohardinf.ru/home");
        }
    }
?>
