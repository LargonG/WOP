<style media="screen">
    .snetlink
    {
      width: 50px;
      height: 50px;
        transition: 0.3s;
        margin-right: 1vh;
    }

    .snetlink:hover
    {
        width: 60px;
        height: 60px;
    }
</style>
<footer class="container text-light mt-4 bg-dark pt-1">
  <div class="row mb-auto">
    <div class="col-xl-8 col">
        <b>Мир олимпиадного программирования</b>
        <div class="mt-2">
          <a class="text-light" href="#">О проекте</a><br>
          <a class="text-light" href="#">Наша команда</a><br>
          <a class="text-light" href="#">Реклама</a>
        </div>

    </div>

    <div class="col-xl-4 col text-center">
        <b>Мы в соцсетях:</b>
        <div class="row justify-content-center mt-1">
          <a class="col-md-2 col-3 p-0"href="#" title="Вконтакте">
            <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/vklink.png"; else echo "http://prohardinf.ru/imgs/dvklink.png"; ?> class="snetlink">
          </a>

          <a class="col-md-2 col-3 p-0" href="#" title="Facebook">
            <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/fblink.png"; else echo "http://prohardinf.ru/imgs/dfblink.png"; ?> class="snetlink">
          </a>

          <a class="col-md-2 col-3 p-0" href="#" title="Youtube">
            <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/ytlink.png"; else echo "http://prohardinf.ru/imgs/dytlink.png"; ?> class="snetlink">
          </a>
        </div>

    </div>
  </div>
  <div class="row bg-secondary align-items-end mt-2">
    <div class="col p-2 text-center small font-italic">
        Мир олимпиадного программирования © 2019, все права защищены.
    </div>
  </div>

</footer>
