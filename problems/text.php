<?php require_once $_SERVER['DOCUMENT_ROOT'].'/database/dbase.php'; ?>
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
    
    <!-- Попытки -->
    <tbody>
        <!-- Сюда вставляем попытки-->

        <!-- Экземпляр -->
        <tr>
            <td score="row"><a class="text-primary" href="1/">1</a></td>
            <td><a class="text-primary" href="1/">A + B</a></td>
            <td>1337</td>
            <td></td>
        </tr>
        <tr>
            <td score="row"><a class="text-primary" href="2/">2</a></td>
            <td><a class="text-primary" href="2/">Гарри Поттер на озере</a></td>
            <td>5234</td>
            <td></td>
        </tr>
        <tr>
            <td score="row"><a class="text-primary" href="3/">3</a></td>
            <td><a class="text-primary" href="3/">Гарри Поттер в магазине</a></td>
            <td>41532</td>
            <td></td>
        </tr>
        <tr>
            <td score="row"><a class="text-primary" href="4/">4</a></td>
            <td><a class="text-primary" href="4/">Вызов принят</a></td>
            <td>43</td>
            <td></td>
        </tr>
    </tbody>

</table>