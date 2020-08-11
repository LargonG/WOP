<footer class="container text-light mt-4 bg-dark pt-1">
  <div class="row mb-auto">

    <!-- Текстовая информация -->
    <div class="col-md-5 col-12 text-center">
        <span class="font-weight-bold font-italic">МОП - мир олимпиадного программирования</span>
        <div class="mt-2">
          <a class="d-block text-light font-italic" href="#">Пользовательское соглашение</a>
          <a class="d-block text-light font-italic" href="#">Политика конфиденциальности</a>
          <a class="d-block text-light font-italic" href="#">О проекте</a>
          <a class="d-block text-light font-italic" href="#">Наша команда</a>
          <a class="d-block text-light font-italic" href="#">Связаться с нами</a>
        </div>
    </div>

    <!-- Список соцсетей -->
    <div class="col-md-4 col-12 mt-md-0 mt-4 mb-md-0 mb-4 text-center ml-auto">

        <b>Мы в соцсетях:</b>

        <div class="row justify-content-center mt-1">
          
          <!-- ВК -->
          <a class="d-flex" href="#" title="Вконтакте">
            <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/vklink.png";
              else echo "http://prohardinf.ru/imgs/dvklink.png"; ?> class="snetlink img-fluid">
          </a>

          <!-- Зачем нам facebook? -->
          <a class="d-flex" href="#" title="Facebook">
            <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/fblink.png";
              else echo "http://prohardinf.ru/imgs/dfblink.png"; ?> class="snetlink img-fluid">
          </a>
          
          <!-- Youtube -->
          <a class="d-flex" href="#" title="Youtube">
            <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/ytlink.png";
              else echo "http://prohardinf.ru/imgs/dytlink.png"; ?> class="snetlink img-fluid">
          </a>
        
        </div>

    </div>

    <!-- Надпись снизу -->
    <div class="col-12 bg-secondary mt-2 p-2 text-center small font-italic align-self-end">
        Мир олимпиадного программирования © 2019, все права защищены.
    </div>

  </div>

</footer>
