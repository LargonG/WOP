<?php
require_once $_SERVER['DOCUMENT_ROOT']."/database/dbase.php";
if (isset($_COOKIE['token']))
{
    $username = R::findOne("tokens", "token = ?", array($_COOKIE['token']))->username;
    $user = R::findOne('userlogindata', 'username = ?', array($username));
    $user = R::findOne('profiledata', 'id = ?', array($user->id));
    $user->last_active = time();
    R::store($user);
}
?>
