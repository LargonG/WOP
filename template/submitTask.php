<?php if (isset($_COOKIE['token'])) $username = R::findOne('tokens', 'token = ?', array($_COOKIE['token']))->username; ?>
<div class="container-fluid mt-2">
    <form enctype='multipart/form-data' action="/template/testProblem.php" method="POST" onsubmit="document.getElementById('referrer').value=window.location">
        <div class="form-group row">
            <?php if (isset($username)): ?>
            <input type="hidden" id="referrer" name="ref">
            <script type="text/javascript">
                function checklen()
                {
                    let sub_button = document.getElementById('submit');
                    if (!document.getElementById('code_tarea').value)
                    {
                        sub_button.disabled = true;
                        sub_button.title = "Вы не можете отправить пустой код";
                    }
                    else
                    {
                        sub_button.disabled = false;
                        sub_button.title = "";
                    }
                }
            </script>
            <!-- Список языков для сдачи -->
            <div class="col-12 p-0">
                <select name="lang" class="custom-select bg-code text-light">
                    <option value="cpp" selected >C++</option>
                    <option value="java">Java</option>
                    <option value="c">C</option>
                    <option value="cs">C#</option>
                </select>
            </div>

            <!-- Поле для вставки кода-->
            <div class="col-12 p-0">
                <textarea oninput="checklen()" wrap="soft | hard" name="code_tarea" class="col-12 bg-code text-light border-0" id="code_tarea" cols="30" rows="10" placeholder="Введите код здесь или отправьте файл, содержащий решение задачи."></textarea>
            </div>

            <!-- Возможность выбрать файл для сдачи-->
            <div class="custom-file col-lg-3 col-md-4 col">
                <input name="code_file" type="file" class="custom-file-input" id="customFile" accept=".cpp,.c,.java,.cs">
                <label class="custom-file-label" for="customFile">Выберите файл</label>
            </div>

            <!-- Кнопка триггер -->
            <div class="col">
                <button id="submit" name="sub" type="submit" class="btn text-light bg-code" disabled>Отправить</button>
            </div>
            <?php else: ?>
                <div class="text text-center col-12">
                    <span class="h2 font-italic">Авторизуйтесь, чтобы отправлять задачи на проверку</span>
                </div>
            <?php endif ?>
        </div>
        
        
    </form>
    
</div>