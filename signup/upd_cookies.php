<?php
setcookie('name', $_POST['usname'], time() + (86400 * 30), '/'); //тебе не кажется, что 30 дней жирновато?
setcookie('logsuccess', 1, time() + (86400 * 30), '/');
setcookie('lastenteredlogin', $_POST['usname'], time() + (86400 * 30), '/');
header("Refresh: 0; url=http://worldofop.ru");
?>