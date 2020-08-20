<?php
//не трогать, мое
if (isset($_COOKIE['token'])) {
    unset($_COOKIE['token']);
    setcookie("token", null, -1, '/');
}

if (isset($_COOKIE['logsuccess']))
{
    unset($_COOKIE['logsuccess']);
    setcookie('logsuccess', null, -1, '/');
}

if (isset($_COOKIE['logsuccess']))
{
    unset($_COOKIE['logsuccess']);
    setcookie('logsuccess', null, -1, '/');
}

if (isset($_COOKIE['lighttheme']))
{
    unset($_COOKIE['lighttheme']);
    setcookie('lighttheme', null, -1, '/');
}
header("Refresh: 0; url=http://prohardinf.ru/index.php");
?>