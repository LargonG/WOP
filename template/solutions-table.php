<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
if (isset($_COOKIE['token']))
{
    $username = R::findOne('tokens', 'token = ?', array($_COOKIE['token']))->username;
    $user_id = R::findOne("userlogindata", "username = ?", array($username))->id;
    $user_submits = R::find("submits$problem_id", "sender_id = ?", array($user_id));
}

if (isset($username)):
?>
<table class="table bg-black table-dark table-hover">
    
    <!-- Заголовки -->
    <thead>
        <tr>
            <th score="col">ID</th>
            <th score="col">Дата</th>
            <th score="col">Задача</th>
            <th score="col">Язык</th>
            <th score="col">Вердикт</th>
            <th score="col">Макс. время</th>
            <th score="col">Макс. память</th>
        </tr>
    </thead>
    
    <!-- Попытки -->
    <tbody>
        <!-- Сюда вставляем попытки-->
        <?php foreach ($user_submits as $i): ?>
        <tr>
            <?php
            $submit_date = R::findOne("usersubmits$user_id", "submit_id = ? and task_id = ?", array($i->id, $problem_id))->date;
            $languages = array("cpp" => "C++", "java" => "Java", "c" => "C", "cs" => "C#");
            $max_memory = $i->maxmem / 1024;
            if ($i->maxtime >= 1000)
                $max_time = round((float)($i->maxtime / 1000), 2)." s";
            else
                $max_time = $i->maxtime." ms";
            ?>
            <td score="row"><a class="text-primary" href="#"><?php echo $i->id; ?></a></td>
            <td><?php echo $submit_date; ?></td>
            <td><a class="text-primary" href="#">A + B</a></td>
            <td><?php echo $languages[$i->lang]; ?></td>
            <td><?php echo $i->status; ?></td>
            <?php if ($i->status != "Testing"): ?>
            <td><?php echo $max_time; ?></td>
            <td><?php echo $max_memory; ?> KB</td>
            <?php else: ?>
            <td>-</td>
            <td>-</td> 
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php endif; ?>