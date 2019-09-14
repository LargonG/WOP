<style media="screen">
    .listtext
    {
        font-size: 0.8em;

        line-height: 1.8em;
    }

    .footer-link
    {
        margin-left: 10px;
        font-size: inherit;
        transition: 0.5s;
    }

    .footer-link:hover
    {
        color: #555;
        text-decoration: underline;
    }

    .snetlink
    {
        width: 50px;
        height: 50px;
        transition: 0.3s;
        margin-right: 1vh;
    }

    .snetlink:hover
    {
        width: 65px;
        height: 65px;
    }

    .footerlowtext
    {
        text-align: right;
        font-size: 0.55em;
    }

</style>
<div class="container footer mt-2 bg-dark">
  <div class="row">
    <div class="col-xl-8 col">
        <b>Мир олимпиадного программирования</b>
        <br><br>
        <p class="listtext"><a class="footer-link" href="#">О проекте</a><br>
            <a class="footer-link" href="#">Наша команда</a><br>
            <a class="footer-link" href="#">Реклама</a>
        </p>
    </div>

    <div class="col-xl-4 col">
        <b>Мы в соцсетях:</b>
        <div class="context">
          <span class="snetlink">
              <a href="#" title="Мы Вконтакте">
                  <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/vklink.png"; else echo "http://prohardinf.ru/imgs/dvklink.png"; ?> class="snetlink">
              </a>
          </span>

          <span class="snetlink">
              <a href="#" title="Мы на Facebook">
                  <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/fblink.png"; else echo "http://prohardinf.ru/imgs/dfblink.png"; ?> class="snetlink">
              </a>
          </span>

          <span class="snetlink">
              <a href="#" title="Мы на Youtube">
                  <img src=<?php if (!isset($_COOKIE['lighttheme'])) echo "http://prohardinf.ru/imgs/ytlink.png"; else echo "http://prohardinf.ru/imgs/dytlink.png"; ?> class="snetlink">
              </a>
          </span>
        </div>

    </div>
  </div>


  <div class="row justify-content-end">
    <div class="col footerlowtext">
      Мир олимпиадного программирования © 2019, все права защищены.
    </div>
  </div>
</div>
