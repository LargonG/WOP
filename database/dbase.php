<?php
    require $_SERVER['DOCUMENT_ROOT'].'/libs/rb.php';
    R::setup( 'mysql:host=localhost;dbname=wop',
        'root', '' );

    // Данные о зашедшем пользователе
    // Может использоваться во всех файлах, где импортирован данный скрипт
    $_USER = array();
    $_USER["NAME"] = R::findOne("tokens", "token = ?", array($_COOKIE["token"]))->username;
    $_USER["LOGIN_DATA"] = R::findOne("userlogindata", "username = ?", array($_USER["NAME"]));
    $_USER["ID"] = $_USER["LOGIN_DATA"]->id;
    $_USER["PROFILE_DATA"] = R::findOne("profiledata", "id = ?", array($_USER["ID"]));
?>
