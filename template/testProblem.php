<?php
if (isset($_POST['sub']))
{
    require_once $_SERVER['DOCUMENT_ROOT']."/database/dbase.php";
    $task_id = explode("/", $_POST['ref'])[count(explode("/", $_POST['ref'])) - 2];
    $submit_id = count(R::getAll("SELECT * FROM submits$task_id")) + 1;
    $code = "lang:".$_POST['lang']."\n"."task_id:$task_id\nsub_id:$submit_id\n".$_POST['code_tarea'];
    $code = str_replace("\n\n", "\n", $code);
    $port = 1337;
    $address = "192.168.50.19"; //здесь будет ip сервака, пока это только мой второй комп

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    if ($socket === false)
        echo "Не удалось выполнить socket_create(): причина: " . socket_strerror(socket_last_error()) . "\n";
    else
        //echo "OK.\n";

    $result = socket_connect($socket, $address, $port);
    if ($result === false)
    {
        echo "Не удалось выполнить socket_connect().\nПричина: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
        // header("Refresh: 0; url=".$_POST['ref']);
    }
    else 
        //echo "OK.\n";

    $data = $code;
    socket_write($socket, $data, strlen($data));
    //echo "sent";

    //while ($out = socket_read($socket, 1024))
        //echo $out;

    socket_close($socket);
    //echo "sock closed";

    $sender_id = R::findOne("userlogindata", "username = ?", array($_COOKIE['name']))->id;

    $bean = R::dispense("submits$task_id");
    $bean->sender_id = $sender_id;
    $bean->lang = $_POST['lang'];
    $bean->status = "Testing";
    $bean->text = $_POST['code_tarea'];
    R::store($bean);

    $bean = R::dispense("usersubmits$sender_id");
    $bean->task_id = $task_id;
    $bean->submit_id = $submit_id;
    $bean->date = date("d.m.Y");
    R::store($bean);
}
header("Refresh: 0; url=".$_POST['ref']);
?>