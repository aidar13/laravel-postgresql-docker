<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Flowdoc</title>

    <link rel="stylesheet" href="/admin/libs/fancybox/dist/jquery.fancybox.min.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/admin/libs/chosen/chosen.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/admin/libs/air-datepicker/dist/css/datepicker.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/admin/css/style.css" type="text/css" media="screen"/>

    <link rel="apple-touch-icon" sizes="180x180" href="/admin/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/admin/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/favicon/favicon-16x16.png">
    <link rel="manifest" href="/admin/favicon/site.webmanifest">
    <link rel="mask-icon" href="/admin/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta name="title" content="Заголовок">
    <meta name="description" content="Описание">
    <meta name="keywords" content="">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Заголовок">
    <meta property="og:description" content="Описание">
    <meta property="og:url" content="/">
    <meta property="og:image" content="/admin/img/og-image.jpg">
    <meta property="og:site_name" content="localhost:9876">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Заголовок">
    <meta property="twitter:description" content="Описание">
    <meta property="twitter:image" content="/admin/img/og-image.jpg">
    <meta property="twitter:site" content="">
    <meta property="twitter:creator" content="">
    <meta property="twitter:url" content="/">
    <meta property="author" content="">
    <meta name="relap-image" content="/admin/img/og-image.jpg">
    <meta name="relap-title" content="Заголовок">
    <meta name="relap-description" content=" ">

</head>
<body>

<input id="lang" type="hidden" value="ru">

<div class="authorization-wrapper">
    <div class="authorization-inner">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf

            <img src="/admin/img/logo.svg" alt="FlowDoc" class="logo">
            <div class="input-group">
                <input type="text" name="email" placeholder="Логин" class="input-regular">
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Пароль" class="input-regular">
                <div class="text-right"><a href="#" title="Забыли пароль?" class="grey-link small">Забыли пароль?</a></div>
            </div>
            <div class="input-group">
                <button class="btn" style="width: 100%;">Войти</button>
            </div>
            <!--.alert-success, .alert-info, .alert-danger, .alert-warning-->
            <!--<div class="alert alert-danger"> -->
                <!--Неверно введен пароль-->
            <!--</div>-->
        </form>
    </div>
    <div class="copyright"></div>
</div>


<script src="/admin/libs/jquery/dist/jquery.js"></script>
<script src="/admin/libs/maskedinput/maskedinput.js"></script>
<script src="/admin/libs/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="/admin/libs/chosen/chosen.jquery.js"></script>
<script src="/admin/libs/air-datepicker/dist/js/datepicker.js"></script>
<script type="text/javascript" src="/admin/libs/plupload/js/plupload.full.min.js"></script>
<script src="/admin/js/scripts.js"></script>


<!--Only this page's scripts-->

<!---->

<div id="message" class="modal" style="display: none;">
    <h4 class="title-secondary">Удаление</h4>
    <div class="plain-text">
        При удалении все данные будут удалены
    </div>
    <hr>
    <div class="buttons justify-end">
        <div><button class="btn btn--red">Удалить</button></div>
        <div><button class="btn" data-fancybox-close>Отмена</button></div>
    </div>
</div>

<!--
<script>
    $.fancybox.open({
      src: "#message",
      touch: false
    })
</script>-->


</body>
</html>
