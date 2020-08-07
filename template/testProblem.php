<?php
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
    $code_file = $_FILES['userfile'];
    $problem_id = get_problem_id($prev_page_url);
    $submit_dir = $_SERVER['DOCUMENT_ROOT']."/submits/".$problem_id;
    if (!file_exists($submit_dir))
        mkdir($submit_dir);

    $submit_id = submit_id($submit_dir);
    $submit_dir = $submit_dir."/$submit_id";
    mkdir($submit_dir);

    if (strlen($code_tarea) > 0)
    {
        $file = fopen("$submit_dir/main$file_extension", 'w');
        fwrite($file, $code_tarea);
        fclose($file);
    }
    else
    {
        $code_file['tmp_name'] = "main$file_extension";
        move_uploaded_file($_FILES['path']['tmp_name'], $submit_dir);
        rename($submit_dir."/".$_FILES['path']['name'], "main$file_extension");
    }
    header("Refresh: 0; url=$prev_page_url");
}
?>