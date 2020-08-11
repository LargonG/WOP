<?php
    require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
    require $_SERVER['DOCUMENT_ROOT']."/set_online.php";
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
    <script type="text/javascript">
        <?php
        $problem_stats_str = '';
        $problem_stats = R::getAll('SELECT * FROM stats'.$user_userlogindata->id);
        foreach ($problem_stats as $i)
            $problem_stats_str = $problem_stats_str.'['.'\''.$i['month'].'\','.$i['problemscounter'].'],';
        if ($problem_stats_str != ''):
        ?>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([['Month', 'Количество задач'],<?php echo $problem_stats_str; ?>]);
            //график просто как образец, данные нужно получать при помощи php

            var options = {
            title: 'Количество решенных задач',
            titleTextStyle: {
                color: '#ffffff'
            },
            curveType: 'function',
            backgroundColor: '#212122',
            hAxis: {
                format: 'none',
                titleTextStyle: {color: '#ffffff'},
                textStyle: {color: '#ffffff'}
            },
            vAxis: {textStyle: {color: '#ffffff'}}

            };

            var chart = new google.visualization.LineChart(document.getElementById('stats'));

            chart.draw(data, options);
        }
    <?php else: ?>
    <?php endif ?>
    </script>
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT']."/template/navbar.php"; ?>

    <div class="container context mt-2 bg-dark text-light">
        <div class="row">

            <!-- Аватар -->
            <div class="col-md-2 col-sm-12 p-1">
                <div class="row">

                    <!-- Картинка -->
                    <?php
                    if (isset($_POST['sub']) and $_FILES['avatar']['name'] != '')
                    {
                        $av_extenstions = array("jpg", "png", "gif");
                        foreach($av_extenstions as $i)
                        {
                            if (file_exists($_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$i"))
                            {
                                unlink($_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$i");
                                break;
                            }
                        }
                        $avatar_extension = explode(".", $_FILES['avatar']['name'])[count(explode(".", $_FILES['avatar']['name'])) - 1];
                        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$avatar_extension"))
                        {
                            //echo "File uploaded";
                        }
                        else
                        {
                            //echo "No file";
                        }

                        //rename($_SERVER['DOCUMENT_ROOT']."/avatars/".$_FILES['uploadFile']['name'], $_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$avatar_extension");

                        //обрезка до квадрата относительно центра
                        $im = null;
                        if ($avatar_extension == "jpg" or $avatar_extension == "jpeg")
                            $im = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$avatar_extension");
                        if ($avatar_extension == "png")
                            $im = imagecreatefrompng($_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$avatar_extension");
                        if ($avatar_extension == "gif")
                            $im = imagecreatefromgif($_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$avatar_extension");
                        $size = min(imagesx($im), imagesy($im));
                        $x = (imagesx($im) - $size) / 2;
                        $y = (imagesy($im) - $size) / 2;
                        $im2 = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                        if ($im2 !== FALSE)
                        {
                            imagepng($im2, $_SERVER['DOCUMENT_ROOT']."/avatars/$user_userlogindata->id.$avatar_extension");
                            imagedestroy($im2);
                        }
                        imagedestroy($im);
                    }
                    ?>
                    <div class="col-12">
                        <img src=
                        <?php
                        if (file_exists($_SERVER['DOCUMENT_ROOT']."/avatars/".$user_userlogindata->id.".jpg"))
                            echo "\""."/avatars/".$user_userlogindata->id.".jpg"."\"";
                        else if (file_exists($_SERVER['DOCUMENT_ROOT']."/avatars/".$user_userlogindata->id.".png"))
                            echo "\""."/avatars/".$user_userlogindata->id.".png"."\"";
                        else if (file_exists($_SERVER['DOCUMENT_ROOT']."/avatars/".$user_userlogindata->id.".gif")) 
                            echo "\""."/avatars/".$user_userlogindata->id.".gif"."\"";
                        else echo "/imgs/default_avatar.jpg"; ?>
                        class="rounded mx-auto d-block img-fluid" alt="аватарка">
                    </div>

                    <!-- Возможность поменять картинку -->
                    <div class="col-12 mt-2">
                        <form class="form-group" enctype="multipart/form-data" action="" method="POST">
                            
                        <!-- Ввод файла-->
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="avatarFile" accept=".png,.jpg,.gif">
                                <label class="custom-file-label" for="avatarFile">Сменить</label>
                            </div>
                            
                            <!-- Кнопка "Изменить" -->
                            <button class="btn btn-primary form-control mt-1" name="sub" type="submit">Изменить</button>
                        </form>
                    </div>

                </div>
            </div>
            
            
            <!-- Никнейм -->
            <div class="col-md-10 col-sm-12 p-1">
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
            
            <!-- Статистика по задачам -->
            <div class="col-12 mt-4 pt-3">
                <div class="row align-items-center stats" id="stats">
                    <div class="col-12 text-light h3 text-center">Нет данных по решенным задачам</div>
                </div>
            </div>

            <!-- Ачивки -->
            <div class="col-12 mt-2 pt-3 achievements">
                <div class="col-12 text-light h3 text-left">Ачивки</div>
            </div>
            
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php"; ?>
</body>
</html>