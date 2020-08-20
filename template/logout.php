<?php
if (isset($_COOKIE['token']))
{
    unset($_COOKIE['token']);
    setcookie("token", null, -1, '/');
}
header("Refresh: 0; url=http://prohardinf.ru/index.php");
?>