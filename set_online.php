<?php
require $_SERVER['DOCUMENT_ROOT']."/database/dbase.php";
if (isset($_COOKIE['name']))
{
    $user = R::findOne('userlogindata', 'username = ?', array($_COOKIE['name']));
    $user = R::findOne('profiledata', 'id = ?', array($user->id));
    $user->last_active = time();
    R::store($user);
}
?>