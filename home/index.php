<?php
    require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
    $nickname = $_COOKIE['name'];
    $user_userlogindata = R::findOne('userlogindata', 'username = ?', array($nickname));
    $user_profiledata = R::findOne('profiledata', 'id = ?', array($user_userlogindata->id));
    if ($user_profiledata->showemail)
        $email = $user_userlogindata->email;
    else
        $email = "Эл. почта скрыта";
    $role = $user_profiledata->role;
    $is_online = ((time() - $user_profiledata->last_active) < 3 * 60);
?>
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
                <img src=<?php $path = $_SERVER['DOCUMENT_ROOT']."/avatars/".$nickname.'.jpg'; if (file_exists($path)) echo "\""."/avatars/".$nickname.".jpg"."\""; else echo "/imgs/default_avatar.jpg"; ?> class="rounded mx-auto d-block img-fluid" width=150 height=150 alt="">
            </div>

            <div class="col-10">
                <div class="nickname h5">
                    <?php echo $nickname; if ($is_online) echo '<img src="/imgs/online.png" width=17 height=17 alt="" style="margin-left: 10px;" title="Онлайн">'; ?>
                </div>

                <div class="role h6 font-weight-normal">
                    <?php if ($role == student) echo "Ученик"; else echo "Преподаватель"; ?>
                </div>
                
                <div class="email h6 font-italic font-weight-normal text-secondary">
                    <?php echo $email; ?>
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