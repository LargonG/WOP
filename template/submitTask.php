<div class="container-fluid mt-2">
    <form enctype='multipart/form-data' action="/template/testProblem.php" method="POST" onsubmit="document.getElementById('referrer').value=window.location">
        <input type="hidden" id="referrer" name="ref">
        <div class="form-group row">

            <!-- Список языков для сдачи -->
            <div class="col-12 p-0">
                <select name="lang" class="custom-select bg-code text-light">
                    <!-- Тут по идее список должен формироваться через php -->
                    <!--Зачем здесь PHP если список будет фиксированный?-->
                    <option value=".cpp" selected >C++</option>
                    <option value=".java">Java</option>
                    <option value=".c">C</option>
                    <option value=".cs">C#</option>
                </select>
            </div>

            <!-- Поле для вставки кода-->
            <div class="col-12 p-0">
                <textarea wrap="soft | hard" name="code_tarea" class="col-12 bg-code text-light border-0" id="" cols="30" rows="10" placeholder="Введите код здесь или отправьте файл, содержащий решение задачи."></textarea>
            </div>

            <!-- Возможность выбрать файл для сдачи-->
            <div class="custom-file col-lg-3 col-md-4 col">
                <input name="code_file" type="file" class="custom-file-input" id="customFile" accept=".cpp,.c,.java,.cs">
                <label class="custom-file-label" for="customFile">Выберите файл</label>
            </div>

            <!-- Кнопка триггер -->
            <div class="col">
                <button name="sub" type="submit" class="btn text-light bg-code"<?php if (!isset($_COOKIE['name'])) echo ' disabled title="Авторизуйтесь, чтобы отправлять задачи"'; ?>>Отправить</button>
            </div>

        </div>
        
        
    </form>
    
</div>