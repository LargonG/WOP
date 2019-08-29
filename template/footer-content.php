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
        width: 60px;
        height: 50px;
        transition: 0.3s;
        padding-left: 10px;
    }

    .snetlink:hover
    {
        width: 75px;
        height: 65px;
    }

    .footerlowtext
    {
        position: absolute;
        right: 0;
        font-size: 0.55em;
    }

</style>

<div class="col">
    <b>Мир олимпиадного программирования</b>
    <br><br>
    <p class="listtext"><a class="footer-link" href="#">О проекте</a><br>
        <a class="footer-link" href="#">Наша команда</a><br>
        <a class="footer-link" href="#">Реклама</a>
    </p>
</div>

<div class="col">
    <b>Мы в соцсетях:</b><br><br>
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
    <br><br><br>
    <span class="footerlowtext">Мир олимпиадного программирования © 2019, все права защищены.</div>
</div>
