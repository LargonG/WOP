<?php

// все заменить на сокеты

require_once $_SERVER['DOCUMENT_ROOT']."/database/dbase.php";
function submit_id($dir)
{
    $counter = 1;
    while (file_exists($dir."/".$counter))
        $counter++;
    return $counter;
}

function get_problem_id($url)
{
    $divided = explode("/", $url);
    return $divided[count($divided) - 2];
}

if (isset($_POST['sub']))
{
    $prev_page_url = $_POST['ref'];
    $file_extension = $_POST['lang'];
    $code_tarea = $_POST['code_tarea'];
    if (strlen($code_tarea) == 0)
    {
        header("Refresh: 0; url=$prev_page_url");
        return;
    }
    $problem_id = get_problem_id($prev_page_url);
    $submit_dir = $_SERVER['DOCUMENT_ROOT']."/submits/".$problem_id;
    echo $_FILES['userfile']['tmp_name'];
    if (!file_exists($submit_dir))
        mkdir($submit_dir);

    $submit_id = submit_id($submit_dir);
    $submit_dir = $submit_dir."/$submit_id";
    mkdir($submit_dir);

    if (strlen($code_tarea) > 0)
    {
        $file = fopen("$submit_dir/main.$file_extension", 'w');
        fwrite($file, $code_tarea);
        fclose($file);

        $file = fopen($_SERVER['DOCUMENT_ROOT']."/testengine.cfg", 'w');
        $config = "task_id: $problem_id\nsubmit_id: $submit_id\nlang: $file_extension\n";
        fwrite($file, $config);
        fclose($file);

        $user = R::findOne('userlogindata', 'username = ?', array($_COOKIE['name']));
        $user_id = $user->id;
        $bean = R::dispense("submits$user_id");
        $bean->problem_id = $problem_id;
        $bean->submit_id = $submit_id;
        $bean->lang = $file_extension;
        $bean->report = "Testing";
        R::store($bean);
        setcookie("last_submit", $problem_id, time() + (86400 * 30), "/");
        header("Refresh: 0; url=/launch.php");
    }
    /*else
    {
        move_uploaded_file($_FILES['path']['tmp_name'], $submit_dir);
        //rename($submit_dir."/".$_FILES['path']['name'], "main$file_extension");
    }*/
}
?>