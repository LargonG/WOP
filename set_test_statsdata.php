<?php
//тестовый скрипт, выполнять на пустой таблице
require $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php';
$user_id = 1;
$months = array("Январь 2020", "Февраль 2020", "Март 2020", "Апрель 2020", "Май 2020");
for ($i = 0; $i < 5; $i++)
{
    $bean = R::dispense('stats'.$user_id);
    $pr = rand(1, 50);
    $bean->month = $months{$i};
    $bean->problemscounter = $pr;
    R::store($bean);
}
echo 'Success';
?>