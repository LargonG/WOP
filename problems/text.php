<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
if (isset($_GET['page']))
    $page_number = $_GET['page'];
else
    $page_number = 1;
$problems = R::find("problems", "id > ? AND id <= ?", array(($page_number - 1)*100, 100*$page_number));
?>
<table class="table table-dark bg-dark table-hover table-striped table-sm m-0">

    <!-- Заголовки -->
    <thead>
        <tr>
            <th score="col">№</th>
            <th score="col">Название</th>
            <th score="col">Кол-во решений</th>
            <th score="col">*</th>
        </tr>
    </thead>
    
    <!-- Задачи -->
    <tbody>

        <!-- Экземпляр -->
        <?php foreach ($problems as $i): ?>
        <tr>
            <td score="row"><a class="text-primary" href="<?php echo $i->id; ?>/"><?php echo $i->id; ?></a></td>
            <td><a class="text-primary" href="<?php echo $i->id; ?>/"><?php echo $i->title; ?></a></td>
            <td><?php echo count(R::find("submits$i->id", "status = \"OK\"")); ?></td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>