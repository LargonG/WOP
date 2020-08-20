<?php 
if (isset($_COOKIE['lighttheme']))
{
    unset($_COOKIE['lighttheme']);
    setcookie('lighttheme', '', time() - 3600, '/');
}
else
    setcookie('lighttheme', '123', time() + 36000, '/'); //на год
header("Refresh: 0;url=http://prohardinf.ru/index.php");
?>