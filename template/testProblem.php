<?php
if (isset($_POST['sub']))
{
    $code = "lang:".$_POST['lang']."\n".$_POST['code_tarea'];
    $port = 1337;
    $address = "192.168.50.155"; //здесь будет ip сервака, пока это только мой второй комп

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    if ($socket === false)
        echo "Не удалось выполнить socket_create(): причина: " . socket_strerror(socket_last_error()) . "\n";
    else
        echo "OK.\n";

    $result = socket_connect($socket, $address, $port);
    if ($result === false)
        echo "Не удалось выполнить socket_connect().\nПричина: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    else 
        echo "OK.\n";

    $data = $code;
    socket_write($socket, $data, strlen($data));
    echo "sent";

    while ($out = socket_read($socket, 1024))
        echo $out;

    socket_close($socket);
    echo "sock closed";
}
?>