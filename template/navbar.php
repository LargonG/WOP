<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/">ProfiHard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item link_main">
        <a class="nav-link" href="/">Главная <span class="sr-only"></span></a>
      </li>
      <li class="nav-item link_algo">
        <a class="nav-link" href="/algo">Алгоритмы</a>
      </li>
      <li class="nav-item link_tasks">
        <a class="nav-link" href="/problems">Задачи</a>
      </li>
      <li class="nav-item link_calendar">
        <a class="nav-link disabled" href="/calendar">Календарь</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/freetime">Досуг</a>
      </li>
      <?php if (!$_COOKIE['name']): ?>
      <li class="nav-item d-block d-md-none border-top border-secondary">
        <a class="nav-link" data-toggle="modal" href="#signin">Авторизация</a>
      </li>
      <?php endif; ?>
    </ul>

    <?php if (!$_COOKIE['name']): ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary d-none d-md-block" data-toggle="modal" data-target="#signin">
      Авторизация
    </button>

    <!-- Modal -->
    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-light bg-dark">
          <div class="modal-header">

            <h5 class="modal-title">Авторизация</h5>

            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>

          <!-- Авторизация -->
          <div class="modal-body">
            <form action = "/setconfig.php" method = "POST">

              <div class="form-group">
                <label for="login">Логин или email</label>
                <input type="text" class="form-control" id="login" placeholder="Логин или email" name="usname"
                value="<?php if (isset($_COOKIE['lastenteredlogin'])) echo $_COOKIE['lastenteredlogin']; ?>">
              </div>

              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="pass">
              </div>

              <?php if (isset($_COOKIE['logsuccess'])) if ($_COOKIE['logsuccess'] == false): ?>

              <div class="alert alert-danger font-weight-bold small text-center" role="alert">
                  Неверный логин или пароль. Повторите попытку входа.
              </div>

              <?php endif; ?>

              <div style="width: 100%" align=center>
                <button class="btn btn-success" type="submit" name="sub" >Войти</button>
              </div>

            </form>
          </div>

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
  <?php else: ?>
  <span class="d-block d-md-none border-top border-secondary"></span>
  <span class="navbar-text font-italic h5" align=center>
    <a href="/home">
    <?php echo $_COOKIE['name']; ?>
    </a>
  </span>
    <?php endif; ?>
  </div>
</nav>
