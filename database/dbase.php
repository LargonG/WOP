<?php
    require $_SERVER['DOCUMENT_ROOT'].'/libs/rb.php';
    R::setup( 'mysql:host=localhost;dbname=wop',
        'root', '' );

    // Данные о зашедшем пользователе
    // Ключи к этим данным такие же как и столбцы в таблицах userlogindata и profiledata
    // Может использоваться во всех файлах, где импортирован данный скрипт
    if (isset($_COOKIE["token"])) 
    {
        $userlogindata = R::findOne("userlogindata", "username = ?", array(R::findOne("tokens", "token = ?", array($_COOKIE["token"]))->username));
        $userprofiledata = R::findOne("profiledata", "id = ?", array($userlogindata->id));
        $_USER = array(
            "id" => $userlogindata->id,
            "username" => $userlogindata->username,
            "email" => $userlogindata->email,
            "role" => $userprofiledata->role,
            "showemail" => $userprofiledata->showemail,
            "last_active" => $userprofiledata->last_active,
            "achievements" => $userprofiledata->achievements
        );
        unset($userlogindata, $userprofiledata);
    }
?>
