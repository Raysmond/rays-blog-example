<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Raysmond blog">
    <meta name="author" content="Raysmond, Jiankun Lei, 雷建坤">

    <title><?= RHtml::encode(Rays::app()->client()->getHeaderTitle()) ?></title>
    <?php $baseUrl = Rays::baseUrl(); ?>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>/assets/bootstrap3.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= $baseUrl ?>/assets/bootstrap3.0/css/non-responsive.css" rel="stylesheet"/>
    <link href="<?= $baseUrl ?>/assets/css/main.css" rel="stylesheet"/>
    <!-- Custom css -->
    <?= RHtml::linkCssArray(Rays::app()->client()->css); ?>

    <script src="<?= $baseUrl ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $baseUrl ?>/assets/bootstrap3.0/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=$baseUrl?>/assets/js/html5shiv.js"></script>
    <script src="<?=$baseUrl?>/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="page-<?=Rays::router()->getControllerId() . "-" . Rays::router()->getActionId()?>">

<!-- Fixed navbar -->
<div id="main-nav" class="navbar navbar-default navbar-fixed-top">
    <span
        id="cur_uri" style="display: none;"><?= $baseUrl . "/" . Rays::router()->getControllerId() . "/" . Rays::router()->getActionId() ?></span>

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= Rays::app()->getName() ?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="<?= Rays::baseUrl() ?>">Home</a></li>
<!--                <li><a href="--><?//= $baseUrl ?><!--/blog">Blog</a></li>-->
                <li><a href="http://blog.raysmond.com">Blog</a></li>
                <li><a href="<?= $baseUrl ?>/projects">Projects</a></li>
                <li><a href="<?= $baseUrl ?>/about">About</a></li>
                <li><a href="<?= $baseUrl ?>/contact">Contact</a></li>
                <?php
                if (Rays::isLogin()) {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= Rays::user()->name ?> <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?= RHtml::linkAction("user", "Profile", "view", Rays::user()->id) ?></li>
                            <li class="divider"></li>
                            <li><?= RHtml::linkAction('user', "Logout", 'logout') ?></li>
                        </ul>
                    </li>
                    <?php if(Rays::user()->role === User::ADMIN){
                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuration <b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><?= RHtml::linkAction("site", "Site settings", "config") ?></li>
                                <li><?= RHtml::linkAction("cache", "Clear all cache", "clearAll") ?></li>
                                <li class="divider"></li>
                                <li><?= RHtml::linkAction("page", "Pages", "index") ?></li>
                            </ul>
                        </li>
                        <?php
                    } ?>
                <?php
                } else {
                    ?>
<!--                    <li>--><?//= RHtml::linkAction('user', "Login", 'login') ?><!--</li>-->
<!--                    <li>--><?//= RHtml::linkAction('user', "Register", 'register') ?><!--</li>-->
                <?php
                }
                ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<div id="main-wrapper" class="container">
    <div id="message" class="container">
        <?= RHtml::showFlashMessages(); ?>
    </div>
    <div class="clearfix"></div>
    <div id="content">
        <?= isset($content) ? $content : "" ?>
    </div>
</div>
<!-- /container -->

<div id="footer" class="container">
    <hr>
    <?php $time = (microtime(true) - Rays::$startTime) * 1000; ?>
    Copyright &copy; Raysmond 2011-2013. All Right Reserved.
    <span>&nbsp;&nbsp;In <?= sprintf("%.2f", (microtime(true) - Rays::$startTime) * 1000); ?> ms.</span>
    <span style="float: right;">Theme based on <a href="http://getbootstrap.com/">Bootstrap</a> and powered by <a
            href="https://github.com/Raysmond/Rays">Rays</a></span>
</div>

<!-- Placed at the end of the document so the pages load faster -->
<!-- Custom JavaScript  -->
<script src="<?=$baseUrl?>/assets/js/main.js"></script>
<?= RHtml::linkScriptArray(Rays::app()->client()->script); ?>
</body>
</html>
