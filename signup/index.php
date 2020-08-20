<?php require 'createProfile.php';?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/template/head.html' ?>
    <title>Создание профиля</title>
  </head>
  <body>
  <?php require $_SERVER['DOCUMENT_ROOT']."/template/navbar.php" ?>
    <div class="container context bg-dark text-light mt-2">
      <div class="row">
        <div class="col-12 p-3">

          <div class="h2 text-center">Создание профиля</div>
          <div class="h5 text-center">Маленькое начало большого пути</div>

          <form action='index.php' method='POST'>
            
            <!-- Логин -->
            <div class="form-group">

              <label for="log">Логин</label>
              
              <input class="form-control <?php echo $issues["login-error"] ? "is-invalid" : "" ?>"
              type="text" name="usname" value="<?php echo @$_POST['usname']; ?>"
              placeholder="Логин" id="log" aria-describedby="loginHelp">
              
              <?php if(!$issues["login-error"]): ?>
                <small id="loginHelp" class="form-text text-muted">Логин необходим для авторизации.
                  Также он будет виден другим пользователям.</small>
              <?php endif; ?>
              
              <div class="invalid-feedback">
                <?php echo $issues["login-error"]; ?>
              </div>
            
            </div>

            <!-- Роль -->
            <div class="form-group">

              <label for="role">Роль</label>
              
              <select class="form-control <?php echo $issues["role-error"] ? "is-invalid" : "" ?>" name="role" id="role">
                <option value="norole">Выберите роль</option>
                <option value="student" <?php if (isset($_POST['role']) and $_POST['role'] == "student") echo 'selected'; ?>>Ученик</option>
                <option value="teacher" <?php if (isset($_POST['role']) and $_POST['role'] == "teacher") echo 'selected'; ?>>Преподаватель</option>
              </select>
              
              <div class="invalid-feedback">
                <?php echo $issues["role-error"]; ?>
              </div>
            
            </div>

            <!-- Email -->
            <div class="form-group">

              <label for="email">Email</label>
              
              <input class="form-control <?php echo $issues["email-error"] ? "is-invalid" : "" ?>" 
              type="email" name="email" id="email" value="<?php echo @$_POST['email']; ?>"
                placeholder="E-mail" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?"
                aria-describedby="emailHelp">
              
              <?php if(!$issues["email-error"]): ?>
                <small id="loginHelp" class="form-text text-muted">Ваш E-mail нужен для восстановления аккаунта,
                  при утере его логина или пароля.</small>
              <?php endif; ?>
              
              <div class="invalid-feedback">
                <?php echo $issues["email-error"]; ?>
              </div>
            
            </div>

            <!-- Пароль и повтор пароля в одной строке -->
            <div class="form-group form-row">
              
              <div class="col-md-6 col-12">

                <label for="password">Пароль</label>
                
                <input class="form-control <?php echo $issues["password-error"] ? "is-invalid" : "" ?>"
                id="password" type="password" name="pass" placeholder="Пароль">
                
                <div class="invalid-feedback">
                  <?php echo $issues["password-error"]; ?>
                </div>
              
              </div>

              <div class="col-md-6 col-12">
                
                <label for="password-repeat">Повтор пароля</label>
                
                <input class="form-control <?php echo $issues["password-repeat-error"] ? "is-invalid" : "" ?>"
                id="password-repeat" type="password" name="r_pass" placeholder="Повторите пароль">
                
                <div class="invalid-feedback">
                  <?php echo $issues["password-repeat-error"]; ?>
                </div>
             
              </div>

            </div>

            <!-- Кнопка-триггер -->
            <button class="btn btn-success" type="submit" name="sub">Создать профиль</button>

          </form>
        </div>
      </div>
    </div>
    
    <?php require $_SERVER["DOCUMENT_ROOT"]."/template/footer.php"; ?>
  </body>
</html>
