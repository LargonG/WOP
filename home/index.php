<!DOCTYPE html>
<html lang="en">
<head>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/head.html"; ?>
    <link rel="stylesheet" href="style.css">
    <title>Домашняя | Мир олимпиадного программирования</title>
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/navbar.php"; ?>

    <div class="container context mt-2 bg-dark text-light">
        <div class="row">

            <div class="col-2">
                <img src="/imgs/kitten.png" class="rounded mx-auto d-block img-fluid" alt="">
            </div>

            <div class="col-10">
                <div class="nickname h5">
                    $$$KittenProCoder3000$$$
                    <img src="/imgs/online.png" alt="">
                </div>

                <div class="role h6 font-weight-normal">
                    Сэнсей
                </div>
                
                <div class="email h6 font-italic font-weight-normal text-secondary">
                    kitten@catmail.catland
                </div>
            </div>
            
            <div class="col-12 mt-4 stats pt-3">
                <div class="col-12 text-light h3">Stats</div>
            </div>
            
            <div class="col-12 mt-2 pt-3 achievements">
                <div class="col-12 text-light h3">Achievements</div>
            </div>
            
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php"; ?>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/jQueryScripts.html"; ?>
</body>
</html>