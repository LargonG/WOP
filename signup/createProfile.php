<?php
    require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
    $issues = array();

    if (isset($_POST['sub']))
    {
        $issues = array();
        $login = trim($_POST['usname']);
        $email = trim($_POST['email']);
        $pass = $_POST['pass'];
        $rpass = $_POST['r_pass'];
        $role = $_POST['role'];

        if (strlen($login) == 0)
            $issues["login-error"] = 'Логин не может быть пустым.';
        else if (strlen($login) < 6)
            $issues["login-error"] = 'Длина логина должна быть не меньше 6 символов.';
        else if (strripos($login, ' ') != false)
            $issues["login-error"] = 'Логин не может содержать пробелов.';
        else if (ctype_digit($login))
            $issues["login-error"] = 'Логин не может содержать только цифры.';
        else if (R::findOne('userlogindata', 'username = ?', array($_POST['usname'])))
            $issues["login-error"] = 'Такой логин занят. Попробуйте другой.';

        if ($role == "norole")
            $issues["role-error"] = 'Выберите роль.';

        if (strlen($email) == 0)
            $issues["email-error"] = 'E-mail не может быть пустым!';
        else if (R::findOne('userlogindata', "email = ?", array($email)))
            $issues["email-error"] = 'Аккаунт, привязанный к этому E-mail уже существует.';

        if (strlen($pass) < 6)
            $issues["password-error"] = 'В целях вашей безопасности, пароль должен быть не короче 6 символов.';
        else if ($pass != $rpass)
            $issues["password-repeat-error"] = 'Введенные пароли не совпадают!';

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
            
            $bean = R::dispense('tokens');
            $bean->token = $token;
            $bean->username = $login;
            R::store($bean);

            setcookie("token", $token, time() + (86400 * 30), '/');
            header("Refresh: 0; url=http://prohardinf.ru/home");
        }
    }
?>
