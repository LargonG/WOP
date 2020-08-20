<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/database/dbase.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/setOnline.php";
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/head.html" ?>
    <title>Мои посылки | Мир Олимпиадного Программирования</title>
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/navbar.php" ?>
    <div class="container context mt-2 bg-dark text-light">
        
        <div class="row">
            <?php require $_SERVER["DOCUMENT_ROOT"]."/home/home-nav.html"; ?>
            
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php" ?>
</body>
</html>