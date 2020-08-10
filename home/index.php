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
                    <div class="col-12">
                        <img src=<?php $path = $_SERVER['DOCUMENT_ROOT']."/avatars/".$nickname.'.jpg'; if (file_exists($path)) echo "\""."/avatars/".$nickname.".jpg"."\""; else echo "/imgs/default_avatar.jpg"; ?>
                        class="rounded mx-auto d-block img-fluid" alt="аватарка">
                    </div>

                    <!-- Возможность поменять картинку -->
                    <div class="col-12 mt-2">
                        <form class="form-group" action="">
                            
                        <!-- Ввод файла-->
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatarFile" accept=".png,.jpg,.gif">
                                <label class="custom-file-label" for="avatarFile">Сменить</label>
                            </div>
                            
                            <!-- Кнопка "Изменить" -->
                            <button class="btn btn-primary form-control mt-1" type="submit">Изменить</button>
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
                <div class="col-12 text-light h3 text-left">Achievements</div>
            </div>
            
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT']."/template/footer.php"; ?>
</body>
</html>