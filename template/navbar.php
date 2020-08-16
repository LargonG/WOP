<?php if (isset($_COOKIE['token'])) $username = R::findOne('tokens', 'token = ?', array($_COOKIE['token']))->username; ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="/">ProfiHard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">

      <!-- Ссылки/Каталоги -->
      
      <!-- Главная/Новости -->
      <li class="nav-item link_main">
        <a class="nav-link" href="/">Главная</a>
      </li>
      
      <!-- Алгоритмы/Статьи -->
      <li class="nav-item link-papers">
        <a class="nav-link" href="/papers">Статьи</a>
      </li>
      
      <!-- Задачи -->
      <li class="nav-item link_tasks">
        <a class="nav-link" href="/problems">Задачи</a>
      </li>
      
      <!-- Календарь-->
      <li class="nav-item link_calendar">
        <a class="nav-link disabled" href="/calendar">Календарь</a>
      </li>

      <!-- Досуг -->
      <li class="nav-item">
        <a class="nav-link disabled" href="/freetime">Досуг</a>
      </li>

      <!-- Список закончен -->

      <!-- Пользователь не авторизирован -->
      <?php if (!$username): ?>

      <!-- Ссылка авторизации -->
      <!-- Показывается только тогда, когда экран меньше среднего (телефон, планшет) -->
      <li class="nav-item d-block d-md-none border-top border-secondary">
        <a class="nav-link" data-toggle="modal" href="#signin">Авторизация</a>
      </li>

      <?php endif; ?>
    </ul>

    <!-- Пользователь не авторизирован -->
    <?php if (!$username): ?>
    
    <!-- Кнопка видна с компьютеров, когда экран не меньше среднего -->
    <button type="button" class="btn btn-secondary d-none d-md-block" data-toggle="modal" data-target="#signin">
      Авторизация
    </button>

    <!-- Всплывающее окно авторизации -->
    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-light bg-dark">
          <div class="modal-header">

            <h5 class="modal-title">Авторизация</h5>
            
            <!-- Кнопка крестика -->
            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>

          <!-- Форма авторизации -->
          <div class="modal-body">
            <form action = "/setconfig.php" method = "POST" onsubmit="document.getElementById('referrer').value=window.location">
              <input type="hidden" id="referrer" name="ref">
              <!-- Логин или email -->
              <div class="form-group">
                <label for="login">Логин или email</label>
                <input type="text" class="form-control" id="login" placeholder="Логин или email" name="usname"
                value="<?php if (isset($_COOKIE['lastenteredlogin'])) echo $_COOKIE['lastenteredlogin']; ?>">
              </div>

              <!-- Пароль -->
              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="pass">
              </div>

              <?php if (isset($_COOKIE['logsuccess'])) if ($_COOKIE['logsuccess'] == false): ?>

              <!-- Алерт срабатывает только в случае неверного ввода пароля или логина -->
              <div class="alert alert-danger font-weight-bold small text-center" role="alert">
                  Неверный логин или пароль. Повторите попытку входа.
              </div>

              <?php endif; ?>

              <!-- Кнопка-триггер -->
              <div style="width: 100%" align=center>
                <button class="btn btn-success" type="submit" name="sub" >Войти</button>
              </div>

            </form>
          </div>
          <!-- Форма закончена -->

          <!-- Ссылка на регистрацию -->
          <div class="modal-footer">
            <a href="/signup">
              <button type="button" class="btn btn-secondary text-light">
                Регистрация
              </button>
            </a>
          </div>

        </div>
      </div>
    </div>
    <!-- Всплывающее окно авторизации закончено-->
    
    <!-- Пользователь авторизирован -->
    <?php else: ?>
    
    <!-- Что-то непонятное -->
    <span class="d-block d-md-none border-top border-secondary"></span>
    <span class="navbar-text font-italic h5" align=center>
      <a href="/home">
        <?php echo $username; ?>
      </a>
    </span>
    
    <?php endif; ?>

  </div>
</nav>
