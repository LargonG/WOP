<!-- АДМИНСКИЙ ФАЙЛ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bruh</title>
</head>
<body>
<?php
    if (isset($_POST["sub"]) and $_POST["name"] != "")
    {
        require $_SERVER['DOCUMENT_ROOT']."/database/dbase.php";
        $problem = R::dispense("problems");
        $problem->title = $_POST['name'];
        R::store($problem);
        echo "Задача отправлена";
    }
    ?>
    <form action="addproblem.php" method="POST">
        <input type="text" placeholder="Название задачи" name="name">
        <button type="submit" name="sub">Отправить</button>
    </form>
</body>
</html>