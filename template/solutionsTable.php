<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
$user_submits = array();
if (isset($_USER))
{
    $user_submits = array_reverse(R::find("submits$problem_id", "sender_id = ?", array($_USER["id"])));
    $problem_title = R::findOne("problems", "id = ?", array($problem_id))->title;
}
if (count($user_submits) != 0):
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
            $submit_date = R::findOne("usersubmits".$_USER["id"], "submit_id = ? and task_id = ?", array($i->id, $problem_id))->date;
            $languages = array("cpp" => "C++", "java" => "Java", "c" => "C", "cs" => "C#");
            $max_memory = $i->maxmem / 1024;

            if ($i->maxtime >= 1000)
                $max_time = round((float)($i->maxtime / 1000), 2)." сек";
            else
                $max_time = $i->maxtime." мс";

            if ($max_memory >= 1024)
                $max_memory = ($max_memory / 1024)." Мбайт";
            else
                $max_memory .= " Кбайт";

            if ($i->status == "Testing")
                $submit_status = "Тестируется...";
            else
                $submit_status = $i->status;
            ?>
            <td score="row"><a class="text-primary" href="#"><?php echo $i->id; ?></a></td>
            <td><?php echo $submit_date; ?></td>
            <td><a class="text-primary" href="#"><?php echo $problem_title; ?></a></td>
            <td><?php echo $languages[$i->lang]; ?></td>
            <td style="color: <?php if ($submit_status == "OK") echo "mediumseagreen;"; else if ($submit_status == "Тестируется...") echo "lemonchiffon;"; else echo "crimson;"; ?>" title="<?php if ($submit_status != "OK" and $submit_status != "Тестируется...") {$report_exp = array("WA" => "Неправильный ответ на ", "TL" => "Превышено время выполнения на ", "ML" => "Превышено ограничение по памяти на "); $sub_split = explode(" ", $submit_status); echo $report_exp[$sub_split[0]].$sub_split[1]." тесте";} else echo $submit_status;?>"><?php echo $submit_status; ?></td>
            <?php if ($i->status != "Testing" && $i->status != "CE"): ?>
            <td><?php echo $max_time; ?></td>
            <td><?php echo $max_memory; ?></td>
            <?php else: ?>
            <td>-</td>
            <td>-</td> 
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php endif; ?>